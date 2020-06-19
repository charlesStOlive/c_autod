import $ from 'jquery/dist/jquery.min';
window.jQuery = $;
window.$ = $;

//var Flickity = require('flickity');

import { changeMenuOnScroll } from './modules/mobile_behavior.js';
import { checkMenu } from './modules/menu_behavior.js';
import { launchIntro } from './modules/introAnimations.js';
import { link_animation } from './modules/link_animation.js';
import './modules/modal_behavior.js';
import './modules/carousel.js';
import './modules/video_auto_play.js';

import BeforeAfter from "./plugins/BeforeAfter";

console.log("yo");


//import ScrollMagic from 'scrollmagic'
// //import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators' // Or use scrollmagic-with-ssr to avoid server rendering problems
// import { TweenMax, TimelineMax } from "gsap"; // Also works with TweenLite and TimelineLite
// import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";

// ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);

/*
* Application
*/


//launchIntro();
changeMenuOnScroll();

link_animation();

//launchAnimeOnScroll();
document.onclick = checkMenu;

var bf1 = document.getElementById("one");
var bf2 = document.getElementById("two");
if (bf1) {
    new BeforeAfter({
        id: "#one"
    });
}
if (bf2) {
    new BeforeAfter({
        id: "#two"
    });
}


