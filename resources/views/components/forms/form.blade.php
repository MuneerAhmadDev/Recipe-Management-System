<form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data"
    {{ $attributes->merge([
        'class' => '',
        'id' => '',
    ]) }}>
    @csrf
    {{ $slot }}
</form>
