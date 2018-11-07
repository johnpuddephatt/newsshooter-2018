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
        <img src="@asset('images/NS_Logo.svg')" width="250"/>
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
  @if (has_nav_menu('primary_navigation') && is_home() )
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'container navigation primary-navigation']) !!}
  @endif
</div>

<div class="masthead-ad-unit">
  @php dynamic_sidebar( 'after-masthead' ) @endphp
</div>
