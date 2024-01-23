<div class="row">
    <div class="col-md-12 py-3">
        <x-forms.form action="{{ $action }}" method="GET">
            <div class="input-group">
                <x-forms.input type="search" name="contentSearch" id="contentSearch" placeholder="Search..." />
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <a href="{{ $action }}" class="btn btn-outline-success" type="button">
                    Show All
                </a>
            </div>
        </x-forms.form>
    </div>
</div>
