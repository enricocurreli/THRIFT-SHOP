<x-layout>
    <x-display-error/>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center">
          <h1 class="mb-3 title-page">{{__('form.cta')}}</h1>
        </div>
      </div>
    </div>

    <div class="container box-auth my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
             
                <form
                class=" rounded-3 p-3 form"
                method="POST"
                action="{{route('register')}}"
                >
                @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control input_focused" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('form.name')}}</label>
                        <input type="text" name="name" class="form-control input_focused" id="name" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control input_focused" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{__('form.confirm')}}</label>
                        <input type="password" name="password_confirmation" class="form-control input_focused" id="password_confirmation">
                      </div>
                      <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-primary btn_standard">{{__('navbar.registrati')}}</button>
                        <p class="pt-2">
                          {{__('form.registered?')}}
                          <a href="{{route('login')}}"> {{__('navbar.accedi')}}</a>
                        </p>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</x-layout>