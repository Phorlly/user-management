@php
    $type = $type ?? 'text';
    $value = $value ?? '';
    $required = $required ?? 'required';
    $readonly = $readonly ?? '';
@endphp

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input {{ $readonly }} type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        class="form-control" placeholder="Enter {{ $label }}" {{ $required }}>
</div>
