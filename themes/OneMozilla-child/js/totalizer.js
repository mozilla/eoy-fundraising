(function() {

  var paypalData;
  var totalizerUI = document.querySelector(".odometer");

  var TICKER_INTERVAL = 5000; // in milliseconds
  // console.log("ticks every " + (TICKER_INTERVAL/1000) + " secs");

  getTotal();
  setInterval(getTotal, TICKER_INTERVAL);

  function getTotal() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://d3gxuc3bq48qfa.cloudfront.net/eoy-2014-total", true);
    xhr.onerror = function(error) {
      console.log(error);
      hideTotalizer();
    };
    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 400) {
        try {
          paypalData = JSON.parse(xhr.responseText);
        } catch(e) {
          console.log(e);
          hideTotalizer();
          return;
        }
        showTotalizer();
        totalizerUI.textContent = Math.round(paypalData.sum);
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

})();
