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
					<ul class="nav nav-sm navbar-nav me-md-auto me-lg-0 mt-2 mt-lg-0 align-self-end" role="tablist">
						<li class="nav-item">
							<a class="nav-link bg-color-fashion active" id="nav-all-tab" data-bs-toggle="tab" href="#nav-all" role="tab" aria-selected="true">Mind</a>
						</li>
						@foreach ($menus as $index => $menu)
							<li class="nav-item">
								<a class="nav-link bg-color-{{ $menu->category }}" id="nav-{{$menu->id}}-tab" data-bs-toggle="tab" href="#nav-{{$menu->id}}" role="tab" aria-selected="true">{{ $menu->name }}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</nav>
			<div class="line line-xs line-dark"></div>

			<div class="tab-content" id="nav-tabContent">
				@php
					$articles = $allNews;
				@endphp
				<div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-outdoor-tab">
					<div class="row col-mb-30 mb-0">
						@include('partials.news', ['category' => 'all', 'foreignnews' => false])
					</div>
				</div>

				@foreach ($menus as $index => $menu)
					@php
						$articles = $menu->getArticles(1, 10);
					@endphp

					<div class="tab-pane fade show" id="nav-{{ $menu->id }}" role="tabpanel" aria-labelledby="nav-outdoor-tab">
						<div class="row col-mb-30 mb-0">
							@include('partials.news', ['category' => 'notall', 'foreignnews' => false])
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
					$events = [];
					if ( isset($menu) )
						$events = $menu->getArticles(3, 8);
				@endphp
				@foreach ($events as $event)
					<div class="col-lg-3 col-md-4 col-12 event-container" data-link="{{ route("events.show",[app()->getLocale(), $event->slug]) }}">
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
					<a href="{{ route("events.index", app()->getLocale()) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.events.more') }} >></a>
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
						<ul class="nav nav-sm navbar-nav me-md-auto me-lg-0 mt-2 mt-lg-0 align-self-end" role="tablist">
							<li class="nav-item">
								<a class="nav-link bg-color-fashion active" id="nav-foreignall-tab" data-bs-toggle="tab" href="#nav-foreignall" role="tab" aria-selected="true">Mind</a>
							</li>
							@foreach ($menus as $index => $menu)
								<li class="nav-item">
									<a class="nav-link bg-color-{{ $menu->category }}" id="nav-foreign{{$menu->id}}-tab" data-bs-toggle="tab" href="#nav-foreign{{$menu->id}}" role="tab" aria-selected="true">{{ $menu->name }}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</nav>
				<div class="line line-xs line-home"></div>

				<div class="tab-content" id="nav-tabContent">
					@php
						$articles = $allForeignNews;
					@endphp
					<div class="tab-pane fade show active" id="nav-foreignall" role="tabpanel" aria-labelledby="nav-outdoor-tab">
						<div class="row col-mb-30 mb-0">
							@include('partials.news', ['category' => 'all', 'foreignnews' => true])
						</div>
					</div>
	
					@foreach ($menus as $index => $menu)
						@php
							$articles = $menu->getArticles(2, 10);
						@endphp
	
						<div class="tab-pane fade show" id="nav-foreign{{ $menu->id }}" role="tabpanel" aria-labelledby="nav-outdoor-tab">
							<div class="row col-mb-30 mb-0">
								@include('partials.news', ['category' => 'notall', 'foreignnews' => true])
							</div>
						</div>
					@endforeach
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
							@foreach ($supporters as $supporter)
								<div class="supporter">
									<a href="{{ $supporter->link }}" target="_blank"><img src="{{ $supporter->image_path."/".$supporter->image }}" class="img-fluid"></a>
								</div>
							@endforeach
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
								@foreach ($partners as $partner)
									<div class="partner">
										<a href="{{ $partner->link }}" target="_blank"><img src="{{ $partner->image_path . "/" . $partner->image}}" class="img-fluid"></a>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!-- / partnereink -->
@endsection

@section('scripts')
	<script>
		$(".event-container").on("click", function() {
			let link = $(this).data("link");

			document.location.href=link;
		});
	</script>
@endsection