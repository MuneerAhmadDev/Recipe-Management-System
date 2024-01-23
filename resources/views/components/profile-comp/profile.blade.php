<div {{ $attributes->merge(['class' => 'container-fluid mb-4 px-4']) }}>
    <div class="row">
        <div class="col-md-12 bg-body">
            {{-- Profile Picture Section --}}
            <div class="row">
                <div class="col-md-3 d-flex align-items-center bg-light flex-column p-4">
                    <x-modal.modal-trigger-button>
                        <img src="{{ asset('storage/users/' . auth()->user()->picture) }}" alt="User Picture"
                            style="width: 150px; height: 150px; border-radius: 100%;">
                    </x-modal.modal-trigger-button>
                    <div class="fw-bold fs-5 mt-2">
                        {{ auth()->user()->name }}
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <div class="fw-bold txt-primary">
                            <small>
                                Administrator
                            </small>
                        </div>
                    @endif
                    <x-modal.profile-modal />
                </div>
                <div class="col-md-9 d-flex justify-content-center p-4">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <x-forms.form action="{{ route('profile.update') }}" method="POST">
                                @method('PUT')
                                {{-- Name --}}
                                <div class="mb-3">
                                    <x-forms.label for="userName" text="Name :" />
                                    <x-forms.input type="text" name="userName" id="userName"
                                        value="{{ auth()->user()->name }}" required />
                                </div>
                                {{-- Email --}}
                                <div class="mb-3">
                                    <x-forms.label for="userEmail" text="Email :" />
                                    @if (auth()->user()->role !== 'admin')
                                        <x-forms.input type="hidden" name="userEmail" id="userEmail"
                                            value="{{ auth()->user()->email }}" required />
                                        <div class="bg-light p-3">
                                            {{ auth()->user()->email }}
                                        </div>
                                    @else
                                        <x-forms.input type="email" name="userEmail" id="userEmail"
                                            value="{{ auth()->user()->email }}" required />
                                    @endif
                                </div>
                                {{-- Picture --}}
                                <div class="mb-3">
                                    <x-forms.label for="userPicture" text="Picture :" />
                                    <x-forms.input type="file" name="userPicture" id="userPicture" />
                                </div>
                                {{-- Profession --}}
                                <div class="mb-3">
                                    <x-forms.label for="userProfession" text="Profession :" />
                                    <x-forms.input type="text" name="userProfession" id="userProfession"
                                        value="{{ auth()->user()->profession }}" required />
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="button button-primary">Save</button>
                                </div>
                            </x-forms.form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
