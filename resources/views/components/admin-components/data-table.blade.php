<div class="table-responsive">
    <table {{ $attributes->merge([
        'class' => 'table-striped table',
        'id' => '',
    ]) }}>
        {{ $slot }}
    </table>
</div>
