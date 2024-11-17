<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        @foreach (App\Models\Module::all() as $item)
            @if (accessable($item->name))
                <li class="nav-item {{ isActive($item->segment) }}">
                    <a class="nav-link" href="{{ route($item->name) }}">
                        <i class="{{ $item->icon }}"></i>
                        <span>{{ $item->text }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    <div class="form-inline">
        <div class="mr-3"><b class="text-uppercase"> Hello</b>, {{ auth()->user()->name }} </div>
        <a class="btn btn-danger btn-sm text-white" href="{{ route('logout') }}">
            <i class="ri-shut-down-line"></i>
            <span>Exit</span>
        </a>
    </div>
</div>
