$(".banner").owlCarousel({
    autoplay: !0,
    autoplayTimeout: 3e3,
    autoplayHoverPause: !0,
    nav: !1,
    loop: !0,
    margin: 10,
    responsiveClass: !0,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        100: {
            items: 1
        }
    }
})
$(".gallery").owlCarousel({
    nav: !1,
    loop: !1,
    margin: 10,
    responsiveClass: !0,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        100: {
            items: 4
        }
    }
})
$(".video").owlCarousel({
    nav: !1,
    loop: !1,
    margin: 10,
    responsiveClass: !0,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        100: {
            items: 2
        }
    }
})
$(".test-popup-link").magnificPopup({
    gallery: {
        enabled: true
    },
    type: "image"
})
$(".test-popup-link2").magnificPopup({
    gallery: {
        enabled: true
    },
    type: "image"
})