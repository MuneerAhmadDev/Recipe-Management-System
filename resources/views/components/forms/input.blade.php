<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge([
        'value' => '',
        'class' => 'form-control',
        'placeholder' => '',
        'style' => '',
    ]) }} />
