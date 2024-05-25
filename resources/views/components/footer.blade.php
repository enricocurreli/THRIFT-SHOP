<div class="container-fluid px-0">
    <footer class="py-5 ">
        <div class="row m-0">
            <div class="col-6 col-md-2 mb-3 px-5">
                <h5>{{__('footer.section')}}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">{{__('footer.home')}}</a></li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('workWithUs') }}" class="nav-link p-0 text-body-secondary">{{__('footer.work')}}</a>
                    </li>
                    <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary"
                        href="{{ route('announcement.index') }}">{{ __('navbar.annunci') }}</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('workWithUs') }}#about"
                            class="nav-link p-0 text-body-secondary">{{__('footer.about')}}</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>{{__('footer.categories')}}</h5>
                <ul class="nav flex-column">
                    @foreach ($categories as $category)
                        <li class="nav-item mb-2"><a href="#"
                                class="nav-link p-0 text-body-secondary">{{__('navbar.' . $category->name) }}
                                ({{ $category->announcements->where('is_accepted', true)->count() }})</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3 px-5 pt-3">
                <h5>{{__('footer.newsletter')}}</h5>
                <p>{{__('footer.newsletter_message')}}</p>
                <form method="POST" 
                action="{{route('newsletter')}}"
                >
                    @csrf
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email</label>
                        <input id="newsletter1" type="email" name="email" class="form-control input_focused"
                            placeholder="Email" spellcheck="false" data-ms-editor="true">
                        <button class="btn btn_standard" type="submit">{{__('footer.send')}}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex-sm-row mt-3 px-5 color-P">
            <p>© 2024 THRIFT SHOP, Inc. All rights reserved.</p>
        </div>



    </footer>
</div>
