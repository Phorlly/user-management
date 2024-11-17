<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea class="form-control" name="{{ $name }}" placeholder="Provide {{ $label }}">{{ old($name, $value ?? '') }} </textarea>
</div>
{{-- <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" placeholder="Provide Description">{{ old('description') }}</textarea>
</div> --}}
