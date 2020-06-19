import { gsap } from "gsap";
//import { MotionPathPlugin } from "gsap/MotionPathPlugin";

//gsap.registerPlugin(MotionPathPlugin);

function launchIntro() {
    // gsap.set("#obj1", { xpercent: -50, yPercent: -50, transformOrigin: "50% 50%" });
    // gsap.set("#obj2", { xpercent: -50, yPercent: -50, transformOrigin: "50% 50%" });

    gsap.from("#erp", {
        duration: 1,
        opacity: 0,
        delay: 0,
        ease: "power1.inOut",
        immediateRender: true,
    });
    gsap.from("#portail", {
        duration: 1,
        opacity: 0,
        delay: 0.5,
        ease: "power1.inOut",
        immediateRender: true,
    });
    gsap.from("#links", {
        duration: 1,
        opacity: 0,
        delay: 1,
        ease: "power1.inOut",
        immediateRender: true,
    });
    gsap.from("#folder", {
        duration: 1,
        opacity: 0,
        delay: 1.5,
        ease: "power1.inOut",
        immediateRender: true,
    });
}

export { launchIntro }