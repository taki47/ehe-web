<!DOCTYPE html>
<html dir="ltr" lang="hu-HU">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Takiwebneked.hu" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="shortcut icon" href="/images/logo.jpg">

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/et-line.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/custom.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/main.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/colors8c00.css?color=FF8600" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/fonts/fonts.css" type="text/css" />
	<link rel="stylesheet" href="/assets/public/css/news.css" type="text/css" />

	<link rel="stylesheet" href="/assets/public/include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" href="/assets/public/include/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="/assets/public/include/rs-plugin/css/navigation.css">

	<link rel="stylesheet" href="/assets/public/include/slick/slick.css">
    <link rel="stylesheet" href="/assets/public/include/slick/slick-theme.css">

    <link rel="stylesheet" href="/assets/public/include/smartmenu/css/sm-core-css.css">
    <link rel="stylesheet" href="/assets/public/include/smartmenu/css/sm-mint/sm-mint.css">

	<link rel="stylesheet" href="/assets/public/include/fontawesome/css/all.min.css">

	<title>{{ \App\Models\Translation::getTranslation('site.name') }}</title>

	<!-- header kódok -->
	{{ $settings[9]->value }}
</head>

<body class="stretched">

	<div id="wrapper" class="clearfix">
		<!-- logo, login -->
		<header id="header" class="header-size-sm" data-sticky-shrink="false">
			<div class="container">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<div class="row text-center">
							<div class="col-12">
								<img class="img-fluid" style="max-height:120px;" src="/images/logo.jpg" alt="{{ \App\Models\Translation::getTranslation('site.name') }}">
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- / logo, login -->

		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					@yield('content')
				</div>
			</div>
		</section>
	</div>

	<div id="toTop" class="icon-angle-up"></div>

	<script src="/assets/public/js/jquery.js"></script>
	<script src="/assets/public/js/plugins.min.js"></script>

	<script src="/assets/public/js/functions.js"></script>

	<script src="/assets/public/include/slick/slick.min.js"></script>
	<script src="/assets/public/include/smartmenu/jquery.smartmenus.min.js"></script>

	<script src="/assets/public/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="/assets/public/include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>

    @yield('scripts')

	<script>
		var tpj = jQuery;
		var revapi19;
		var $ = jQuery.noConflict();
		tpj(document).ready(function () {
			revapi19 = tpj("#bannerSlider").show().revolution({
				sliderType: "carousel",
				jsFileLocation: "include/rs-plugin/js/",
				sliderLayout: "fullwidth",
				dottedOverlay: "none",
				delay: 7000,
				navigation: {
					keyboardNavigation: "off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation: "off",
					onHoverStop: "off"
				},
				carousel: {
					horizontal_align: "center",
					vertical_align: "center",
					fadeout: "on",
					vary_fade: "on",
					maxVisibleItems: 3,
					infinity: "on",
					space: 0,
					stretch: "off",
					showLayersAllTime: "off",
					easing: "Power3.easeInOut",
					speed: "800"
				},
				responsiveLevels: [1140, 992, 768, 576],
				visibilityLevels: [1140, 992, 768, 576],
				gridwidth: [850, 700, 400, 300],
				gridheight: [460, 480, 400, 320],
				lazyType: "single",
				shadow: 0,
				spinner: "off",
				stopLoop: "on",
				stopAfterLoops: -1,
				stopAtSlide: -1,
				shuffle: "off",
				autoHeight: "off",
				disableProgressBar: "off",
				hideThumbsOnMobile: "off",
				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				debugMode: false,
				fallbacks: {
					simplifyAll: "off",
					nextSlideOnWindowFocus: "off",
					disableFocusListener: false,
				}
			});
		}); /* Revolution Slider End */

		// Navbar on hover
		$('.nav.tab-hover a.nav-link').hover(function () {
			$(this).tab('show');
		});

		//tiles
		$(".tiles .container").slick({
                speed: 300,
				infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                dots: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                    }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

		$(".supporters").slick({
			autoplay: true,
			speed: 500,
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 4,
			dots: false,
			arrows: false,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 4
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3
				}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				}
			]
		});

		$(".partners").slick({
			autoplay: true,
			speed: 300,
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 4,
			dots: false,
			arrows: false,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 4
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3
				}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				}
			]
		});

		$(".tile").on("click", function() {
                let menu = $(this).attr("menu-toggle");

				// csempéről selected class levétele
				$(".tile").each(function() {
                    $(this).removeClass("selected");
                });

				// aktuális csempére selected class rárakása
				$(this).addClass("selected");

				// már megnyitott menük elrejtése
                $("#tile-menus .main-nav").each(function() {
                    $(this).addClass("d-none");
                });

                $("#menu-"+menu).removeClass("d-none");
            });

			$('.tile-menu').smartmenus({
				subMenusSubOffsetX: 1,
				subMenusSubOffsetY: -8
			});

		// to top
		$(window).scroll(function() {
			if ($(this).scrollTop()) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});

		$("#toTop").click(function() {
			$("html, body").animate({scrollTop: 0}, 1000);
		});

		$(".haslink").on("click", function() {
			let link = $(this).data("link");
			document.location.href=link;
		});

		
	</script>
</body>

</html>