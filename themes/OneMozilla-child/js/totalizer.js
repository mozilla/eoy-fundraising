(function() {

  var paypalData;
  var totalizerUI = document.querySelector(".odometer");

  var TICKER_INTERVAL = 10000; // in milliseconds
  console.log("ticks every " + (TICKER_INTERVAL/1000) + " secs");

  getTotal();
  setInterval(getTotal, TICKER_INTERVAL);

  function getTotal() {
    console.log("get Total")
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://d3gxuc3bq48qfa.cloudfront.net/eoy-2014-total", true);
    xhr.onerror = function(error) {
      console.log(error);
      hideTotalizer();
    };
    xhr.onload = function(event) {
      console.log(xhr.responseText, event);
      if (request.status >= 200 && request.status < 400) {
        try {
          paypalData = JSON.parse(xhr.responseText);
          console.log(paypalData);
        } catch(e) {
          console.log(e);
          hideTotalizer();
          return;
        }
        showTotalizer();
        totalizerUI.textContent = paypalData.sum;
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
