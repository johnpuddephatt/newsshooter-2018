// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import { faFacebookF, faInstagram, faTwitter, faYoutube, faVimeo, faLinkedin, faGooglePlus } from "@fortawesome/free-brands-svg-icons";
import { faSearch, faBars } from "@fortawesome/free-solid-svg-icons";
import { faEnvelope, faCommentAlt } from "@fortawesome/free-regular-svg-icons";
import { config } from '@fortawesome/fontawesome-svg-core';

config.autoAddCss = false;
config.searchPseudoElements=true;

// add the imported icons to the library
library.add(faBars, faEnvelope, faCommentAlt, faSearch, faFacebookF, faInstagram, faTwitter, faYoutube, faVimeo, faLinkedin, faGooglePlus);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();
