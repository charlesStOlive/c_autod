import { gsap } from "gsap";
var pilliers = document.querySelectorAll(".link_animation");

function link_animation() {
    $(".link_animation").hover(
        function () {
            var link = this.dataset.svgLink
            $('#' + this.dataset.svgGroup).children().each(function (index) {
                var childId = $(this).attr('id');
                if (childId != link) {
                    gsap.to('#' + $(this).attr('id'), {
                        duration: 1,
                        opacity: 0.2,
                        delay: 0,
                        ease: "power1.inOut",
                        immediateRender: true,
                    });
                }
            });
        },
        function () {
            $('#' + this.dataset.svgGroup).children().each(function (index) {
                gsap.to('#' + $(this).attr('id'), {
                    duration: 1,
                    opacity: 1,
                    delay: 0,
                    ease: "power1.inOut",
                    immediateRender: true,
                });
            });
        }
    );
}

export { link_animation }