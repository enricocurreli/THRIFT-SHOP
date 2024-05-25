<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                <h2 class="text-center title-page">
                    {{$announcements_to_revise ? 'Ecco gli annunci già revisionati' : 'Non ci sono annunci revisionati'}}
                </h2>
            </div>
        </div>
    </div>
    @if ($announcements_to_revise)
    
    {{-- @dd($announcements_to_revise) --}}
    
    <div class="container my-5 box-revisione">
        <div class="row justify-content-center ">
            @foreach ($announcements_to_revise as $announcement )
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card mb-3">
                    <a class="img_card" href="{{route('announcement.show', compact('announcement'))}}">
                    <img 
                        src=
                        "@if ($announcement->images->count())
                            {{ Storage::url($announcement->images->first()->path) }}
                        @else 
                            {{Storage::url('public/default-image.jpg')}}
                        
                        @endif" 
                        class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h4 class="text-truncate card-title">{{$announcement->title}}</h4>
                        <h6 class="text-truncate card-text">{{$announcement->subtitle}}</h6>
                        <p class="text-truncate card-text">{{$announcement->body}}</p>
                        <p class="text-truncate card-text"><small class="text-body-secondary">Last updated {{$announcement->updated_at->format('d/m/Y')}}</small></p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-6">
                            <form
                            action="{{route('revisor.revise', ['announcement'=>$announcement])}}" method="POST">
                            @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">
                                    Revisiona
                                </button>
                             </form>
                        </div>
                        <div class="col-6">
                            @if ($announcement->is_accepted == 1)
                            <span class="position-absolute top-0 start-0 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                            @else
                            <span class="position-absolute top-0 start-0 translate-middle p-2 bg-danger border border-light rounded-circle">
                              <span class="visually-hidden">New alerts</span>
                            </span>                                
                            @endif
                        </div>
                </div>
            </div>
        </div>
        
    </div> 
    @endforeach   
</div>
</div>        
@endif
</x-layout>