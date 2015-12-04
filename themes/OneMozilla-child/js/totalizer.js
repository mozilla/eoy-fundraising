var el = document.querySelector('.odometer');

od = new Odometer({
  el: el,
  value: '',

  // Any option (other than auto and selector) can be passed in here
  format: '(,ddd).dd',
  theme: 'plaza'
});

// Use a named immediately-invoked function expression.
(function worker() {
  $.get('https://d3gxuc3bq48qfa.cloudfront.net/eoy-2014-total', function(data) {
    // Now that we've completed the request schedule the next one.
    od.update(data.sum)
    setTimeout(worker, 5000);
  });
})();