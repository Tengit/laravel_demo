<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Do you wanna delete this category: {{ $category->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Ok, Delete Category</button>
    </div>
</form>