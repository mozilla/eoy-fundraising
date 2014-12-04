(function() {

  var paypalData;
  var amount = 0;
  var totalizerUI = document.querySelector(".odometer");

  var TICKER_INTERVAL = 5000; // in milliseconds

  function getTotal() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://d3gxuc3bq48qfa.cloudfront.net/eoy-2014-total", true);
    xhr.onerror = function(error) {
      console.error(error);
      hideTotalizer();
    };
    xhr.onload = function() {
      if ( xhr.status === 200 ) {
        try {
          paypalData = JSON.parse(xhr.responseText);
          amount = Math.round(paypalData.sum);
          showTotalizer();
          setTimeout(getTotal, TICKER_INTERVAL);
        } catch(e) {
          console.error(e);
          hideTotalizer();
        }
      }
    };
    xhr.overrideMimeType("application/json");
    xhr.send();
  }

  function showTotalizer() {
    totalizerUI.textContent = amount;
    document.querySelector("#totalizer-container").style.display = "block";
    document.querySelector("#eoy-banner-donate-btn").style.marginTop = "0";
  }

  function hideTotalizer() {
    document.querySelector("#totalizer-container").style.display = "none";
    document.querySelector("#eoy-banner-donate-btn").style.marginTop = "45px";
  }

  getTotal();

})();
