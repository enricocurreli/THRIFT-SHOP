<div>
    <x-display-message/>
    <x-display-error/>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="title-page">{{__('title.newAnnouncements')}}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row d-flex justify-content-center p-5">
            @foreach ( $announcements as $announcement )
            <div class="col-10 col-sm-8 col-md-5 col-lg-3">
                <x-card :announcement=$announcement>
                    <div class="">
                        <span class="w-25 position-absolute m-2 badge rounded-pill bg-danger">
                            New
                          </span>
                    </div>
                </x-card>
            </div>
            @endforeach
        </div>
    </div>
</div>
