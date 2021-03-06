@extends('layouts.app')

@section('content')
  <div class="search-results--wrapper">
    @include('partials.page-header')

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    <div class="search-results--posts latest-posts">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content',['post_class' => 'latest-post','thumbnail_size' => 'medium_large'])
      @endwhile
    </div>

    <div class="post-navigation"><?php posts_nav_link(); ?></div>
  </div>
@endsection
