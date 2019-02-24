@php do_action('before_post_entry_header') @endphp

<div class="entry-meta">
  @if( is_single($post->ID) )
    {{ newsshooter_tags_and_products() }}
  @endif

  <div class="entry-byline">
    @if ((get_the_author_meta('nickname') != 'Newsshooter') && (get_the_author_meta('first_name') or get_the_author_meta('last_name')))
        @if(is_single($post->ID))
          <div class="entry-byline--image">
            {!! get_avatar(get_the_author_meta( 'ID' ), 64, '' , 'Image of' . get_the_author_meta('first_name') . get_the_author_meta('last_name') , array('class' => 'is-rounded') ) !!}
          </div>
        @endif
        <a class="entry-byline--name" href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
          {{ get_the_author_meta('first_name') }} {{ get_the_author_meta('last_name') }}
        </a>
    @endif

    <time class="entry-byline--time timeago" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    <div class="entry-byline--comments">
      <i class="far fa-comment-alt"></i>
      <a class="entry-comment-count" data-disqus-identifier="{{ get_the_ID()}} https://www.newsshooter.com/?p={{ get_the_ID()}}" href="{{ get_permalink() }}#disqus_thread"></a>
    </div>
  </div>
</div>
@php do_action('after_post_entry_header') @endphp
