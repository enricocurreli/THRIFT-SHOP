<x-layout>
    <div class="container box-show my-5">
        <div class="row d-flex justify-content-center">
            <div class="my-5">
            </div>
            <div class="col-10 col-md-6 my-3 my-md-0 ">
                <x-carousel :$announcement />
            </div>
            
            <div class="col-10 col-md-6 my-3 my-md-0 d-flex px-2 px-md-5 flex-column">
                <a class="card_category" href="{{route('category.index', $announcement->category)}}">{{ ucfirst($announcement->category->name) }}</a>
                <h1 class="title">{{$announcement->title}}</h1>
                <h4 class="subtitle">{{$announcement->subtitle}}</h4>
                <h5 class="price">{{$announcement->price}} <span>€</span></h5>
                <p class="body">{{$announcement->body}}</p>
                <p class="card-text">Creato da: {{ $announcement->user->name }}</p>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <livewire:index-home/>
            </div>
        </div>
    </div>

</x-layout>
