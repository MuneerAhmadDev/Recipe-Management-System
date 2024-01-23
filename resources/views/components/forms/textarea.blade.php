<textarea class="form-control" name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge([
        'value' => '',
        'class' => 'form-control',
        'placeholder' => '',
        'style' => '',
        'rows' => '',
    ]) }}>
{{ $slot }}
</textarea>
