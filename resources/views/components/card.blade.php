{{-- @php
    $srcPath = Storage::url($announcement->images->first()->path);
    $cropPath = "crop_300x300_$srcPath";
@endphp --}}

    {{-- @dd($announcements) --}}
    <div class="card card_announcement position-relative ">
       
        {{$slot}}
        <a class="img_card" href="{{route('announcement.show', compact('announcement'))}}">
            <img src=
            "@if ($announcement->images->count())
            {{-- {{ Storage::url($announcement->images->first()->path) }} --}}
            {{$announcement->images->first()->getUrl(300,300)}}
            @else 
            {{Storage::url('public/default-image.jpg')}}
            @endif" 
            class="card-img-top object-fit-cover" 
            alt="{{$announcement->title}}" min-height="200px">
        </a>
        <div class=" card-body d-flex flex-column ">
            <a class="card_category mb-2" href="{{route('category.index', $announcement->category)}}"
                class="card-text">{{__('navbar.' . $announcement->category->name) }}</a>
                <a class="title_card" href="{{route('announcement.show', compact('announcement'))}}">
                    <h5 class="card-title">{{ $announcement->title }}</h5>
                </a>
                <p class="card-text">{{ $announcement->price }} €</p>
                {{-- <p class="card-text">Creato da: {{ $announcement->user->name }}</p> --}}
                
            </div>
    </div>
