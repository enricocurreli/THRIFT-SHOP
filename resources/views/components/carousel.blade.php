<div id="carouselExample" class="carousel slide shadow">
    <div class="carousel-inner">
        @if ($announcement->images->count())
            @foreach ($announcement->images as $image)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ $image->getUrl(300,300) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        @else
            <div class="carousel-item active">
                <img src="{{ Storage::url('public/default-image.jpg') }}" class="d-block w-100" alt="...">
            </div>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
