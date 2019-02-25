<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php do_action('newsshooter_meta') @endphp
  <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
  <script>
    var googletag = googletag || {};

    googletag.cmd = googletag.cmd || [];
    googletag.cmd.push(function() {

      var bannermapping = googletag.sizeMapping().
        // addSize([1024, 768], [970, 90]).
        addSize([800, 480], [728, 90]).
        addSize([640, 360], [468, 60]).
        addSize([360, 240], [320, 100]).

        addSize([0, 0], [88, 31]).
        // Fits browsers of any size smaller than 640 x 480
        build();

      var sidebarAmapping = googletag.sizeMapping().
        addSize([0, 0], []).
        addSize([1080, 250], [300, 250]). // Desktop
        build();

      var sidebarBmapping = googletag.sizeMapping().
        addSize([0, 0], []).
        addSize([1080, 400], [300, 600]). // Desktop
        build();

      var mainColumnAmapping = googletag.sizeMapping().
        addSize([0, 0], [320, 100]).
        addSize([1080, 400], []). // Desktop
        build();


      var gptAdSlots = [];

      gptAdSlots[0] = googletag.defineSlot('/98779178/MASTHEAD', [[970, 90], [728, 90], [468, 60], [320, 100]], 'div-gpt-ad-1538608241498-0').defineSizeMapping(bannermapping).addService(googletag.pubads());
      gptAdSlots[1] = googletag.defineSlot('/98779178/FOOTER', [[970, 90], [728, 90], [468, 60], [320, 100]], 'div-gpt-ad-1538607234909-0').defineSizeMapping(bannermapping).addService(googletag.pubads());

      gptAdSlots[2] = googletag.defineSlot('/98779178/POSITION_A_sidebar', [300, 250], 'div-gpt-ad-1538607848712-0').defineSizeMapping(sidebarAmapping).addService(googletag.pubads());
      gptAdSlots[3] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-0').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());
      gptAdSlots[4] = googletag.defineSlot('/98779178/POSITION_B_SIDEBAR', [300, 600], 'div-gpt-ad-1538607896136-0').defineSizeMapping(sidebarBmapping).addService(googletag.pubads());
      gptAdSlots[5] = googletag.defineSlot('/98779178/POSITION_C_SIDEBAR', [300, 250], 'div-gpt-ad-1541641714738-0').defineSizeMapping(sidebarAmapping).addService(googletag.pubads());

      // Googletag ad slots 6 - 10 inclusive are for dynamically inserted homepage ads:
      gptAdSlots[6] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-6').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());
      gptAdSlots[7] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-7').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());
      gptAdSlots[8] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-8').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());
      gptAdSlots[9] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-9').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());
      gptAdSlots[10] = googletag.defineSlot('/98779178/POSITION_A_MAINCOLUMN', [320, 100], 'div-gpt-ad-1541642158566-10').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());


      googletag.pubads().enableSingleRequest();
      googletag.pubads().collapseEmptyDivs();
      googletag.enableServices();
    });
  </script>

  @php wp_head() @endphp
</head>
