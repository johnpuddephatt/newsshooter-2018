<form role="search" method="get" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
  <label>
    <span class="sr-only">{{ _x( 'Search for:', 'label' ) }}</span>
    <input type="search" class="search-field" placeholder="{!! esc_attr_x( 'Search &hellip;', 'placeholder' ) !!}" value="{{ get_search_query() }}" name="s" />
  </label>
  <button class="search-submit" type="submit"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
</form>