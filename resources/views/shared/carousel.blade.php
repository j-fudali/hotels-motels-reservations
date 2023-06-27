<div id="{{ $carousel_id }}" class="carousel slide">
    <div class="carousel-inner">
        @foreach ($images as $image)
            <div class="carousel-item @if ($image == $images[0]) active @endif">
                <img style="height: 20rem;" src="{{ asset('storage/' . $image->path) }}"
                    class="img-fluid object-fit-contain d-block mx-auto" alt="...">
            </div>
        @endforeach
    </div>
    @if (count($images) > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carousel_id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#{{ $carousel_id }}" data-bs-slide="next">
            <span class="fc-black carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>
