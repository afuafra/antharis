{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('fcabs_interface.destroy', $fcabinterface->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $fcabinterface->entity_id }} ?</h5>
    </div>
    <div class="modal-footer">
        <a href="{{route("fcabs_interface.index")}}" class="btn btn-round btn-secondary"
           data-bs-dismiss="modal">back</a>
        <button type="submit" class="btn btn-round btn-danger">Yes, Delete</button>
    </div>

</form>
