<x-layout>
    <div class="container-fluid h-100 mt-3">
        <div class="row mx-auto h-50 mt-3 justify-content-center ">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center mb-5">
                <img class="my-5" src="{{ Storage::url('public/logo/logo.png') }}" alt="">
                <h1 class="text-center title-page">{{ __('about.title') }}</h1>
                <x-display-message />

            </div>
            <div class="col-10 text-center d-flex flex-column justify-content-center align-items-center p-5">
                @guest
                    <p class="fs-5">

                        <a class="text-decoration-none active" href="{{ route('register') }}">{{ __('about.register') }}</a>
                        {{ __('about.linktxt') }}
                    </p>
                @endguest


                @auth
                    <div>
                        <p class="fs-5">
                            {{ __('about.formtitle') }}
                        </p>
                        <form class="text-white form" action="{{ route('revisor.become') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('about.username') }}</label>
                                <input name="name" type="text" class="form-control input_focused" id="name"
                                    value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="text-danger fw-bold "> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control input_focused" id="email"
                                    value="{{ Auth::user()->email }}">
                                <div class="text-danger fw-bold ">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">{{ __('about.msg') }}</label>
                                <input name="message" type="text" class="form-control input_focused" id="message"
                                    cols="30" rows="5">
                                {{-- </textarea> --}}
                                <div class="text-danger fw-bold ">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn_standard" type="submit">{{ __('about.send') }}</button>

                            </div>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
        <div class="row mx-auto h-50 mt-3 justify-content-center ">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center my-5">
                <h1 class="title-page text-center justify-content-center">
                    {{ __('about.jobtitle') }}
                </h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-8 col-lg-5 col-xl-4 ">

                <img class="img-fluid" src="/images/workwithus/revisor.png" alt="">

            </div>
            <div class="col-8 col-lg-5 col-xl-4">

                <p class="fs-6 m-4 m-lg-0 text-center text-lg-start">
                    {{ __('about.desc1') }}
                </p>

            </div>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="col-8 col-lg-5 col-xl-4 ">

                <p class="fs-6 m-4 m-lg-0 text-center text-lg-end">
                    {{ __('about.desc2') }}
                </p>

            </div>
            <div class="col-8 col-lg-5 col-xl-4 px-3">

                <img class="img-fluid" src="/images/workwithus/team.png" alt="">

            </div>
        </div>
        <div class="row mx-auto h-50 mt-3 justify-content-center ">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center mb-5">
                <h2 class="text-center my-5 title-page text-uppercase">{{ __('about.abouttitle') }}</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-8 col-lg-5 col-xl-4 ">

                <img class="img-fluid" src="/images/workwithus/about.png" alt="">

            </div>
            <div class="col-8 col-lg-5 col-xl-4">

                <p class="fs-6 m-4 m-lg-0 text-center text-lg-start">
                    {{ __('about.about1') }}
                </p>

            </div>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="col-8 col-lg-5 col-xl-4 ">

                <p class="fs-6 m-4 m-lg-0 text-center text-lg-end">
                    {{ __('about.about2') }}
                </p>

            </div>
            <div class="col-8 col-lg-5 col-xl-4 px-3">

                <img class="img-fluid" src="/images/workwithus/eco.png" alt="">

            </div>
        </div>       


    </div>

</x-layout>
