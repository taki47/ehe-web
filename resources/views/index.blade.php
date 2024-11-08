@extends('Layouts.master')


@section('content')
	<!-- legfrissebb hírek -->
	<div class="row clearfix">
		<div class="col-lg-12">
			<nav class="navbar navbar-expand-lg navbar-light p-0">
				<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">{{ \App\Models\Translation::getTranslation('home.news.title') }}</h4>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#newsCategories" aria-controls="newsCategories"  aria-expanded="false" aria-label="Toggle navigation">
					<i class="icon-line-menu"></i>
				</button>

				<div class="collapse navbar-collapse justify-content-between" id="newsCategories">
					<div></div>
					<ul class="nav nav-sm navbar-nav me-md-auto me-lg-0 mt-2 mt-lg-0 align-self-end"
						role="tablist">
						@foreach ($menus as $index => $menu)
							<li class="nav-item">
								<a class="nav-link bg-color-{{ $menu->category }} {{ $index==0 ? "active" : "" }}" id="nav-{{$menu->id}}-tab" data-bs-toggle="tab" href="#nav-{{$menu->id}}" role="tab" aria-selected="true">{{ $menu->name }}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</nav>
			<div class="line line-xs line-dark"></div>

			<div class="tab-content" id="nav-tabContent">
				@foreach ($menus as $index => $menu)
					@php
						$articles = $menu->getArticles(1, 10);
					@endphp
					<div class="tab-pane fade show {{ $index==0 ? "active" : "" }}" id="nav-{{ $menu->id }}" role="tabpanel" aria-labelledby="nav-outdoor-tab">
						<div class="row col-mb-30 mb-0">
							<div class="col-lg-6">
								<div class="posts-md row">
									@for ($i = 0; $i < 2; $i++)
										<div class="entry col-6">
											<div class="entry-image">
												<a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $articles[$i]->slug]) }}">
													<img src="{{ $articles[$i]->cover_path."/".$articles[$i]->cover }}" alt="">
												</a>
											</div>
											<div class="entry-title nott">
												<h3 class="mb-2">
													<a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $articles[$i]->slug]) }}">
														{{ $articles[$i]->title }}
													</a>
												</h3>
											</div>
											<div class="entry-meta">
												<ul>
													<li><a href="javascript:void(0)">{{ $articles[$i]->createdUser->name }}</a></li>
													<li><i class="icon-time"></i><a href="javascript:void(0)">{{ \Carbon\Carbon::parse($articles[$i]->created_at)->isoFormat('LLLL') }}</a></li>
												</ul>
											</div>
											<div class="entry-content clearfix">
												<p>
													{{ $articles[$i]->lead }}
												</p>
											</div>
										</div>
									@endfor
								</div>
							</div>

							<div class="col-lg-6">
								<div class="posts-sm row col-mb-30">
									@for ($i = 2; $i < count($articles); $i++)
										<div class="entry col-12">
											<div class="grid-inner row align-items-center g-0">
												<div class="col-auto">
													<div class="entry-image">
														<a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $articles[$i]->slug]) }}">
															<img src="{{ $articles[$i]->cover_path."/".$articles[$i]->cover }}" alt="">
														</a>
													</div>
												</div>
												<div class="col ps-3">
													<div class="entry-title">
														<h4>
															<a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $articles[$i]->slug]) }}">
																{{ $articles[$i]->title }}
															</a>
														</h4>
													</div>
													<div class="entry-meta">
														<ul>
															<li><a href="javascript:void(0)">{{ $articles[$i]->createdUser->name }}</a></li>
															<li><i class="icon-time"></i><a href="javascript:void(0)">{{ \Carbon\Carbon::parse($articles[$i]->created_at)->isoFormat('LLLL') }}</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									@endfor
									<div class="entry col-12">
										<a href="{{ route("news.index", [app()->getLocale(), $menu->slug]) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.news.more') }} >></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- / legfrissebb hírek -->

	<!-- események -->
	<div class="row clearfix">
		<div class="col-lg-12">
			<nav class="navbar navbar-expand-lg navbar-light p-0">
				<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">{{ \App\Models\Translation::getTranslation('home.events.title') }}</h4>
			</nav>
			<div class="line line-xs line-sports"></div>

			<div class="row col-mb-30 mb-0 events-row">
				
				@php
					$events = $menu->getArticles(3, 8);
				@endphp
				@foreach ($events as $event)
					<div class="col-lg-3 col-md-4 col-12">
						<div class="card event" data-slug="{{ $event->slug }}">
							<div class="card-body">
								<div class="event-title entry-title"><h4>{{ $event->title }}</h4></div>
								<div class="event-description">{{ $event->lead }}</div>
								<div class="d-flex align-items-center mt-2 event-location entry-meta">
									<ul>
										<li>
											<i class="fas fa-calendar-alt event-icon me-2"></i> {{ \Carbon\Carbon::parse($event->event_start_date)->isoFormat("LL") }}
										</li>
										<li>
											<i class="fas fa-map-marker-alt location-icon me-2"></i> {{ $event->event_location }}
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
				<div class="entry col-12">
					<a href="/" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.events.more') }} >></a>
				</div>


			</div>
		</div>
	</div>
	<!-- / események -->

	<!-- külföldi hírek -->
	@if ( $settings[1]->value=="1" )
		<div class="row clearfix">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light p-0">
					<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">{{ \App\Models\Translation::getTranslation('home.foreignnews.title') }}</h4>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#foreignNewsCategories" aria-controls="foreignNewsCategories" aria-expanded="false" aria-label="Toggle navigation">
						<i class="icon-line-menu"></i>
					</button>

					<div class="collapse navbar-collapse justify-content-between" id="foreignNewsCategories">
						<div></div>
						<ul class="nav nav-sm navbar-nav me-md-auto me-lg-0 mt-2 mt-lg-0 align-self-end"
							role="tablist">
							<li class="nav-item">
								<a class="nav-link bg-color-travel active" id="nav-kategoria-tab" data-bs-toggle="tab" href="#nav-kategoria" role="tab" aria-selected="true">Kategória 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-color-food" id="nav-kategoria-tab" data-bs-toggle="tab" href="#nav-kategoria" role="tab" aria-selected="false">Kategória 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-color-sports" id="nav-kategoria-tab" data-bs-toggle="tab" href="#nav-kategoria" role="tab" aria-selected="false">Kategória 3</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-color-fashion" id="nav-kategoria-tab" data-bs-toggle="tab" href="#nav-kategoria" role="tab" aria-selected="false">Kategória 4</a>
							</li>
						</ul>
					</div>
				</nav>
				<div class="line line-xs line-home"></div>

				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-kategoria" role="tabpanel" aria-labelledby="nav-outdoor-tab">
						<div class="row col-mb-30 mb-0">
							<div class="col-lg-6">
								<div class="posts-md">
									<div class="entry">
										<div class="entry-image">
											<a href="/">
												<img src="/images/news/travel/3.jpg" alt="Image 3"></a>
											<div class="entry-categories">
												<a href="demo-news-category.html" class="bg-travel">Kategória</a></div>
										</div>
										<div class="entry-title nott">
											<h3 class="mb-2">
												<a href="/">
													Lorem Ipsum
												</a>
											</h3>
										</div>
										<div class="entry-meta">
											<ul>
												<li><a href="#">Bajkó Róbert</a></li>
												<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
											</ul>
										</div>
										<div class="entry-content clearfix">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum elementum dui eget gravida. Curabitur erat augue, aliquet hendrerit nulla et, luctus ultricies elit.
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="posts-sm row col-mb-30">
									<div class="entry col-12">
										<div class="grid-inner row align-items-center g-0">
											<div class="col-auto">
												<div class="entry-image">
													<a href="/">
														<img src="/images/news/travel/small/1.jpg" alt="Image">
													</a>
												</div>
											</div>
											<div class="col ps-3">
												<div class="entry-title">
													<h4>
														<a href="/">
															Lorem ipsum
														</a>
													</h4>
												</div>
												<div class="entry-meta">
													<ul>
														<li><a href="/">Bajkó Róbert</a></li>
														<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="entry col-12">
										<div class="grid-inner row align-items-center g-0">
											<div class="col-auto">
												<div class="entry-image">
													<a href="/">
														<img src="/images/news/travel/small/2.jpg" alt="Image">
													</a>
												</div>
											</div>
											<div class="col ps-3">
												<div class="entry-title">
													<h4>
														<a href="/">
															Lorem ipsum
														</a>
													</h4>
												</div>
												<div class="entry-meta">
													<ul>
														<li><a href="/">Bajkó Róbert</a></li>
														<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="entry col-12">
										<div class="grid-inner row align-items-center g-0">
											<div class="col-auto">
												<div class="entry-image">
													<a href="/">
														<img src="/images/news/travel/small/3.jpg" alt="Image">
													</a>
												</div>
											</div>
											<div class="col ps-3">
												<div class="entry-title">
													<h4>
														<a href="/">
															Lorem ipsum
														</a>
													</h4>
												</div>
												<div class="entry-meta">
													<ul>
														<li><a href="/">Bajkó Róbert</a></li>
														<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="entry col-12">
										<div class="grid-inner row align-items-center g-0">
											<div class="col-auto">
												<div class="entry-image">
													<a href="/">
														<img src="/images/news/travel/small/4.jpg" alt="Image">
													</a>
												</div>
											</div>
											<div class="col ps-3">
												<div class="entry-title">
													<h4>
														<a href="/">
															Lorem ipsum
														</a>
													</h4>
												</div>
												<div class="entry-meta">
													<ul>
														<li><a href="/">Bajkó Róbert</a></li>
														<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="entry col-12">
										<div class="grid-inner row align-items-center g-0">
											<div class="col-auto">
												<div class="entry-image">
													<a href="/">
														<img src="/images/news/market/small/3.jpg" alt="Image">
													</a>
												</div>
											</div>
											<div class="col ps-3">
												<div class="entry-title">
													<h4>
														<a href="/">
															Lorem ipsum
														</a>
													</h4>
												</div>
												<div class="entry-meta">
													<ul>
														<li><a href="/">Bajkó Róbert</a></li>
														<li><i class="icon-time"></i><a href="#">2024. május 15.</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="entry col-12">
										<a href="/" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.foreignnews.more') }} >></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!-- / külföldi hírek -->

	<!-- támogatóink -->
	<div class="row clearfix">
		<div class="col-lg-12">
			<nav class="navbar navbar-expand-lg navbar-light p-0">
				<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">{{ \App\Models\Translation::getTranslation('home.supporters.title') }}</h4>
			</nav>
			<div class="line line-xs line-fashion"></div>

			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-kategoria" role="tabpanel" aria-labelledby="nav-outdoor-tab">
					<div class="row col-mb-30 mb-0">
						<div class="col-12 supporters">
							<div class="supporter">
								<img src="/images/supporters/bga.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/csoori.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/me.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nca.jpg" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nea.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nka.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/bga.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/csoori.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/me.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nca.jpg" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nea.png" class="img-fluid">
							</div>
							<div class="supporter">
								<img src="/images/supporters/nka.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / támogatóink -->

	<!-- partnereink -->
	@if ( $settings[2]->value=="1" )
		<div class="row clearfix">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light p-0">
					<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">{{ \App\Models\Translation::getTranslation('home.partners.title') }}</h4>
				</nav>
				<div class="line line-xs line-lifestyle"></div>

				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-kategoria" role="tabpanel" aria-labelledby="nav-outdoor-tab">
						<div class="row col-mb-30 mb-0">
							<div class="col-12 partners">
								<div class="partner">
									<img src="/images/partners/debreceni-egyetem.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/gwp.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/icid.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mate.png" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mht.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mta.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/debreceni-egyetem.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/gwp.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/icid.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mate.png" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mht.jpg" class="img-fluid">
								</div>
								<div class="partner">
									<img src="/images/partners/mta.jpg" class="img-fluid">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!-- / partnereink -->
@endsection