{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('olts.destroy', $olt->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $olt->olt_device_id }} ?</h5>
    </div>
    <div class="modal-footer">
        <a href="{{route("olts.index")}}" class="btn btn-round btn-secondary"
           data-bs-dismiss="modal">back</a>
        <button type="submit" class="btn btn-round btn-danger">Yes, Delete OLT</button>
    </div>

</form>
