<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel">Média kiválasztása</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="mb-4">
                        <input type="text" id="searchInput" class="form-control" placeholder="Keresés...">
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">

                        @foreach ($medias as $media)
                            <div class="col-6 col-lg-4 col-xl-3 mb-2 media-item" data-id="{{ $media->id }}">
                                <a href="#" class="text-decoration-none">
                                    <div class="card h-100">
                                        @if ( $media->type=="image" )
                                            <img src="{{ $media->file_path }}/{{ $media->file_name}} " class="card-img-top" style="height: 100px;object-fit: cover;">
                                        @elseif( $media->type=="video" )
                                            <img src="/images/video.png" class="card-img-top" style="height: 100px;object-fit: cover;">
                                        @elseif( $media->type=="audio" )
                                            <img src="/images/audio.svg" class="card-img-top" style="height: 100px;object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $media->name }}</h5>
                                            <p class="card-text text-muted small">Létrehozva:<br>{{ $media->created_at }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>