export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    /**
    *** Search
    **/

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

    /**
    *** Galleries
    **/

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
        selectImage(firstImage.parentNode);

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

    /*
    ** Hamburger
    */

    function isOverflown(element) {
        return element.scrollHeight > element.clientHeight;
    }
    console.log('here');


      const navBar = document.querySelector('.primary-navigation');
      const menuButton = document.querySelector('.menu-link');
      console.log('here');

      function checkNavigationOverflow(elem) {
        if( isOverflown(elem) ) {
          elem.classList.add('overflowing');
        }
        else {
          elem.classList.remove('overflowing');
          menuButton.classList.remove('open');
          document.body.classList.remove('menu-open');
        }
      }

      if(navBar && menuButton) {
        checkNavigationOverflow(navBar);
        console.log('DOM event');

        window.addEventListener('resize',()=>{
          checkNavigationOverflow(navBar);
        });


        window.addEventListener('load',()=>{
          checkNavigationOverflow(navBar);
          console.log('load event');
        });

        menuButton.addEventListener('click',()=>{
          menuButton.classList.add('open');
          document.body.classList.add('menu-open');
        });

        const menuClose = document.querySelector('.menu-close');
        menuClose.addEventListener('click',()=>{
          menuButton.classList.remove('open');
          document.body.classList.remove('menu-open');
        });

      }




    /**
    *** Lightboxes
    **/

    let lightboxImages = document.querySelectorAll('figure a');
    if(lightboxImages) {
      lightboxImages.forEach((lightboxImage, index) => {
        lightboxImage.addEventListener('click', (e)=>{
          e.preventDefault();
          createLightbox(e.currentTarget.getAttribute('href'), index);
          document.body.classList.add('lightbox-open');
        })
      });
    }

    var lightboxNext, lightboxPrevious, lightboxClose;

    function createLightbox(imageHref, index) {
      // Wrapper
      var lightboxWrapper = document.createElement('div');
      lightboxWrapper.classList.add('lightbox-wrapper');
      // Image
      var lightboxImage = document.createElement('img');
      lightboxImage.classList.add('lightbox-image');
      lightboxImage.setAttribute('src',imageHref);
      lightboxWrapper.appendChild(lightboxImage);
      // Lightbox buttons
      var lightboxControls = document.createElement('div');
      lightboxControls.classList.add('lightbox-controls');
      // Close button
      lightboxClose = document.createElement('button');
      lightboxClose.innerHTML = '×';
      lightboxClose.classList.add('lightbox-control');
      lightboxClose.addEventListener('click', ()=>{
        document.body.classList.remove('lightbox-open');
        lightboxWrapper.remove();
      });
      lightboxControls.appendChild(lightboxClose);
      if(lightboxImages.length > 1) {
        // Previous button
        lightboxPrevious = document.createElement('button');
        lightboxPrevious.innerHTML = '«';
        lightboxPrevious.classList.add('lightbox-control');
        lightboxPrevious.dataset.previous = index - 1;
        lightboxPrevious.addEventListener('click',(e)=>{
          changeImage(e.currentTarget.dataset.previous);
        });
        lightboxControls.appendChild(lightboxPrevious);
        // Next button
        lightboxNext = document.createElement('button');
        lightboxNext.innerHTML = '»';
        lightboxNext.classList.add('lightbox-control');
        lightboxNext.dataset.next = index + 1;
        lightboxNext.addEventListener('click',(e)=>{
          changeImage(e.currentTarget.dataset.next);
        });
        lightboxControls.appendChild(lightboxNext);
      }
      lightboxWrapper.appendChild(lightboxControls);
      // Add to page
      document.body.appendChild(lightboxWrapper);
    }

    function changeImage(index) {
      if(index >= lightboxImages.length) {
        index = 0
      }
      else if(index < 0) {
        index = lightboxImages.length - 1
      }
      console.log(index);
      document.querySelector('.lightbox-image').setAttribute('src',lightboxImages[index].getAttribute('href'));
      lightboxPrevious.dataset.previous = parseInt(index) - 1;
      lightboxNext.dataset.next = parseInt(index) + 1;
    }
  },
};
