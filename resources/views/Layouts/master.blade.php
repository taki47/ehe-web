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
					<div class="col-12 col-md-8 d-flex justify-content-center">
						<div class="row text-center">
							<div class="col-12 col-md-4">
								<a href="{{ route("home", app()->getLocale()) }}"><img class="img-fluid" style="max-height:120px;" src="/images/logo.jpg" alt="{{ \App\Models\Translation::getTranslation('site.name') }}"></a>
							</div>
							<div class="col-12 col-md-8 m-auto">
								<p class="fs-4 m-0">{{ \App\Models\Translation::getTranslation('site.name') }}</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-4 d-flex justify-content-center">
						<ul class="nav align-items-center justify-content-center justify-content-sm-end">
							<li class="nav-item text-center">
								<div class="row">
									<div class="col-12 col-md-8 nevnapok">
										<div class="date-today text-uppercase badge bg-dark rounded-pill py-2 px-3 fw-medium d-inline-block d-lg-block">
											{{ \Carbon\Carbon::now()->isoFormat("LL") }}
										</div>
									</div>
									<div class="col-12 col-md-4 lang">
										<div class="dropdown">
											<button class="dropbtn">
												@php
													$currentLanguage = $languages->firstWhere('lang_code', app()->getLocale());
												@endphp
												<img src="/images/flags/{{ $currentLanguage->flag }}">
											</button>
											<div class="dropdown-content">
												@foreach ($languages as $language)
													<a href="{{ route("locale", [app()->getLocale(), $language->lang_code]) }}">
														<img src="/images/flags/{{ $language->flag }}" class="img-fluid"> {{ $language->name }}
													</a>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- / logo, login -->

		<!-- slider -->
		@if ( $settings[3]->value=="1" )
			<section id="slider" class="slider-element revslider-wrap h-auto">
				<div class="rev_slider_wrapper" style="width: 100%;margin: 0 auto; background:#000;padding:0px;margin-top:0px;margin-bottom:0px;">

					<div id="bannerSlider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
						<ul>
							@foreach ($banners as $banner)
								<li>
									<img src="{{ $banner->mediaUsages[0]->media->file_path."/".$banner->mediaUsages[0]->media->file_name }}" alt="{{ $banner->mediaUsages[0]->media->name }}">

									<a class="tp-caption font-primary tp-resizeme" href="{{ app()->getLocale()."/".$banner->link }}" target="_self" id="slide-1-layer-4"
										data-x="['left','left','left','left']" data-hoffset="['40','40','30','20']"
										data-y="['bottom','bottom','bottom','bottom']" data-voffset="['150','120','130','140']"
										data-fontsize="['40','35','25','25']" data-lineheight="['40','35','25','24']"
										data-width="['580','480','340','260']" data-height="none" data-whitespace="normal"
										data-type="text" data-actions='' data-basealign="slide" data-responsive_offset="on"
										data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
										data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
										data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
										data-paddingleft="[0,0,0,0]"
										style="z-index: 6; min-width: 580px; max-width: 580px; white-space: normal; font-size: 40px; line-height: 40px; font-weight: 600; color: rgba(255,255,255,1);text-decoration: none;">
										
										{{ $banner->title }}
									</a>

									<div class="tp-caption   tp-resizeme" id="slide-1-layer-5"
										data-x="['left','left','left','left']" data-hoffset="['40','40','30','20']"
										data-y="['bottom','bottom','bottom','bottom']" data-voffset="['65','65','48','48']"
										data-width="['580','480','340','260']" data-fontsize="['18','18','16','14']"
										data-lineheight="['26','24','24','20']" data-height="none" data-whitespace="normal"
										data-type="text" data-basealign="slide" data-responsive_offset="on"
										data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
										data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
										data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
										data-paddingleft="[0,0,0,0]"
										style="z-index: 7; min-width: 700px; max-width: 700px; white-space: normal; font-size: 18px; line-height: 26px; font-weight: 400; color: #DDD; font-family: 'Roboto', sans-serif;">
										{{ $banner->description }}
									</div>

									<div class="tp-caption tp-resizeme" id="slide-1-layer-6"
										data-x="['left','left','left','left']" data-hoffset="['40','40','30','20']"
										data-y="['bottom','bottom','bottom','bottom']" data-voffset="['28','28','20','20']"
										data-fontsize="14" data-whitespace="normal" data-type="text" data-actions=''
										data-basealign="slide" data-responsive_offset="on"
										data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
										data-textAlign="['left','left','left','left']"
										style="min-width: 306px; max-width: 306px;z-index: 6; text-shadow: none; color: #DDD !important; font-size: 20px; line-height: 20px; font-weight: 600; font-family: 'Roboto', sans-serif;">
										{{ $banner->createdUser->name }} - <i class="icon-time" style="position: relative; top: 1px;"></i> {{ \Carbon\Carbon::parse($banner->created_at)->locale(App::getLocale())->translatedFormat('Y. F j.') }}

									</div>
								</li>
							@endforeach
						</ul>
						<div class="tp-bannertimer" style="height: 8px; background: rgba(255,255,255,0.25);"></div>
					</div>
				</div>
			</section>
		@endif
		<!-- / slider -->

		<!-- tiles -->
		<div class="tiles" style="max-width: 100%; max-height: 100px; background: rgb(245, 245, 245);padding: 10px 0px;">
			<div class="container">
				@foreach ($menus as $index => $menu)
					@php
						$selected = "";
						if ( (!request()->has("activemenu") && $index==0) || (request()->has("activemenu") && request()->query("activemenu")==$menu->id) )
							$selected = "selected";

						$hasLink = "";
						if ( $menu->children->count()==0 )
							$hasLink = "haslink";
					@endphp
					<div class="tile {{ $selected }} {{ $hasLink }}" menu-toggle="{{ $menu->id }}" data-link="{{ app()->getLocale()."/".$menu->link }}?activemenu={{ $menu->id }}">
						<div class="image" style="background: url('/images/tiles/{{ $menu->image }}')"></div>
						<div class="text">
							<p class="title">
								{{ $menu->name }}
							</p>
							<p class="description">
								{{ $menu->description }}
							</p>
							<p class='subdescription'>
								{{ $menu->subdescription }}
							</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<!-- / tiles -->

		<!-- tile menus -->
		<div id="tile-menus">
			@foreach ($menus as $index => $menu)
				<nav class="main-nav {{ (!request()->has("activemenu") && $index==0) || (request()->has("activemenu") && request()->query("activemenu")==$menu->id) ? "" : "d-none" }}" role="navigation" id="menu-{{ $menu->id }}">
					<div class="container">
						<ul id="main-menu" class="sm sm-mint tile-menu">
							@foreach ($menu->children as $child)
								@include('partials.menu-item', ['menu' => $child])
							@endforeach
						</ul>
					</div>
				</nav>
			@endforeach
		</div>
		<!-- / tile menus -->


		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					@yield('content')
				</div>
			</div>
		</section>

		<footer id="footer" class="dark" style="background-color: #1f2024;">
			<div class="container">

				<div class="footer-widgets-wrap row clearfix">
					<div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">

						<div class="widget clearfix">
							<h4 class="mb-3 mb-sm-4">{{ \App\Models\Translation::getTranslation('site.name') }}</h4>
							<div class="posts-sm row col-mb-15" id="post-list-footer">
								<div class="entry col-12">
									<div class="grid-inner row align-items-center g-0">
										<div class="col-auto">
											<i class="fa-solid fa-location-dot"></i>
										</div>
										<div class="col ps-3">
											<div class="entry-meta">
												{{ $settings[4]->value }}
											</div>
										</div>
									</div>
								</div>
								<div class="entry col-12">
									<div class="grid-inner row align-items-center g-0">
										<div class="col-auto">
											<i class="fa-solid fa-phone"></i>
										</div>
										<div class="col ps-3">
											<div class="entry-meta">
												<a href="tel:{{ $settings[5]->value }}">{{ $settings[5]->value }}</a>
											</div>
										</div>
									</div>
								</div>
								<div class="entry col-12">
									<div class="grid-inner row align-items-center g-0">
										<div class="col-auto">
											<i class="fa-solid fa-fax"></i>
										</div>
										<div class="col ps-3">
											<div class="entry-meta">
												<a href="tel:{{ $settings[6]->value }}">{{ $settings[6]->value }}</a>
											</div>
										</div>
									</div>
								</div>
								<div class="entry col-12">
									<div class="grid-inner row align-items-center g-0">
										<div class="col-auto">
											<i class="fa-solid fa-envelope"></i>
										</div>
										<div class="col ps-3">
											<div class="entry-meta">
												<a href="mailto:{{ $settings[7]->value }}">{{ $settings[7]->value }}</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
						<h4 class="mb-3 mb-sm-4">"{{ \App\Models\Translation::getTranslation('site.slogan') }}"</h4>
					</div>

					<div class="col-lg-3 col-sm-6 mb-5 mb-sm-0">
						<div class="widget widget_links clearfix">
							<h4 class="mb-3 mb-sm-4">{{ \App\Models\Translation::getTranslation('footer.links.links') }}</h4>
							<ul>
								<li><a href="/">{{ \App\Models\Translation::getTranslation('footer.links.contacts') }}</a></li>
								<li><a href="/">{{ \App\Models\Translation::getTranslation('footer.links.reports') }}</a></li>
								<li><a href="/">{{ \App\Models\Translation::getTranslation('footer.links.login') }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div id="copyrights">
				<div class="container clearfix">
					<div class="row justify-content-center">
						<div class="col-md-12 align-self-center">
							{{ \App\Models\Translation::getTranslation('footer.copyright') }}<br>
							<div class="copyright-links">
								@if (\App\Models\Translation::getTranslation('footer.links.term') && \App\Models\Translation::getTranslation('footer.links.term')!="footer.links.term")
									<a href="{{ \App\Models\Translation::translation_route('footer.links.term') }}">{{ \App\Models\Translation::getTranslation('footer.links.term') }}</a>
								@else
									<a href="#">footer.copyright</a>
								@endif
								/
								@if ( \App\Models\Translation::getTranslation('footer.links.privacy') && \App\Models\Translation::getTranslation('footer.links.privacy')!="footer.links.privacy" )
									<a href="{{ \App\Models\Translation::translation_route('footer.links.privacy') }}">{{ \App\Models\Translation::getTranslation('footer.links.privacy') }}</a>
								@else
									<a href="#">footer.privacy</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
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