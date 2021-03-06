@if(get_option('sitewidebanner'))
  <div class="site-wide-banner">
    <div class="container">
      {{ get_option('sitewidebanner') }}
      @if(get_option('sitewidebanner_link_text') && get_option('sitewidebanner_link_url'))
      <a href="{{ get_option('sitewidebanner_link_url') }}">{{ get_option('sitewidebanner_link_text') }} &rarr;</a>
      @endif
    </div>
  </div>
@endif

<header class="header">
  <div class="container">
    <div class="header--inner">
      <div class="header--search-link--container">
        <button class="header--button header--search-link">
          <span class="icon">
            <i class="fa fa-search"></i>
          </span>
          <span class="header--button-text">
            Search
          </span>
        </button>
        <div class="search-form--container">
          <div class="container">
            {!! get_search_form(false) !!}
          </div>
        </div>
      </div>

      <a class="header--home-link" href="{{ home_url('/') }}">
        <img src="@asset('images/NS_Logo_10years_simplified.svg')" width="250"/>
      </a>

      <div class="header--newsletter-link--container">
        <a href="https://newsshooter.us12.list-manage.com/subscribe/post?u=c882358b837abdc3bca261c95&id=c7e39b51db" class="header--button header--newsletter-link">
          <span class="icon">
            <i class="far fa-envelope"></i>
          </span>
          <span class="header--button-text">
            Newsletter
          </span>
        </a>
      </div>
    </div>
  </div>
</header>

<div class="primary-navigation--wrapper">
  <div class="container">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navigation primary-navigation']) !!}
      <div class="menu-link--container">
        <button class="menu-link">
          <span class="icon">
            <i class="fa fa-bars"></i>
          </span>
          <span class="sr-only menu-link--text">
            Menu
          </span>
        </button>
        <div class="menu-form--container">
          <div class="container">
            <button class="menu-close">
              ×
              <span class="sr-only menu-close--text">
                Close
              </span>
            </button>
            <img class="popover-logo" src="@asset('images/NS_Logo_Marque.svg')" width="450"/>
            @if (has_nav_menu('footer_navigation_left'))
              {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navigation popover-navigation']) !!}
            @endif
            @if (has_nav_menu('footer_navigation_left'))
              {!! wp_nav_menu(['theme_location' => 'footer_navigation_right', 'menu_class' => 'navigtaion popover-navigation']) !!}
            @endif
          </div>
        </div>
      </div>
    @endif
  </div>
</div>

<div class="masthead-ad-unit">
  @php dynamic_sidebar( 'after-masthead' ) @endphp
</div>
