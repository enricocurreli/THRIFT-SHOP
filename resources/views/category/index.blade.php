<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                <h2 class="text-center title-page">
                    {{ $category ? 'Annunci in ' . ucfirst($category->name) : 'Non ci sono annunci revisionati' }}
                </h2>
            </div>
        </div>
    </div>
    <div class="container my-5 box-category">
        <div class="row d-flex justify-content-center p-5">
            @forelse ($announcements as $announcement)
                <div class="col-10 col-sm-8 col-md-5 col-lg-4 col-xl-3 col-xxl-2 m-xl-3 my-4">
                    <x-card :$announcement />
                </div>
            @empty
                <div class="container ">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center mt-5">Non ci sono annunci per questa categoria!</h4>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">

                            @auth
                                <a href="{{ route('announcement.create') }}" class="btn btn-category mt-4 btn_standard">Crea
                                    Annuncio</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
    </div>

</x-layout>
