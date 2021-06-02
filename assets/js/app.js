import {tns} from "tiny-slider/src/tiny-slider";


let slider = tns({
    container: '.slider',
    items : 1,
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    controls: false,
    navContainer: '.slide-nav'
});