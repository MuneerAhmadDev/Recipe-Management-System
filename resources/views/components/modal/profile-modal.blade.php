<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: none; border: none; ">
            <div class="modal-header" style="border: none;">
                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">{{ auth()->user()->name }}</h1> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center" style="background: none; ">
                <img src="{{ asset('storage/users/' . auth()->user()->picture) }}" alt="User Picture"
                    style="width: 60%;" />
            </div>
        </div>
    </div>
</div>
