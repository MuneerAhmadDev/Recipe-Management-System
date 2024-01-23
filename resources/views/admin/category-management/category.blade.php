@extends('layouts.admin-layout')

@section('pageTitle', 'Category')

@section('category')
    {{-- Page Heading --}}
    <x-headings.heading>
        Category Management
    </x-headings.heading>

    {{-- Data Continer --}}
    <x-admin-components.container>
        {{-- Content Heading --}}
        <x-headings.content-heading>
            <x-admin-components.buttons.add-button href="{{ route('category.create') }}" /> All Categories
        </x-headings.content-heading>

        {{-- Search Form --}}
        <x-admin-components.search-content action="{{ route('category.index') }}" />

        {{-- All Categories --}}
        <div class="row px-2">
            @if (count($categories) === 0)
                <div class="alert alert-warning" role="alert">
                    No record found.
                </div>
            @else
                @foreach ($categories as $category)
                    <div class="col-md-6 mt-2">
                        <div class="card mb-3" style="max-width: 540px; border-radius: 0px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/category/' . $category->picture) }}" class="img-fluid"
                                        alt="Category Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $category->name }}</h6>
                                        <div class="card-text">
                                            <small class="text-body-secondary">
                                                Created at :
                                                <span class="text-dark">
                                                    {{ \Carbon\Carbon::parse($category->created_at)->format('d-M-Y h:i:s a') }}
                                                </span>
                                            </small>
                                        </div>
                                        <div class="card-text">
                                            <small class="text-body-secondary">
                                                Updated at :
                                                <span class="text-dark">
                                                    {{ \Carbon\Carbon::parse($category->updated_at)->format('d-M-Y h:i:s a') }}
                                                </span>
                                            </small>
                                        </div>
                                        {{-- Action Buttons --}}
                                        <div class="card-text d-flex mt-1">
                                            <x-admin-components.buttons.update-button
                                                href="{{ route('category.edit', ['category' => $category->id]) }}" />
                                            <x-admin-components.buttons.delete-button
                                                route="{{ route('category.destroy', ['category' => $category->id]) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </x-admin-components.container>
@endsection
