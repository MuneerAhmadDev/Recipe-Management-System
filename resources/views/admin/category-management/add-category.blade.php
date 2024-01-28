@extends('layouts.admin-layout')

@section('pageTitle', 'Add Category')

@section('add-category')
    {{-- Page Heading --}}
    <x-headings.heading>
        Category Management
    </x-headings.heading>

    {{-- Alert --}}
    <x-alerts.alert />

    {{-- Data Continer --}}
    <x-admin-components.container>

        {{-- Content Heading --}}
        <x-headings.content-heading>
            Add Categories
        </x-headings.content-heading>

        {{-- Add Category Form --}}
        <div class="row px-2">
            <div class="col-md-12 p-3">
                <x-forms.form action="{{ route('category.store') }}" method="POST">
                    <div class="mb-3">
                        <x-forms.label for="category_picture" text="Category Picture (Supported format: jpg, jpeg, png)" />
                        <x-forms.input type="file" name="category_picture" id="category_picture"
                            class="{{ $errors->has('category_picture') ? 'is-invalid' : '' }}" />
                        <div class="text-success mt-1">
                            <small>
                                Dimensions Should be 640 x 416
                            </small>
                        </div>
                        <div id="category_picture_error"></div>
                        <x-errors.validation-error field="category_picture" />
                    </div>
                    <div class="mb-3">
                        <x-forms.label for="category_name" text="Category Name" />
                        <x-forms.input type="text" name="category_name" id="category_name"
                            class="{{ $errors->has('category_name') ? 'is-invalid' : '' }}"
                            value="{{ old('category_name') }}" />
                        <div id="category_name_error"></div>
                        <x-errors.validation-error field="category_name" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="button button-primary">Add Category</button>
                    </div>
                </x-forms.form>
            </div>
        </div>

    </x-admin-components.container>

    @push('javascript')
        <script type="module" src="{{ asset('js/validations/categoryValidation.js') }}" defer></script>
    @endpush
@endsection
