<div {{ $attributes->merge(['class' => 'container-fluid mb-4 px-4']) }}>
    <div class="row">
        <div class="col-md-12 bg-body p-4">
            {{-- Strong Password Guides --}}
            <div class="mb-4">
                <h2 class="txt-primary">Password Requirements</h2>
                <ul>
                    <li><strong>Password length:</strong> Minimum 8 and maximum 13 characters.</li>
                    <li><strong>At least 1:</strong>
                        <ul>
                            <li>Lowercase character</li>
                            <li>Uppercase character</li>
                            <li>Numeric character</li>
                            <li>Special character</li>
                        </ul>
                    </li>
                    <li><strong>Avoid the following special characters:</strong> ' , " , & , + , ? , &lt; , &gt;</li>
                </ul>
            </div>

            {{-- Change Password Form --}}
            <x-forms.form action="{{ route('password.update', ['password' => auth()->user()->id]) }}" method="POST">
                @method('PUT')
                <div class="mb-4">
                    <x-forms.label for="currentPassword" text="Current Password" />
                    <x-forms.input type="password" name="currentPassword" id="currentPassword"
                        class="{{ $errors->has('currentPassword') ? 'is-invalid' : '' }}" />
                    <x-errors.validation-error field="currentPassword" />
                </div>
                <div class="mb-4">
                    <x-forms.label for="password" text="New Password" />
                    <x-forms.input type="password" name="password" id="password"
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}" />
                    <x-errors.validation-error field="password" />
                </div>
                <div class="mb-4">
                    <x-forms.label for="password_confirmation " text="Confirm Password" />
                    <x-forms.input type="password" name="password_confirmation" id="password_confirmation"
                        class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" />
                    <x-errors.validation-error field="password_confirmation" />
                </div>
                <button type="submit" class="button button-primary">Save</button>
            </x-forms.form>
        </div>
    </div>
</div>
