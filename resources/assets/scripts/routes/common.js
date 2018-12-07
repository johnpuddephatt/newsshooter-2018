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

    var pageGalleries = document.querySelectorAll('.wp-block-gallery');

    if(pageGalleries) {
      pageGalleries.forEach((galleryThumbs) => {
        var galleryWrapper = document.createElement('div');
        galleryWrapper.classList.add('gallery-wrapper');
        // insert wrapper before el in the DOM tree
        galleryThumbs.parentNode.insertBefore(galleryWrapper, galleryThumbs);
        // move el into wrapper
        galleryWrapper.appendChild(galleryThumbs);

        var galleryStage = document.createElement('div');
        galleryStage.classList.add('gallery-stage');
        galleryThumbs.parentNode.insertBefore(galleryStage, galleryThumbs);

        var firstImage = galleryThumbs.querySelector('img');
        selectImage(firstImage);

        galleryThumbs.addEventListener('click', (e)=>{
          if(e.target.nodeName === 'IMG') {
            selectImage(e.target.parentNode);
          }
        });
      });
    }

    function selectImage(thumbnail) {

      let thisGalleryWrapper = thumbnail.closest('.gallery-wrapper');
      let thisStage = thisGalleryWrapper.querySelector('.gallery-stage');

      let currentActive = thisGalleryWrapper.querySelectorAll('.is-active');
      if(currentActive) currentActive.forEach((el) => { el.classList.remove('is-active') });

      let thisClone = thumbnail.cloneNode(true);
      thisStage.innerHTML = '';
      thisStage.insertBefore(thisClone, null);

      thumbnail.classList.add('is-active');

    }
  },
};
