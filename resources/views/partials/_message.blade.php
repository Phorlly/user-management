<div class="row my-3 text-center">
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="ri-checkbox-circle-line me-1"></i>
                {{ Session::get('success') }}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="ri-close-circle-line me-1"></i>
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
</div>
