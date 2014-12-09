(function() {

  var chartContainerSelector = '#eoy-2014-charts';
  if ( document.querySelector(chartContainerSelector) ) {
    CHARTS.init(chartContainerSelector, {
      donorsByCountry: 'Donors by Country',
      donorsBySource: 'Donors by Source'
    }, false);
  }

})();
