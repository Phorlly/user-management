<!-- Modal -->
<div class="modal confirm{{ $item->id }} fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route($route, $item->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title m-auto text-uppercase">Confirmation..!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you sure,</h5>
                    <h6 class="my-3">
                        You want to delete Name of <b>({{ $item->name }})</b>?
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">
                        <i class="ri-close-circle-fill"></i>
                        <span class="text-uppercase">No</span>
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="ri-save-2-fill"></i>
                        <span class="text-uppercase">OK</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
