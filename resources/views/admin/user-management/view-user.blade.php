@extends('layouts.admin-layout')

@section('pageTitle', 'Users')

@section('users')
    {{-- Page Heading --}}
    <x-headings.heading>
        Users Management
    </x-headings.heading>

    {{-- Data Container --}}
    <x-admin-components.container>
        {{-- Content Heading --}}
        <x-headings.content-heading>
            User Details
        </x-headings.content-heading>

        {{-- User Data --}}
        <div class="row">
            <div class="col-md-12 py-3">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center mb-4">
                        <img src="{{ asset('storage/users/' . $user->picture) }}" alt="User Picture" style="width: 60%;">
                    </div>
                    <div class="col-md-8 mb-4">
                        {{-- User Name --}}
                        <div class="row">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Name :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    {{ $user->name }}
                                </span>
                            </div>
                        </div>
                        {{-- User Email --}}
                        <div class="row mt-2">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Email :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                        {{-- User Role --}}
                        <div class="row mt-2">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Role :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    @if ($user->role !== 'admin')
                                        Normal User
                                    @else
                                        Administrator
                                    @endif
                                </span>
                            </div>
                        </div>
                        {{-- User Profession --}}
                        <div class="row mt-2">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Profession :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    {{ $user->profession }}
                                </span>
                            </div>
                        </div>
                        {{-- Created At --}}
                        <div class="row mt-2">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Created At :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d-M-Y h:i:s a') }}
                                </span>
                            </div>
                        </div>
                        {{-- Updated At --}}
                        <div class="row mt-2">
                            <div class="col-md-3 txt-primary fw-bold d-flex justify-content-center">
                                Updated At :
                            </div>
                            <div class="col-md-9 d-flex justify-content-lg-start justify-content-center">
                                <span class="ms-2">
                                    {{ \Carbon\Carbon::parse($user->updated_at)->format('d-M-Y h:i:s a') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-components.container>
@endsection
