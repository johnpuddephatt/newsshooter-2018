<?php

/*
Plugin Name: Social media sharing buttons
Description: Simple lil' links
*/

add_action('before_content', 'newsshooter_socialshare', 14);

function newsshooter_socialshare() {
	if( is_single() ) {
		$sURL = get_permalink();
        $title = wp_title('–',false,'right');
        $page_title = str_replace('&', '%26', $title);
		// $page_title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');

		$socialicons = [];

		array_push($socialicons, ['twitter', '<span class="icon"><i class="fab fa-twitter" aria-hidden="true"></i></span>', 'https://twitter.com/intent/tweet?url='.$sURL.'&text='.$page_title]);
		array_push($socialicons, ['facebook', '<span class="icon"><i class="fab fa-facebook-f" aria-hidden="true"></i></span>', 'https://www.facebook.com/sharer/sharer.php?u='.$sURL]);
		// array_push($socialicons, ['googleplus','<span class="icon"><i class="fab fa-google-plus" aria-hidden="true"></i></span>', 'https://plus.google.com/share?url='.$sURL]);
		array_push($socialicons, ['linkedin', '<span class="icon"><i class="fab fa-linkedin" aria-hidden="true"></i></span>', 'http://www.linkedin.com/shareArticle?mini=true&url='.$sURL.'&title='.$page_title]);

		$pattern = '<div class="simple-social-icons sharing-icons--wrapper">Share this article <ul class="sharing-icons">';

		foreach($socialicons as $val) {
		    $pattern .= '<li class="sharing-icons--icon social-'. $val[0] .'"><a href="'. $val[2] .'">' . $val[1] . '</a></li>';
		}

		$pattern .= '</ul></div>';
		echo $pattern;
		}
	};

	add_action('footer_scripts', 'newsshooter_socialshare_script');

	function newsshooter_socialshare_script() {

		if( is_singular() ) { ?>

			<script>
			// create social networking pop-ups
			(function() {
				// link selector and pop-up window size
				var Config = {
					Link: ".sharing-icons a",
					Width: 555,
					Height: 661
				};

				// add handler links
				var slink = document.querySelectorAll(Config.Link);
				for (var a = 0; a < slink.length; a++) {
					slink[a].onclick = PopupHandler;
				}

				// create popup
				function PopupHandler(e) {
					// popup position
					var
						px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
						py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
					// open popup
					var popup = window.open(this.href, "social",
						"width="+Config.Width+",height="+Config.Height+
						",left="+px+",top="+py+
						",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
					if (popup) {
						popup.focus();
						if (e.preventDefault) e.preventDefault();
						e.returnValue = false;
					}
					return !!popup;
				}
			}());

			</script>

			<?php }

	};

?>
