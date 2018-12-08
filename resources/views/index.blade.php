@extends('layouts.app')

@section('content')

  @php
    $do_not_duplicate = [];
    $loop_index = 0;
  @endphp

  @if(is_home() && !is_paged())
    @php
      global $wp_query;
      $acs = new Acs();
      $acs->query_posts(array('group_name' => 'Featured'));
    @endphp


    <div class="featured-posts">
      @while (have_posts())
        @php the_post() @endphp
        @include('partials.content-'.get_post_type(), ['post_class' => 'featured-post featured-post__' . ($wp_query->current_post + 1),'thumbnail_size' => (($wp_query->current_post >= 1) ? '4by3-s' : '4by3-m')])
        @php $do_not_duplicate[] = get_the_id() @endphp
      @endwhile
    </div>

    @php wp_reset_query(); @endphp
  @endif

  @php dynamic_sidebar('mobile-content-a') @endphp

  <div class="home-wrapper">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

  <div class="home-section home-section__part-one">
    <div class="latest-posts latest-posts__home latest-posts__part-one">
      @if(is_front_page())
        <h2 class="latest-posts--title">Latest news</h2>
      @else
        @include('partials.page-header')
      @endif

      @if(is_home())
        @php $post_count = 4 @endphp
      @else
        @php $post_count = 100 @endphp
      @endif

      @while (have_posts() && ($loop_index < $post_count))
        @php the_post() @endphp
        @if(!in_array( get_the_id(), $do_not_duplicate ))
          @include('partials.content-'.get_post_type(), ['post_class' => 'latest-post', 'thumbnail_size'=> 'medium'])
          @php $loop_index++ @endphp
        @endif
      @endwhile

      @if (!is_home())
        <div class="post-navigation"><?php posts_nav_link(); ?></div>
      @endif

    </div>
    <div class="homepage-sidebar homepage-sidebar__part-two">
      @php dynamic_sidebar('sidebar-primary') @endphp
      @if(is_paged() || !is_home())
        @php dynamic_sidebar('sidebar-secondary') @endphp
      @endif
    </div>
  </div>


  @if(is_home() && !is_paged())


      @php
        $acs = new Acs();
        $acs->query_posts(array('group_name' => 'Editors picks'))
      @endphp

      <div class="editors-posts">
        <h2 class="editors-posts--title">Editor’s picks</h2>
        <div class="editors-posts--wrap">
          @while (have_posts())
            @php the_post() @endphp
            @include('partials.content-'.get_post_type(), ['post_class' => 'featured-post','thumbnail_size' => 'medium_large'])
          @endwhile
        </div>
      </div>

      @php wp_reset_query(); @endphp



    <div class="home-section home-section__part-two">
      <div class="latest-posts latest-posts__home latest-posts__part-two">
        @while (have_posts() )
          @php the_post() @endphp
          @if(!in_array( get_the_id(), $do_not_duplicate ))
            @include('partials.content-'.get_post_type(), ['post_class' => 'latest-post','thumbnail_size' => 'medium'])
          @endif
        @endwhile

        <button class="button ghost" id="more_posts" data-page="2" href="#" data-loading-text="Loading" data-default-text="Load more" >Load More</button>

      </div>
      <div class="homepage-sidebar homepage-sidebar__part-two">
        @php dynamic_sidebar('sidebar-secondary') @endphp
      </div>
    </div>
  @endif

</div>

@endsection
