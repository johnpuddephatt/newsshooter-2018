<article @php post_class($post_class) @endphp>
  <a class="entry-image" href="{{ get_permalink() }}">
    @if( has_post_thumbnail() )
      {{ the_post_thumbnail( $thumbnail_size ) }}
    @else
      <img src="@asset('images/no_thumb.png')"/>
    @endif
  </a>
  <header class="entry-summary">
    <a class="entry-category" href="/category/{{ get_the_category()[0]->slug }}">{{ get_the_category()[0]->name }}</a>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @include('partials/entry-meta')
  </header>
</article>
