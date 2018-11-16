export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    const searchButton = document.querySelector('.header--search-link');
    const searchField = document.querySelector('.search-field');
    searchButton.addEventListener('click', (e)=>{
      if(searchButton.classList.contains('open')) {
        searchButton.classList.remove('open');
      }
      else {
        searchButton.classList.add('open');
        searchField.focus();
        e.stopPropagation();
      }
    });

    document.documentElement.addEventListener('click',(e)=>{
      if(!(e.target.classList.contains('search-field'))||(e.target.classList.contains('search-submit'))) {
        searchButton.classList.remove('open');
      }
    });

  },
};
