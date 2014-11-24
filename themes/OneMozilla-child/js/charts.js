var CHARTS = {
  colors: [
    '#2F5899',
    '#1D6FB7',
    '#19B7E4',
    '#61C3B0',
    '#89C764',
    '#FCDD3F',
    '#FAAC3F',
    '#F48032',
    '#EB5543',
    '#F06DA6',
    '#A5509C',
    '#7C3B79'
  ],
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
      this.renderPieChart('#chart-country-data', this.modelData(data, 'country', makeDataFake));
    });

    this.fetchData('http://transformtogeckoboard.herokuapp.com/eoy/transactionsbysource', function (data) {
      this.renderBarChart('#chart-source-data', this.modelData(data, 'source', makeDataFake));
    });
  },
  modelData: function (data, sourceKey, makeDataFake) {
    var modeledData = [];

    data.forEach(function (item, index, array) {
      modeledData.push({
        donationSource: item[sourceKey],
        eoyDonations: makeDataFake ? Math.round(Math.random() * 1000000) : item.eoyDonations
      });
    });

    // Sort data by number of donors (highest to lowest)
    modeledData = modeledData.sort(function (a, b) {
      return b.eoyDonations - a.eoyDonations;
    });

    // Only display first 8
    modeledData = modeledData.slice(0,8);

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
      chartHTML = ''
      largestValue = data[0].eoyDonations;

    data.forEach(function (item, index, array) {
      chartHTML += '<div class="bar" style="width:' + ((item.eoyDonations / largestValue)*100).toString() + '%; background-color: ' + self.colors[index] + '; height:' + barHeight + 'px"></div>';
      chartHTML += '<p class="bar-meta">' + item.donationSource + ' <span>' + self.addCommas(item.eoyDonations) + '</span></p>';
    });

    document.querySelector(target + ' .bar-chart').innerHTML = chartHTML;
  },
  renderPieChart: function (target, data) {
    var viewbox = '0 0 340 340',
      radius = 170,
      elTarget = document.querySelector(target),
      self = this;

    var chart = d3.select(target + ' svg')
      .data([data])
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

    arcs.append('svg:path')
      .attr('fill', function(d, i) { return self.colors[i]; } )
      .attr('d', arc);

    // Construct Key

    var keyHTML = '<div class="pie-chart-key">';

    data.forEach(function (item, index, array) {
      keyHTML += '<p><b style="color:' + self.colors[index] + '">&#9724;</b> ' + item.donationSource + '<br/><span>' + self.addCommas(Math.round(item.eoyDonations)) + '</span></p>';
    });

    elTarget.innerHTML = elTarget.innerHTML + keyHTML + '</div>';
  }
};
