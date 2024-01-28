@extends('layouts.admin-layout')

@section('pageTitle', 'Add Cuisine')

@section('cuisine')
    {{-- Page Heading --}}
    <x-headings.heading>
        Cuisine Management
    </x-headings.heading>

    {{-- Alert --}}
    <x-alerts.js-alert />

    {{-- Data Continer --}}
    <x-admin-components.container>
        {{-- Content Heading --}}
        <x-headings.content-heading>
            Add Cuisine
        </x-headings.content-heading>

        {{-- Add Cuisine Form --}}
        <div class="row px-2">
            <div class="col-md-12 p-3">
                <x-forms.form action="{{ route('cuisine.store') }}" method="POST" id="add-cuisine-form">
                    <div class="mb-4">
                        <x-forms.label for="cuisine_name" text="Cuisine name" />
                        <x-forms.input type="text" name="cuisine_name" id="cuisine_name" />
                        <div id="cuisine_name_error"></div>
                    </div>
                    <button type="submit" class="button button-primary" id="add-cuisine-btn">Add</button>
                </x-forms.form>
            </div>
        </div>
    </x-admin-components.container>

    @push('javascript')
        <script type="module" src="{{ asset('js/ajax/cuisine/addCuisine.js') }}" defer></script>
    @endpush
@endsection
