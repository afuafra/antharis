{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('olt_interfaces.destroy', $oltinterface->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $oltinterface->olt->olt_device_id }}# CARD{{ $oltinterface->olt_card }}/PORT{{ $oltinterface->olt_port }} ?</h5>
    </div>
    <div class="modal-footer">
        <a href="{{route("olt_interfaces.index")}}" class="btn btn-round btn-secondary"
           data-bs-dismiss="modal">back</a>
        <button type="submit" class="btn btn-round btn-danger">Yes, Delete OLT Interface</button>
    </div>

</form>
