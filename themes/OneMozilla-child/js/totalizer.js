(function() {

  var amount;
  var currVal;
  var totalizerUI = document.querySelector(".odometer");

  var STARTING_GAP_BASE = 3000;
  var STARTING_GAP_RANGE = 2000;
  var INITIAL_TICK_ADDI_BASE = 50;
  var INITIAL_TICK_ADDI_RANGE = 100;
  var INITIAL_TICK_DELAY = 2000; // in milliseconds
  var TICK_ADDI_BASE = 20;
  var TICK_ADDI_RANGE = 20;
  var TICKER_INTERVAL = parseInt(20000+Math.random()*20000); // in milliseconds
  console.log("ticks every " + (TICKER_INTERVAL/1000) + " secs");

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "wp-content/themes/OneMozilla-child/data/totalizer.json", true);
  xhr.onerror = function(error) {
    console.log("XMLHttpRequest error");
    console.log(error);
    hideTotalizer();
  };
  xhr.onload = function() {
    var paypalData;
    try {
      paypalData = JSON.parse(xhr.responseText);
    } catch(e) {
      console.log(e);
      hideTotalizer();
      return;
    }
    console.log(paypalData);
    if ( paypalData.amount && paypalData.lastAmount ) {
      amount = paypalData.amount;
      currVal = setStartingTotal(parseInt(paypalData.lastAmount));
      console.log(currVal);
      totalizerUI.textContent = currVal;

      // initial tick, the animation starts soon after page load
      setTimeout(function(){
        updateNumber(INITIAL_TICK_ADDI_BASE, INITIAL_TICK_ADDI_RANGE);
      }, INITIAL_TICK_DELAY);

      // regularly ticks
      var countUpScheduler = setInterval(function() {
        updateNumber(TICK_ADDI_BASE, TICK_ADDI_RANGE);
        if ( currVal >= amount ) {
          console.log("don't update");
          clearInterval(countUpScheduler);
          console.log("killed scheduler");
        }
      }, TICKER_INTERVAL);

      function updateNumber(increBase, increRange) {
        currVal += parseInt(increBase+(Math.random()*increRange));
        console.log(currVal);
        if ( currVal < amount ) {
          totalizerUI.textContent = currVal;
        }
      }
    } else {
      hideTotalizer();
    }
  };
  xhr.overrideMimeType("application/json");
  xhr.send();

  // starting amount for the totalizer should be equal or greater than the previous real income we got from PayPal
  function setStartingTotal(lastRealAmount) {
    // randomly pick a number as the starting amount
    var startingTotal = amount - (STARTING_GAP_BASE+Math.ceil(Math.random()*STARTING_GAP_RANGE));
    if ( startingTotal < lastRealAmount ) {
      startingTotal = lastRealAmount;
    }
    return startingTotal;
  }

  function hideTotalizer() {
    document.querySelector("#totalizer").style.display = "none";
  }

})();
