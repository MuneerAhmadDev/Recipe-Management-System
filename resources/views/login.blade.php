@extends('layouts.site')

@section('pageTitle', 'Login')

@section('login')

    <section class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center py-5">
                <div class="card p-3 shadow" id="login-card">
                    <div class="card-body">
                        <h1 class="txt-primary fw-bold mb-5 text-center">
                            Login
                        </h1>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-4"> {{-- User Email --}}
                                <x-forms.label for="userEmail" text="Email" />
                                <x-forms.input type="email" name="email" id="userEmail" value="{{ old('email') }}"
                                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}" />
                                <div id="email-error"></div>
                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4"> {{-- User Password --}}
                                <x-forms.label for="userPassword" text="Password" />
                                <x-forms.input type="password" name="password" id="userPassword"
                                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}" />
                                <div id="password-error"></div>
                                @error('password')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="button button-primary">Login</button>
                                <a href="#" class="txt-primary">Forgot Password</a>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="txt-primary fw-bold ms-2">
                                    Signup
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('javascript')
        <script type="module" src="{{ asset('js/loginValidation.js') }}" defer></script>
    @endpush
@endsection
