{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('odf_interfaces.destroy', $odfInterface->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{$odfInterface}} ?</h5>
    </div>
    <div class="modal-footer">
        <a href="{{route("odf_interfaces.index")}}" class="btn btn-round btn-secondary"
           data-bs-dismiss="modal">back</a>
        <button type="submit" class="btn btn-round btn-danger">Yes, Delete OLT Interface</button>
    </div>

</form>
