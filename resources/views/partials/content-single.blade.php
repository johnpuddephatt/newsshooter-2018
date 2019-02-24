<article {{ post_class() }} >
  <header class="entry-header">
    <a class="entry-category" href="/category/{{ get_the_category()[0]->slug }}">{{ wp_specialchars_decode(get_the_category()[0]->name) }}</a>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content-wrapper">

    <div class="entry-content">
      @if( has_post_video() )
        <div class="entry-video embed-responsive embed-responsive-16by9">
          {{ the_post_video() }}
        </div>
      @elseif( has_post_thumbnail() )
        <div class="entry-image">
          {{ the_post_thumbnail( '16by9-l' ) }}
        </div>
      @endif
      <div class="entry-content--inner">

        @php do_action('before_content') @endphp
        <div class="entry-content--content">
          {!! the_content() !!}
        </div>
        @php do_action('after_content') @endphp
        @if ((get_the_author_meta('nickname') != 'Newsshooter') && (get_the_author_meta('first_name') or get_the_author_meta('last_name')))
          @include('partials/entry-author-box')
        @endif
        <footer>
          {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        </footer>
        <div class="after-entry">
          @php dynamic_sidebar('after-entry') @endphp
          @php do_action('after_entry') @endphp
        </div>
      </div>
      @php comments_template('/partials/comments.blade.php') @endphp
      <div class="after-comments">

      @php global $post;
        $args = array( 'posts_per_page' => 3, 'offset'=> 1, 'exclude' => $post->ID );
        $myposts = get_posts( $args );
      @endphp
      <div class="latest-posts latest-posts__single">
        <h2 class="latest-posts--title">Latest news</h2>
        @foreach ( $myposts as $post )
          @php setup_postdata( $post ) @endphp
          @include('partials.content-'.get_post_type(), ['post_class' => 'latest-post', 'thumbnail_size'=> 'thumbnail'])
        @endforeach
        @php wp_reset_postdata() @endphp
      </div>

        @php dynamic_sidebar('after-comments') @endphp
        @php do_action('after_comments') @endphp
      </div>

    </div>
    <div class="entry-sidebar">
      @include('partials.sidebar')
    </div>
  </div>
</article>
