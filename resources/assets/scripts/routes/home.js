import timeago from 'timeago.js';

export default {
  init() {
    // JavaScript to be fired on the home page
      var ajaxUrl = "/wp-admin/admin-ajax.php";
      var page;
      var ajaxButton = document.querySelector('#more_posts');

      ajaxButton.addEventListener('click',function(e){ // When btn is pressed.
        e.preventDefault();
        page = this.dataset.page;
        ajaxButton.setAttribute("disabled",true); // Disable the button, temp.
        ajaxButton.innerText = this.dataset.loadingText;
        var ajaxData = 'action=more_post_ajax&paged=' + page;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', ajaxUrl , true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        xhr.setRequestHeader('Pragma', 'no-cache');
        xhr.setRequestHeader('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

        xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
          // Success!
          var posts = xhr.responseText;
          ajaxButton.insertAdjacentHTML('beforebegin', posts);
          ajaxButton.removeAttribute("disabled");
          ajaxButton.innerText = ajaxButton.dataset.defaultText;
          ajaxButton.dataset.page = (parseInt(page) + 1);
          timeago().render(document.querySelectorAll('.timeago'));
          window.googletag.pubads().refresh();
          window.DISQUSWIDGETS = undefined;
          // window.jQuery.getScript("https://" + window.disqus_shortname + ".disqus.com/count.js");
          var count_script = document.createElement('script');
          count_script.src = "https://" + window.disqus_shortname + ".disqus.com/count.js";
          count_script.async = true;
          document.getElementsByTagName('head')[0].appendChild(count_script);

        } else {
          ajaxButton.removeAttribute("disabled");
          ajaxButton.innerText = ajaxButton.dataset.defaultText;
        }
      };

      xhr.onerror = function() {
        // There was a connection error of some sort
      };

      xhr.send(ajaxData);

    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
