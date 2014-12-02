(function() {

  var totalizerSelector = ".odometer";
  if ( document.querySelector(totalizerSelector) ) {
    var totalizerUI = document.querySelector(totalizerSelector);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "wp-content/themes/OneMozilla-child/totalizer.json", true);
    xhr.onerror = function(error) {
      console.log(error);
      hideTotalizer();
    };
    xhr.onload = function() {
      var paypalData;
      try {
        paypalData = JSON.parse(xhr.responseText);
        totalizerUI.textContent = paypalData.amount;
      } catch(e) {
        console.log(e);
        hideTotalizer();
        return;
      }
    };
    xhr.overrideMimeType("application/json");
    xhr.send();
  }

})();
