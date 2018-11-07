
  <article class="entry--author-box">
    <div class="entry--author-box--image">
      {!! get_avatar(get_the_author_meta( 'ID' ), 128, '' , 'Image of' . get_the_author_meta('first_name') . get_the_author_meta('last_name') , array('class' => 'is-rounded') ) !!}
    </div>
    <div class="entry--author-box--content">
      <a class="entry--author-box--name" href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
        By {{ get_the_author_meta('first_name') }} {{ get_the_author_meta('last_name') }}
        @if (get_the_author_meta('user_site_role'))
          <span class="tag very-small is-dark">{{ get_the_author_meta('user_site_role') }}</span>
        @endif
      </a>
      <p>{{ nl2br(get_the_author_meta('description')) }}</p>
      <nav class="entry--author-box--social">
        @if ( get_the_author_meta('twitter'))
          <a class="" aria-label="Link to author’s Twitter profile" href="{{ esc_url( 'http://twitter.com/' . get_the_author_meta( 'twitter' )) }}">
            <i class="fab fa-twitter" aria-hidden="true"></i>
          </a>
        @endif
        @if ( get_the_author_meta('instagram'))
          <a class="" aria-label="Link to author’s Instagram profile" href="{{ esc_url( 'http://instagram.com/' . get_the_author_meta( 'instagram' )) }}">
            <i class="fab fa-instagram" aria-hidden="true"></i>
            </span>
          </a>
        @endif
        @if ( get_the_author_meta('youtube'))
          <a class="" aria-label="Link to author’s Youtube channel" href="{{ esc_url( get_the_author_meta( 'youtube' )) }}">
            <span class="icon is-small">
              <i class="fab fa-youtube" aria-hidden="true"></i>
            </span>
          </a>
        @endif
        @if ( get_the_author_meta('vimeo'))
          <a class="" aria-label="Link to author’s Vimeo channel" href="{{ esc_url( get_the_author_meta( 'vimeo' )) }}">
            <span class="icon is-small">
              <i class="fab fa-vimeo" aria-hidden="true"></i>
            </span>
          </a>
        @endif
      </nav>
    </div>
  </article>



