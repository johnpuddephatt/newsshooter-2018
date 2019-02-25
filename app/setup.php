<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), null, null, true);
    // wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
    // if (is_single() && comments_open() && get_option('thread_comments')) {
    //     wp_enqueue_script('comment-reply');
    // }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {

    include_once( get_stylesheet_directory() . '/inc/newsshooter-socialshare.php' );
    include_once( get_stylesheet_directory() . '/inc/newsshooter-tags.php' );
    include_once( get_stylesheet_directory() . '/inc/newsshooter-productstaxonomy.php' );
    include_once( get_stylesheet_directory() . '/inc/newsshooter-replacementauthorbox.php' );
    include_once( get_stylesheet_directory() . '/inc/newsshooter-socialsettings.php' );
    include_once( get_stylesheet_directory() . '/inc/newsshooter-meta.php' );


    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    // add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'editors_picks' => __('Editor’s Picks', 'sage'),
        'footer_navigation_left' => __('Footer Navigation Left', 'sage'),
        'footer_navigation_right' => __('Footer Navigation Right', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Secondary', 'sage'),
        'id'            => 'sidebar-secondary'
    ] + $config);
    register_sidebar([
        'name'          => __('After masthead', 'sage'),
        'id'            => 'after-masthead'
    ] + $config);
    register_sidebar([
        'name'          => __('After entry', 'sage'),
        'id'            => 'after-entry'
    ] + $config);
    register_sidebar([
        'name'          => __('Before footer', 'sage'),
        'id'            => 'before-footer'
    ] + $config);
    register_sidebar([
        'name'          => __('After comments', 'sage'),
        'id'            => 'after-comments'
    ] + $config);
    register_sidebar([
        'name'          => __('Mobile content A', 'sage'),
        'id'            => 'mobile-content-a'
    ] + $config);
    register_sidebar([
        'name'          => __('Mobile content B', 'sage'),
        'id'            => 'mobile-content-b'
    ] + $config);
    register_sidebar([
        'name'          => __('Mobile content C', 'sage'),
        'id'            => 'mobile-content-c'
    ] + $config);

});


/**
 * Additional image sizes
**/

// re-setting large and medium sizes here allows us to enforce hard cropping.
add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true ); // 740 x 416px; Featured image on post, large in-post images
add_image_size('medium_large', 480, 270, true );
add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true ); // In-post images

// add_image_size( '4by3-xl', 1600, 1200, true );
// add_image_size( '4by3-l', 1200, 900, true );
add_image_size( '4by3-m', 800, 600, true ); // Featured image #1
add_image_size( '4by3-s', 400, 300, true ); // Featured image #2
add_image_size( '4by3-xs', 200, 150, true );

add_image_size('16by9-s', 480, 270, true ); // duplicates medium_large but medium_large won't show in image cropper...
add_image_size( '16by9-l', 740, 416, true ); // duplicates large but medium_large won't show in image cropper...

// add_image_size( '16by9-xl', 1600, 900, true );
// add_image_size( '16by9-l', 1200, 675, true );
// add_image_size( '16by9-m', 800, 450, true );
// add_image_size( '16by9-s', 400, 225, true ); // search results;  editor's picks
// add_image_size( '16by9-xs', 240, 135, true ); //  homepage latest;

/**
 * AJAX $loop
 */

function more_post_ajax(){
  header("Content-Type: text/html");
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $_POST['paged']
  );

  $loop = new \WP_Query($args);
  // Googletag ad slots 6 - 10 inclusive are for dynamically inserted homepage ads
  if( $args['paged'] <= 6) {
      echo '<br>';
      echo '<div id="div-gpt-ad-1541642158566-' . ($args['paged'] + 4) . '" class="dfp-ad-unit" style="height:100px; width:320px;">';
      echo '<script>gptAdSlots.push(googletag.defineSlot("/98779178/POSITION_A_MAINCOLUMN", [320, 100], "div-gpt-ad-1541642158566-' . ($args['paged'] + 4) . ').defineSizeMapping(mainColumnAmapping).addService(googletag.pubads());)</script>';
      echo '<script>console.log("hello")</script>';
      echo '</div>';
  }

  while ($loop->have_posts()) { $loop->the_post();
    echo \App\template('partials.content-'.get_post_type(), ['post_class' => 'latest-post','thumbnail_size' => 'thumbnail']);
    };

  // echo '<script>window.FOO = 'bar';console.log("attempting refresh");window.DISQUSWIDGETS = undefined;setTimeout(function() { window.jQuery.getScript("https://" + disqus_shortname + ".disqus.com/count.js"), 1000})</script>';

  exit;
 }

add_action('wp_ajax_nopriv_more_post_ajax', 'App\more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'App\more_post_ajax');

/**
 * Set panels hidden by default
 */

add_filter('default_hidden_meta_boxes',function(){
  //lets hide everything
  $hidden = array('postexcerpt','slugdiv','postcustom','trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');
  $hidden[] = 'acs_options';//for custom meta box, enter the id used in the add_meta_box() function.
  return $hidden;
});

/**
 * Wrap iframes to allow control of aspect ratio
 */
add_filter('the_content', function($content){
  // $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
  $pattern = '~<iframe.*www\.youtube\.com\/embed\/.*</iframe>~';
  // $pattern = '/<iframe.*?src="http:\/\/www\.youtube\.com\/embed\/(.*)".*?\/iframe>/si';

  preg_match_all($pattern, $content, $matches);

  foreach ($matches[0] as $match) {
      // wrap matched iframe with div
      $wrappedframe = '<div class="embed-responsive embed-responsive-16by9">' . $match . '</div>';
      //replace original iframe with new in content
      $content = str_replace($match, $wrappedframe, $content);
  }
  return $content;
});


/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
