<form action="{{ route('admin.authors.destroy', $author->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Do you wanna delete this author: {{ $author->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Ok, Delete Author</button>
    </div>
</form>