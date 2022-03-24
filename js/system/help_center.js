AOS.init();

$(".help_center").owlCarousel({
	autoplay: true,
	autoplayTimeout: 1500,
	loop: true,
	margin: 25,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
});

Fancybox.bind("[data-fancybox]", {
	closeButton: "top"
});