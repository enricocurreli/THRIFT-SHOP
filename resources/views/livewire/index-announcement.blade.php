<div>
    <div class="container mt-5">
        <div class="row">
            {{-- <div class="col-12"> --}}
            <div class="col-12 d-flex justify-content-center">
                {{-- <h1 class="text-center title-index title-page">Tutti gli annunci</h1> --}}
                <h1 class="text-center title-index title-page">{{ __('title.allAnnouncements') }}</h1>
                {{-- <p>Vuoi inserire un annuncio? <a class="btn btn-primary" href="{{route('announcement.create')}}">Inserisci</a></p> --}}
                
             
            </div>
        </div>
    </div>

    <div class="container-fluid my-5">
        <div class="row d-flex justify-content-evenly">
            {{-- @dd($announcements) --}}
            @foreach ($announcements as $announcement)
                <div class="col-10 col-sm-8 col-md-5 col-lg-4 col-xl-3 col-xxl-2 mx-xxl-2 my-4">
                    <x-card :$announcement />
                </div>
            @endforeach
        </div>
    </div>
</div>
