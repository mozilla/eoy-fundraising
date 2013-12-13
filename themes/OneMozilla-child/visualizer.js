(function() {

  var sections = document.querySelectorAll('section[data-visualization]');
  var chosenSection;

  var queryStringMatch = window.location.search.match(/[\?&]v=([\w_-]+)(\W|$)/);

  if (queryStringMatch) {
    chosenSection = Array.prototype.filter.call(sections, function (element) {
      return element.getAttribute('data-visualization') === queryStringMatch[1];
    });
  }

  chosenSection = chosenSection && chosenSection.length === 1 ? chosenSection[0] : sections[Math.floor(Math.random() * sections.length)];
  chosenSection.classList.add('show');

})();