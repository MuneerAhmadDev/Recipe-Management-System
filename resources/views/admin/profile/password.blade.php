@extends('layouts.admin-layout')

@section('pageTitle', 'Password')

@section('password')
    {{-- Page Heading --}}
    <x-headings.heading>
        My Account (<small class="text-dark fs-5">Change Password</small>)
    </x-headings.heading>

    {{-- Alert Messages --}}
    <x-alerts.alert />

    {{-- Password Update --}}
    <x-profile-comp.password />
@endsection
