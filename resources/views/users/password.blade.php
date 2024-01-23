@extends('layouts.site')

@section('pageTitle', 'Password')

@section('password')
    {{-- Page Heading --}}
    <x-headings.heading>
        My Account (<small class="text-dark fs-5">Change Password</small>)
    </x-headings.heading>

    {{-- Alert Messages --}}
    <x-alerts.alert />

    {{-- Profile Details --}}
    <x-profile-comp.password class="bg-light p-4" />
@endsection
