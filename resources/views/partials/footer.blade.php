<div class="footer-ad-unit">
  @php dynamic_sidebar( 'before-footer' ) @endphp
</div>

<footer>
  @if(get_option( 'ns_socialmedia'))
    <div class="site-pre-footer">
      <div class="container pre-footer-social">
        <h3 class="pre-footer-social-header">Connect with us</h3>
        <div class="pre-footer-social-icons">
          @if(array_key_exists('twitter',get_option( 'ns_socialmedia')))
            <a class="level-item" target="_blank" aria-label="Link to Twitter account" href="{{ get_option( 'ns_socialmedia')['twitter'] }}">
              <span class="icon">
                <i class="fab fa-twitter" aria-hidden="true"></i>
              </span>
            </a>
          @endif
          @if(array_key_exists('facebook',get_option( 'ns_socialmedia')))
            <a class="level-item" target="_blank" aria-label="Link to Facebook account" href="{{ get_option( 'ns_socialmedia')['facebook'] }}">
              <span class="icon">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
              </span>
            </a>
          @endif
          @if(array_key_exists('instagram',get_option( 'ns_socialmedia')))
            <a class="level-item" target="_blank" aria-label="Link to Instagram account" href="{{ get_option( 'ns_socialmedia')['instagram'] }}">
              <span class="icon">
                <i class="fab fa-instagram" aria-hidden="true"></i>
              </span>
            </a>
          @endif
          @if(array_key_exists('youtube',get_option( 'ns_socialmedia')))
            <a class="level-item" target="_blank" aria-label="Link to Youtube channel" href="{{ get_option( 'ns_socialmedia')['youtube'] }}">
              <span class="icon">
                <i class="fab fa-youtube" aria-hidden="true"></i>
              </span>
            </a>
          @endif
          @if(array_key_exists('vimeo',get_option( 'ns_socialmedia')))
            <a class="level-item" target="_blank" aria-label="Link to Vimeo channel" href="{{ get_option( 'ns_socialmedia')['vimeo'] }}">
              <span class="icon">
                <i class="fab fa-vimeo" aria-hidden="true"></i>
              </span>
            </a>
          @endif
        </div>
      </div>
    </div>
  @endif

  <div class="site-footer">
    <div class="container">
        <div class="site-footer--about">
          <img class="site-footer--about--logo" src="@asset('images/NS_Logo_W.svg')" width="300" />
          <h3 class="site-footer--about--header">About {{ bloginfo('name') }}</h3>
          <p>{{ nl2br(bloginfo('description')) }}</p>
          <p>&copy; Newsshooter {{ date("Y") }}</p>
        </div>
        <nav class="site-footer--nav-left">
          @if (has_nav_menu('footer_navigation_left'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation_left', 'menu_class' => 'nav']) !!}
          @endif
        </nav>
        <nav class="site-footer--nav-middle">
          @if (has_nav_menu('footer_navigation_center'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation_center', 'menu_class' => 'nav']) !!}
          @endif
        </nav>
        <div class="site-footer--nav-right">
          @if (has_nav_menu('footer_navigation_left'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation_right', 'menu_class' => 'nav']) !!}
          @endif
        </div>
    </div>
  </div>
</footer>
