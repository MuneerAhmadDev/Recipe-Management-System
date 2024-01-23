@extends('layouts.admin-layout')

@section('pageTitle', 'Profile')

@section('profile')
    {{-- Page Heading --}}
    <x-headings.heading>
        My Account
    </x-headings.heading>

    {{-- Alert Messages --}}
    <x-alerts.alert />

    {{-- Profile Details --}}
    <x-profile-comp.profile />

@endsection
