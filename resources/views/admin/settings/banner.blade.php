@extends('layouts.admin-layout')

@section('pageTitle', 'Banner')

@section('banner')
    {{-- Page Heading --}}
    <x-headings.heading>
        Banner Settings
    </x-headings.heading>

    {{-- Alert Message --}}
    <x-alerts.alert />

    {{-- Data Container --}}
    <x-admin-components.container>
        <div class="row">
            <div class="col-md-4 bg-light p-3">
                <h4 class="txt-primary fw-bold mb-5 text-center">Add Banner Image</h4>
                <small class="text-danger">
                    <ul>
                        <li>Image files must be in JPG, JPEG, PNG format.</li>
                    </ul>
                </small>
                <x-forms.form action="{{ route('banner.store', ['banner' => 1]) }}" method="POST">
                    <div class="mb-4">
                        <x-forms.input type="file" name="banner_image" id="banner_image"
                            class="{{ $errors->has('banner_image') ? 'is-invalid' : '' }}" />
                        <x-errors.validation-error field="banner_image" />
                    </div>
                    <button type="submit" class="button button-primary">Add</button>
                </x-forms.form>
            </div>
            <div class="col-md-8 p-3">
                <h4 class="txt-primary fw-bold mb-5 text-center">Banner Images</h4>
                @if (count($bannerImages) === 0)
                    <div class="alert alert-warning" role="alert">
                        No record found.
                    </div>
                @else
                    @foreach ($bannerImages as $bannerImage)
                        <div class="bg-light d-flex justify-content-between align-items-center mb-4 p-3">
                            <img src="{{ asset('storage/settings/banner/' . $bannerImage->banner_image) }}"
                                alt="Banner Image" style="width: 60%;">
                            <x-admin-components.buttons.delete-button
                                route="{{ route('banner.destroy', ['banner' => $bannerImage->id]) }}" />
                        </div>
                    @endforeach
                    {{ $bannerImages->links() }}
                @endif
            </div>
        </div>
    </x-admin-components.container>
@endsection
