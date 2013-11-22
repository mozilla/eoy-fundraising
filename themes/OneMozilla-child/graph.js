(function() {
  // From http://stackoverflow.com/questions/149055/how-can-i-format-numbers-as-money-in-javascript
  function formatCurrencyNumber (n, c, d, t) {
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d === undefined ? "," : d, t = t === undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c), 10) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

  function formatDate (date) {
    return (date.getMonth() + 1) + '/' + date.getDate();
  }

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'https://s3.amazonaws.com/mozilla-bsd-cache/eoy.json', true);
  xhr.onload = function () {
    var bsdData = JSON.parse(xhr.responseText);
    var periodData = bsdData.period;
    var sourceData = bsdData.source;

    function createPeriodGraph () {
      periodData = periodData.sort(function (a, b) {
        if (a.month === b.month) {
          return a.startDate > b.startDate ? 1 : (a.startDate < b.startDate ? -1 : 0)
        }
        else {
          return a.month > b.month ? 1 : (a.month < b.month ? -1 : 0)
        }
      });

      var graphContainer = document.querySelector('*[data-period-bar-container]');
      var columnTemplate = graphContainer.querySelector('.column');
      columnTemplate.parentNode.removeChild(columnTemplate);

      var totalDollars = periodData.reduce(function(acc, period) { return acc + period.data.amount; }, 0);

      document.querySelector('#period-graph-container .graph-amount-marker.top').innerHTML = '$' + formatCurrencyNumber(totalDollars, 2, '.', ',');
      document.querySelector('#period-graph-title').innerHTML = '$' + formatCurrencyNumber(totalDollars, 2, '.', ',');

      var runningTotalDollars = 0;
      var runningTotalContributors = 0;

      periodData.forEach(function (period, index) {
        var column = columnTemplate.cloneNode(true);
        var columnWidth = 100 / periodData.length;
        var bar = column.querySelector('.bar');
        var aboveTitle = column.querySelector('.above-title');
        var belowTitle = column.querySelector('.below-title');

        column.style.width = columnWidth + '%';
        runningTotalDollars += period.data.amount;
        runningTotalContributors += period.data.contributors;

        bar.style.height = 80 * ( period.data.amount > 0 ? runningTotalDollars : 20 ) / totalDollars + '%';
        // bar.style.height = 80 * runningTotalDollars / totalDollars + '%';

        var startPercentage = -100 * index;
        var endPercentage = 100 * (periodData.length - index);

        startPercentage = startPercentage + '%';
        endPercentage = endPercentage + '%';

        bar.style.background = '#43afc7';
        bar.style.background = '-moz-linear-gradient(left,  #43afc7 ' + startPercentage + ', #90cdd1 ' + endPercentage + ')';
        bar.style.background = '-webkit-gradient(linear, left top, right top, color-stop(' + startPercentage + ', #43afc7), color-stop(' + endPercentage + ', #90cdd1))';
        bar.style.background = '-webkit-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
        bar.style.background = '-o-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
        bar.style.background = '-ms-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
        bar.style.background = 'linear-gradient(to right,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';

        var startDate = new Date(period.month + '/' + period.startDate + '/' + '2013');
        var endDate = new Date(period.month + '/' + period.endDate + '/' + '2013');

        belowTitle.appendChild(document.createTextNode(formatDate(startDate) + ' - ' + formatDate(endDate)));
        // aboveTitle.appendChild(document.createTextNode('$' + runningTotalDollars + ' (' + runningTotalContributors + ')'));

        graphContainer.appendChild(column);
      });
    }

    function createSourceGraph () {
      var graphContainer = document.querySelector('*[data-source-bar-container]');
      var columnTemplate = graphContainer.querySelector('.column');

      columnTemplate.parentNode.removeChild(columnTemplate);

      var totalContributions = sourceData.reduce(function(acc, source) { return acc + source.data.amount; }, 0);

      sourceData.forEach(function (source) {
        var column = columnTemplate.cloneNode(true);
        var aboveTitle = column.querySelector('.above-title');
        var belowTitle = column.querySelector('.below-title');
        column.style.width = 100 / sourceData.length + '%';
        column.querySelector('.bar').style.height = 80 * source.data.amount / totalContributions + '%';
        belowTitle.appendChild(document.createTextNode(source.name[0].toUpperCase() + source.name.substr(1)));
        aboveTitle.appendChild(document.createTextNode('$' + source.data.amount + ' from ' + source.data.contributors + ' contributors'));
        graphContainer.appendChild(column);
      });
    }

    createPeriodGraph();
    createSourceGraph();
  };
  xhr.overrideMimeType('text/json');
  xhr.send();
})();
