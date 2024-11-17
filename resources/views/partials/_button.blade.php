<!-- resources/views/partials/_button.blade.php -->
<div class="row">
    <div class="col-md-12">
        @if (accessable($view))
            <a href="{{ route($view, $item) }}" class='btn btn-info btn-sm'>
                <span class='ri-eye-fill'></span>
            </a>
        @endif

        @if (accessable($modify))
            <a href="{{ route($modify, $item) }}" class='btn btn-warning btn-sm'>
                <span class='ri-edit-circle-fill'></span>
            </a>
        @endif

        @if (accessable($trash))
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                data-target=".confirm{{ $item->id }}">
                <span class='ri-delete-bin-fill'></span>
            </button>
        @endif

        @include('partials._confirm', [
            'route' => $trash,
            'item' => $item,
        ])
    </div>
</div>
