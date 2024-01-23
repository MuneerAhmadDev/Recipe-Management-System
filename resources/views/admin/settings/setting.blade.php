@extends('layouts.admin-layout')

@section('pageTitle', 'Settings')

@section('settings')
    {{-- Page Heading --}}
    <x-headings.heading>
        General Settings
    </x-headings.heading>

    {{-- Alert message --}}
    <x-alerts.alert />

    {{-- Settings --}}
    <x-admin-components.container>
        <x-forms.form action="{{ route('settings.update', ['setting' => 1]) }}" method="POST" class="p-3">
            @method('PUT')
            <div class="row">
                <div class="col-md-5 d-flex justify-content-center align-items-start">
                    <img src="{{ asset('storage/settings/logo/' . $settings->company_logo) }}" alt="logo"
                        style="width: 80%;">
                </div>
                <div class="col-md-7">
                    <div class="mb-4">
                        <x-forms.label for="company_logo" text="Company Logo" />
                        <x-forms.input type="file" name="company_logo" id="company_logo"
                            class="{{ $errors->has('company_logo') ? 'is-invalid' : '' }}" />
                        <small class="text-danger fw-bold mt-2">
                            Recommended svg. Max size 4MB
                        </small>
                        <x-errors.validation-error field="company_logo" />
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="company_name" text="Company Name" />
                        <x-forms.input type="text" name="company_name" id="company_name"
                            class="{{ $errors->has('company_name') ? 'is-invalid' : '' }}"
                            value="{{ $settings->company_name }}" />
                        <x-errors.validation-error field="company_name" />
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="company_email" text="Company Email" />
                        <x-forms.input type="email" name="company_email" id="company_email"
                            class="{{ $errors->has('company_email') ? 'is-invalid' : '' }}"
                            value="{{ $settings->company_email }}" />
                        <x-errors.validation-error field="company_email" />
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="company_address" text="Company Address" />
                        <x-forms.input type="text" name="company_address" id="company_address"
                            class="{{ $errors->has('company_address') ? 'is-invalid' : '' }}"
                            value="{{ $settings->company_address }}" />
                        <x-errors.validation-error field="company_address" />
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="company_description" text="Description" />
                        <x-forms.textarea name="company_description" id="company_description"
                            class="{{ $errors->has('company_description') ? 'is-invalid' : '' }}" rows="6">
                            {{ $settings->company_description }}
                        </x-forms.textarea>
                        <x-errors.validation-error field="company_description" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="mb-4">
                        <x-forms.label for="company_phone" text="Phone Number (03012345678)" />
                        <x-forms.input type="text" name="company_phone" id="company_phone"
                            class="{{ $errors->has('company_phone') ? 'is-invalid' : '' }}"
                            value="{{ $settings->company_phone }}" />
                        <x-errors.validation-error field="company_phone" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mb-4">
                        <x-forms.label for="company_copyright" text="Site Copyright" />
                        <x-forms.input type="text" name="company_copyright" id="company_copyright"
                            class="{{ $errors->has('company_copyright') ? 'is-invalid' : '' }}"
                            value="{{ $settings->company_copyright }}" />
                        <x-errors.validation-error field="company_copyright" />
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="button button-primary mb-2">Update</button>
                </div>
            </div>
        </x-forms.form>
    </x-admin-components.container>
@endsection
