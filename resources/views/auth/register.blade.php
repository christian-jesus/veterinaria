@extends('layouts.form')

@section('title', 'Start by logging in with your account 😉')

@section('content')
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary shadow border-0">
          
          <div class="card-body px-lg-5 py-lg-5">
            @if ($errors->any())
                <div class="text-center text-muted mb-2">
                    <h4>🤔 An error was found please try again </h4>
                  </div>

                <div class="alert alert-danger mb-4" role="alert">
                    {{ $errors->first() }}
                </div>    
                @else
                <div class="text-center text-muted mb-4">
                    <small>🙃Sign up for online veterinary consultations</small>
                  </div>
                @endif

            <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="	fas fa-paw"></i></span>
                  </div>
                  <input class="form-control" placeholder="Names" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Repeat password" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group">
                <label for="imagen"> You can upload your avatar😝</label>
                <div class="custom-file">
                    <input accept="image/*" type="file" name="imagen" id="imagen" class="custom-file-input">
                    <label class="custom-file-label" for="imagen">  Select your file for your avatar 😁</label>
                </div>
            </div>

            
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">check in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
