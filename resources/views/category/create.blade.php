
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/category/store') }}" method="POST">
            @csrf

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if($errors->any())
            <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
            </ul>
            @endif

                <div class="form-group">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                  <input type="text" name="name" class="form-control form-control-user">
                </div>       

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>