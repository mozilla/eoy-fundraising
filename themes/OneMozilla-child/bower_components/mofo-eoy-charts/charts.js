var CHARTS = {
  config: {
    topDonorGroupSize: 8
  },
  colors: ['#2F5899', '#A5509C', '#19B7E4', '#FAAC3F' , '#61C3B0', '#FCDD3F', '#F48032', '#7C3B79', '#EB5543', '#89C764', '#1D6FB7', '#F06DA6'],
  addCommas: function (target) {
    target += '';

    var x = target.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

    return x1 + x2;
  },
  init: function (target, localizedStrings, makeDataFake) {
    var self = this;

    makeDataFake = makeDataFake || false;

    // Inject basic HTML
    document.querySelector(target).innerHTML =
      '<section id="chart-country-data" class="chart">' +
        '<header>' + localizedStrings.donorsByCountry + '</header>' +
        '<svg class="chart-graphic"></svg>' +
      '</section>' +

      '<section id="chart-source-data" class="chart">' +
        '<header>' + localizedStrings.donorsBySource + '</header>' +
        '<div class="bar-chart"></div>' +
      '</section>';

    this.fetchData('http://transformtogeckoboard.herokuapp.com/eoy/transactionsbycountry', function (data) {
      data = this.modelData(data, 'country', makeDataFake);
      this.renderPieChart('#chart-country-data', data);

      if (data.length > self.config.topDonorGroupSize) {
        this.renderShowHide(document.querySelector('#chart-country-data [data-component="toggle"]'));
      }
    });

    this.fetchData('http://transformtogeckoboard.herokuapp.com/eoy/transactionsbysource', function (data) {
      data = this.modelData(data, 'source', makeDataFake);
      this.renderBarChart('#chart-source-data', data);

      if (data.length > self.config.topDonorGroupSize) {
        this.renderShowHide(document.querySelector('#chart-source-data [data-component="toggle"]'));
      }
    });
  },
  modelData: function (data, sourceKey, makeDataFake) {
    var modeledData = [];

    data.forEach(function (item, index, array) {
      if (parseInt(item.eoyDonations, 10) !== 0 || makeDataFake) {
        modeledData.push({
          donationSource: item[sourceKey],
          eoyDonations: makeDataFake ? Math.round(Math.random() * 1000000) : item.eoyDonations
        });
      }
    });

    // Sort data by number of donors (highest to lowest)
    modeledData = modeledData.sort(function (a, b) {
      return b.eoyDonations - a.eoyDonations;
    });

    // Simulating a large top source (for fake data only)
    if (makeDataFake) {
      modeledData[0].eoyDonations = Math.round(modeledData[0].eoyDonations * (Math.random() * 3 + 1));
    }

    return modeledData;
  },
  fetchData: function (url, callback) {
    var request = new XMLHttpRequest();
    var self = this;

    request.open('GET', url, true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400){
        var data = JSON.parse(this.response);
        callback.call(self, data);
      } else {
        console.error('Data request failed');
      }
    };

    request.onerror = function() {
      console.error('Data request failed');
    };

    request.send();
  },
  renderBarChart: function (target, data) {
    var self = this,
      width = 340,
      barHeight = 27,
      chartHTML = '',
      largestValue = data[0].eoyDonations;

    function buildKeyItem(item, index) {
      var fragment = '';

      if (item.eoyDonations !== '0') {
        fragment += '<div class="bar" style="width:' + ((item.eoyDonations / largestValue)*100).toString() + '%; background-color: ' + self.colors[index % 12] + '; height:' + barHeight + 'px"></div>';
        fragment += '<p class="bar-meta">' + item.donationSource + ' <span>' + self.addCommas(item.eoyDonations) + '</span></p>';
      }

      return fragment;
    }

    // Construct Key ----------------------------------------------------------

    // Construct top donors section
    chartHTML += '<div>';

    data.slice(0, self.config.topDonorGroupSize).forEach(function (item, index, array) {
      chartHTML += buildKeyItem(item, index);
    });

    chartHTML += '</div>';

    // Construct bottom donors section
    chartHTML += '<div data-component="toggle">';

    data.slice(self.config.topDonorGroupSize).forEach(function (item, index, array) {
      chartHTML += buildKeyItem(item, index);
    });

    chartHTML += '</div>';

    document.querySelector(target + ' .bar-chart').innerHTML = chartHTML;
  },
  renderPieChart: function (target, data) {
    var viewbox = '0 0 340 340',
      radius = 170,
      elTarget = document.querySelector(target),
      self = this;

    var chart = d3.select(target + ' svg')
      .data([data.slice(0, self.config.topDonorGroupSize)])
      .attr('viewbox', viewbox)
      .append('svg:g')
      .attr('transform', 'translate(' + radius + ',' + radius + ')');

    var arc = d3.svg.arc()
      .outerRadius(radius);

    var pie = d3.layout.pie()
      .value(function(d) { return parseFloat(d.eoyDonations, 10); });

    var arcs = chart.selectAll('g.slice')
      .data(pie)
      .enter()
      .append('svg:g')
      .attr('class', 'slice');

    function buildKeyItem(item, index, isOnChart) {
      var fragment = '';

      // Don't build keys for non-donors
      if (item.eoyDonations !== '0') {
        fragment += '<p>';

        if (isOnChart) {
          fragment += '<b style="color:' + self.colors[index] + '">&#9724;</b> ';
        }

        fragment += (item.donationSource + '<br/><span>' + self.addCommas(Math.round(item.eoyDonations)) + '</span></p>');
      }

      return fragment;
    }

    arcs.append('svg:path')
      .attr('fill', function(d, i) { return self.colors[i]; } )
      .attr('d', arc);

    // Construct Key ----------------------------------------------------------

    // Construct top donors section
    var keyHTML = '<div class="pie-chart-key"><div class="group">';

    data.slice(0, self.config.topDonorGroupSize).forEach(function (item, index, array) {
      keyHTML += buildKeyItem(item, index, true);
    });

    keyHTML += '</div>';

    // Construct bottom donors section
    keyHTML += '<div class="group" data-component="toggle">';

    data.slice(self.config.topDonorGroupSize).forEach(function (item, index, array) {
      keyHTML += buildKeyItem(item, index, false);
    });

    keyHTML += '</div></div>';

    elTarget.innerHTML = elTarget.innerHTML + keyHTML;
  },
  renderShowHide: function (target) {
    var isVisible = false,
      elToggle = document.createElement('button'),
      nativeDisplay = target.style.display;

    elToggle.innerHTML = '+';
    elToggle.classList.add('btn-toggle');

    target.parentNode.insertBefore(elToggle , target);
    target.style.display = 'none';

    elToggle.addEventListener('click', function () {
      if (isVisible) {
        target.style.display = 'none';
        elToggle.innerHTML = '+';
      } else {
        target.style.display = nativeDisplay;
        elToggle.innerHTML = '-';
      }

      isVisible = !isVisible;
    });
  }
};
