(function() {

  var paypalData;
  var amount = 0;
  var totalizerUI = document.querySelector(".odometer");
  var oldGoalUI = document.querySelector("#old-goal");
  var newGoalUI = document.querySelector("#new-goal");
  var newGoals = [ 1.75, 2.1, 2.5, 2.75, 3 ];

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
          updateGoal();
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

  function updateGoal() {
    var currentTotal = amount/1000000; // in million
    var oldGoalHTML = "";
    var newGoalHTML = "";
    for (var i=0; i<newGoals.length; i++) {
      if ( currentTotal >= newGoals[i] && newGoals[i+1] ) {
        oldGoalHTML = "$" + newGoals[i];
        newGoalHTML = "$" + formatNewGoal(newGoals[i+1]) + " million";
      }
    }
    oldGoalUI.innerHTML = oldGoalHTML;
    newGoalUI.innerHTML = newGoalHTML;
  }

  function formatNewGoal(goal) {
    // due to our choice of font type,
    // we have to apply larger font size to 'period' to make it visible enough for people to see
    var html = "";
    goal = goal.toString().split(".");
    html += goal[0]; // digits before decimal point
    if ( goal[1] ) {
      html += "<b>.</b>"; // decimal point
      html += goal[1]; // digits after decimal point
    }
    return html;
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
