@extends('layouts.admin-layout')

@section('pageTitle', 'Category')

@section('update-category')
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
            Update Category
        </x-headings.content-heading>

        {{-- Update Category --}}
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/category/' . $category->picture) }}" class="img-fluid"
                                alt="Category Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <x-forms.form action="{{ route('category.update', ['category' => $category->id]) }}"
                                    method="POST">
                                    @method('PUT')
                                    <div class="mb-4">
                                        <x-forms.label for="category_picture"
                                            text="Category Picture (Supported format: jpg, jpeg, png)" />
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
                                    <div class="mb-4">
                                        <x-forms.label for="category_name" text="Category Name" />
                                        <x-forms.input type="text" name="category_name" id="category_name"
                                            class="{{ $errors->has('category_name') ? 'is-invalid' : '' }}"
                                            value="{{ $category->name }}" />
                                        <div id="category_name_error"></div>
                                        <x-errors.validation-error field="category_name" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="button button-primary">Update Category</button>
                                    </div>
                                </x-forms.form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-admin-components.container>

    @push('javascript')
        <script type="module" src="{{ asset('js/validations/categoryValidation.js') }}" defer></script>
    @endpush
@endsection
