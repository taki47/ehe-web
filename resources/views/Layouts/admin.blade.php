<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Erdélyi Hagyományokért Egyesület - Admin</title>

    <!-- Bootstrap -->
    <link href="/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/admin/css/custom.min.css" rel="stylesheet">

    @yield('styles')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><img src="/images/logo.jpg" style="max-height:50px;"> <span>EHE - Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Üdv,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				@php
					// Ellenőrizzük a jogosultságokat
					$canAccessUsers = Auth::user()->can("user_index") || Auth::user()->can("role_index") || Auth::user()->can("role_permission");
					$canAccessSettings = Auth::user()->can("settings");
					$canAccessLanguages = Auth::user()->can("language_index");
          $canAccessImageGallery = Auth::user()->can("media_image_index");
          $canAccessVideoGallery = Auth::user()->can("media_video_index");
          $canAccessAudioGallery = Auth::user()->can("media_audio_index");
          $canAccessBanner = Auth::user()->can("banner_index");
          $canAccessPartner = Auth::user()->can("partner_index");
          $canAccessSupporter = Auth::user()->can("supporter_index");
          $canAccessMenu = \App\Helper::userCanAccess('menu_index_') || Auth::user()->can("any_menu_index");
          $canAccessNews = \App\Helper::userCanAccess('news_index_') || Auth::user()->can("any_news_index");
          $canAccessForeignNews = \App\Helper::userCanAccess('foreign_news_index_') || Auth::user()->can("any_foreign_news_index");
          $canAccessEvents = \App\Helper::userCanAccess('events_index_') || Auth::user()->can("any_events_index");
          $canAccessPages = \App\Helper::userCanAccess('pages_index_') || Auth::user()->can("any_pages_index");
          $canAccessLog = Auth::user()->can("log");
          $canAccessStat = Auth::user()->can("statistics");
				@endphp


        @if ($canAccessPartner || $canAccessSupporter || $canAccessBanner || $canAccessMenu || $canAccessNews || $canAccessEvents || $canAccessPages)
        <div class="menu_section">
          <h3>Oldal kezelése</h3>
          <ul class="nav side-menu">
            @if ( $canAccessNews )
              <li>
                <a href="{{ route("article.index", "news") }}">
                  <i class="fa-solid fa-newspaper"></i> Hírek kezelése
                </a>
              </li>
            @endif

            @if ( $canAccessForeignNews )
              <li>
                <a href="{{ route("article.index", "foreign_news") }}">
                  <i class="fa-solid fa-podcast"></i> Külföldi hírek kezelése
                </a>
              </li>
            @endif

            @if ( $canAccessEvents )
              <li>
                <a href="{{ route("article.index", "events") }}">
                  <i class="fa-solid fa-calendar-days"></i> Események kezelése
                </a>
              </li>
            @endif

            @if ( $canAccessPages )
              <li>
                <a href="{{ route("article.index", "pages") }}">
                  <i class="fa-solid fa-file"></i> Oldalak kezelése
                </a>
              </li>
            @endif

            @if ( $canAccessMenu )
              <li>
                <a href="{{ route("menu.index") }}">
                  <i class="fa-solid fa-bars"></i> Menü kezelése
                </a>
              </li>
            @endif

            @if ( $canAccessBanner )
              <li>
                <a href="{{ route("banner.index") }}">
                  <i class="fa-solid fa-image"></i> Banner
                </a>
              </li>
            @endif

            @if ( $canAccessPartner )
              <li>
                <a href="{{ route("partner.index", "partner") }}">
                  <i class="fa-solid fa-handshake"></i> Partnerek
                </a>
              </li>
            @endif

            @if ( $canAccessSupporter )
              <li>
                <a href="{{ route("partner.index", "supporter") }}">
                  <i class="fa-solid fa-headset"></i> Támogatók
                </a>
              </li>
            @endif
          </ul>
        </div>
        @endif

        @if ($canAccessImageGallery || $canAccessVideoGallery || $canAccessAudioGallery)
        <div class="menu_section">
          <h3>Média</h3>
          <ul class="nav side-menu">
            @if ( $canAccessImageGallery )
              <li>
                <a href="{{ route("media.index", "image") }}">
                  <i class="fa-solid fa-image"></i> Képtár
                </a>
              </li>
            @endif

            @if ( $canAccessVideoGallery )
              <li>
                <a href="{{ route("media.index", "video") }}">
                  <i class="fa-solid fa-video"></i> Videótár
                </a>
              </li>
            @endif
            
            @if ( $canAccessAudioGallery )
              <li>
                <a href="{{ route("media.index", "audio") }}">
                  <i class="fa-solid fa-music"></i> Hangtár
                </a>
              </li>
            @endif
          </ul>
        </div>
        @endif

				@if ($canAccessUsers)
					<div class="menu_section">
						<h3>Felhasználók</h3>
						<ul class="nav side-menu">
						@if ( Auth::user()->can("user_index") )
							<li>
							<a href="{{ route("users.index") }}">
								<i class="fa-solid fa-user"></i> Felhasználók
							</a>
							</li>
						@endif

						@if ( Auth::user()->can("role_index") )
							<li>
							<a href="{{ route("roles.index") }}">
								<i class="fa-solid fa-section"></i> Szerepkörök
							</a>
							</li>
						@endif
						
						@if ( Auth::user()->can("role_permission") )
							<li>
							<a href="{{ route("permissions.index") }}">
								<i class="fa-solid fa-link"></i> Jogosultságok-Szerepkörök
							</a>
							</li>
						@endif
						</ul>
					</div>
				@endif

				@if ($canAccessSettings || $canAccessLanguages || $canAccessLog || $canAccessStat)
					<div class="menu_section">
						<h3>Karbantartás</h3>
						<ul class="nav side-menu">
              @if ( Auth::user()->can("language_index") )
                <li>
                  <a href="{{ route("languages.index") }}">
                    <i class="fa-solid fa-flag"></i> Nyelvek
                  </a>
                </li>
						  @endif

              @if ( Auth::user()->can("translation_update") )
                <li>
                  <a href="{{ route("languages.translations") }}">
                    <i class="fa-solid fa-flag"></i> Fordítások
                  </a>
                </li>
						  @endif
              
              @if ( Auth::user()->can("settings") )
                <li>
                  <a href="{{ route("settings.index") }}">
                    <i class="fa-solid fa-globe"></i> Weboldal beállítások
                  </a>
                </li>
              @endif

              @if ( $canAccessLog )
                <li>
                  <a href="{{ route("log.index") }}">
                    <i class="fa-solid fa-book"></i> Napló megtekintése
                  </a>
                </li>
              @endif

              @if ( $canAccessStat )
                <li>
                  <a href="https://analytics.google.com" target="_blank">
                    <i class="fa-solid fa-chart-simple"></i> Statisztika megtekintése
                  </a>
                </li>
              @endif
						</ul>
					</div>
				@endif
			</div>
      		<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Vissza az oldalra" href="/">
                <i class="fa-solid fa-play"></i>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route("logout") }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="{{ route("logout") }}">
                        <span>Kijelentkezés</span>
                      </a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>@yield('title')</h3>
                  </div>
                </div>

                <div class="col-12 ">
                    @yield('content')
                </div>
                
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/assets/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/assets/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="/assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/assets/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/assets/admin/vendors/moment/min/moment.min.js"></script>
    <script src="/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- fontawesome -->
    <script src="/assets/fontawesome/js/all.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/assets/admin/js/custom.min.js"></script>
    
    @yield('scripts')
  </body>
</html>