<form enctype="multipart/form-data"
    {{ $attributes->merge([
        'class' => '',
        'id' => '',
        'action' => '',
        'method' => '',
    ]) }}>
    @csrf
    {{ $slot }}
</form>
