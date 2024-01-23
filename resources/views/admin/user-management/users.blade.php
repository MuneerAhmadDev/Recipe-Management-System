@extends('layouts.admin-layout')

@section('pageTitle', 'Users')

@section('users')
    {{-- Page Heading --}}
    <x-headings.heading>
        Users Management
    </x-headings.heading>

    {{-- Data Container --}}
    <x-admin-components.container>
        {{-- Content Heading --}}
        <x-headings.content-heading>
            All Users
        </x-headings.content-heading>

        {{-- Search Form --}}
        <x-admin-components.search-content action="{{ route('users.index') }}" />

        {{-- Data Table --}}
        <div class="row">
            <div class="col-md-12 py-2">
                <x-admin-components.data-table>
                    <thead>
                        <tr>
                            <th class="bgcol-primary text-white">#</th>
                            <th class="bgcol-primary text-white">Name</th>
                            <th class="bgcol-primary text-white">Email</th>
                            <th class="bgcol-primary text-white">Profession</th>
                            <th class="bgcol-primary text-center text-white">View</th>
                            <th class="bgcol-primary text-center text-white">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->profession }} </td>
                                <td class="text-center">
                                    <x-admin-components.buttons.view-button
                                        href="{{ route('users.show', ['id' => $user->id]) }}" />
                                </td>
                                <td class="text-center">
                                    @if ($user->role !== 'admin')
                                        <x-admin-components.buttons.delete-button
                                            route="{{ route('users.destroy', ['id' => $user->id]) }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-admin-components.data-table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </x-admin-components.container>
@endsection
