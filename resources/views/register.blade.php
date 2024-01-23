@extends('layouts.site')

@section('pageTitle', 'Register')

@section('register')

    <section class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center py-5">
                <div class="card p-3 shadow" id="signup-card">
                    <div class="card-body">
                        <h1 class="txt-primary fw-bold mb-5 text-center">
                            Signup
                        </h1>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-4"> {{-- User Name --}}
                                <x-forms.label for="userName" text="User Name" />
                                <x-forms.input type="text" name="name" id="userName" value="{{ old('name') }}"
                                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                                <div id="name-error"></div>
                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4"> {{-- User Email --}}
                                <x-forms.label for="userEmail" text="User Email" />
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
                                <x-forms.label for="userPassword" text="User Password" />
                                <x-forms.input type="password" name="password" id="userPassword"
                                    value="{{ old('password') }}"
                                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}" />
                                <div id="user-password-error"></div>
                                @error('password')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4"> {{-- User Password Confirmation --}}
                                <x-forms.label for="confirmPassword" text="Confirm Password" />
                                <x-forms.input type="password" name="password_confirmation" id="confirmPassword"
                                    value="{{ old('password_confirmation') }}"
                                    class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" />
                                <div id="user-password-confirmation-error"></div>
                                @error('password_confirmation')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="button button-primary w-100">
                                    Signup
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                Already have an account?
                                <a href="{{ route('login') }}" class="txt-primary fw-bold ms-2">
                                    Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('javascript')
        <script type="module" src="{{ asset('js/signupValidation.js') }}" defer></script>
    @endpush
@endsection
