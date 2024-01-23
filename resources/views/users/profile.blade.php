@extends('layouts.site')

@section('pageTitle', 'Profile')

@section('profile')
    {{-- Page Heading --}}
    <x-headings.heading>
        My Account
    </x-headings.heading>

    {{-- Alert Messages --}}
    <x-alerts.alert />

    {{-- Profile Details --}}
    <x-profile-comp.profile class="bg-light p-4" />
@endsection
