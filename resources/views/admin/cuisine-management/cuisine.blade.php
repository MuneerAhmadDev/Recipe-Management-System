<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
@extends('layouts.admin-layout')

@section('pageTitle', 'Cuisine')

@section('cuisine')
    {{-- Page Heading --}}
    <x-headings.heading>
        Cuisine Management
    </x-headings.heading>

    {{-- Data Continer --}}
    <x-admin-components.container>
        {{-- Content Heading --}}
        <x-headings.content-heading>
            <x-buttons.add-button href="{{ route('cuisine.create') }}" /> All Cuisines
        </x-headings.content-heading>

        {{-- Search Form --}}
        <x-admin-components.search-content action="{{ route('cuisine.index') }}" />

        {{-- All Cuisines --}}
        <div class="row px-2">
            <div class="col-md-12">
                @if (count($cuisines) === 0)
                    <x-alerts.no-record-found />
                @else
                    <x-admin-components.data-table>
                        <thead>
                            <tr>
                                <th class="bgcol-primary text-white">#</th>
                                <th class="bgcol-primary text-white">Cuisine Name</th>
                                <th class="bgcol-primary text-white">Date Created</th>
                                <th class="bgcol-primary text-white">Date Updated</th>
                                <th class="bgcol-primary text-center text-white">Edit</th>
                                <th class="bgcol-primary text-center text-white">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuisines as $cuisine)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $cuisine->name }} </td>
                                    <td>
                                        <small>{{ \Carbon\Carbon::parse($cuisine->created_at)->format('d-M-Y h:i:s a') }}</small>
                                    </td>
                                    <td>
                                        <small>{{ \Carbon\Carbon::parse($cuisine->updated_at)->format('d-M-Y h:i:s a') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <x-buttons.update-button
                                            href="{{ route('cuisine.edit', ['cuisine' => $cuisine->id]) }}" />
                                    </td>
                                    <td class="text-center">
                                        <x-buttons.delete-button
                                            href="{{ route('cuisine.destroy', ['cuisine' => $cuisine->id]) }}"
                                            class="delete-cuisine-btn" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-admin-components.data-table>
                @endif
                <div class="mt-3">
                    {{ $cuisines->links() }}
                </div>
            </div>
        </div>
    </x-admin-components.container>

    @push('javascript')
        <script src="{{ asset('js/ajax/cuisine/deleteCuisine.js') }}" defer></script>
    @endpush
@endsection
