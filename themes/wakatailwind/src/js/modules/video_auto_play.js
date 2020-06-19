
import ScrollMagic from 'scrollmagic'

const controller = new ScrollMagic.Controller();

var videos = $('.video_auto_play');
//console.log(videos);
for (var i = 0; i < videos.length; i++) { // create a scene for each element
    new ScrollMagic.Scene({
        triggerElement: videos[i], // y value not modified, so we can use element as trigger as well
        triggerHook: 0.5, // show, when scrolled 40% into view
        duration: "40%", // hide 10% before exiting view (80% + 10% from bottom)
        offset: 50 // move trigger to center of element
    }).addTo(controller)
        .on("enter", function (e) {
            e.target.triggerElement().play()
        })
        .on("leave", function (e) {
            e.target.triggerElement().pause()
        });
    //console.log(videos[i]);
}
