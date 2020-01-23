@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add Posts</a>
</div>

<div class="card">
    <div class="card-header">Posts</div>

    <div class="card-body">
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                <td>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" style='width:120px'>
                    <img src="{{ $post->image }}" alt="" style='width:120px'>
                </td>

                <td>
                    {{ $post->title }}
                </td>
                <td>
                    
                    @if(!$post->trashed())
                        <td>
                            <a href="{{ route('categories.edit', $post->id) }}" class="btn btn-info btn-sm">
                                Edit
                            </a>
                        </td>
                    @endif

                        <td>
                            <form action="{{ route('posts.destroy' , $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    {{ $post->trashed() ? 'Delete' : 'Trash'}}
                                </button>
                            </form>
                        </td>
                </td>
            </tr>
            @endforeach 
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="" method="POST" id="deletePostForm">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-center text-bold">
                Are you sure you want to delete this post ?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    function handleDelete(id) {
      var form = document.getElementById('deletePostForm')
      form.action = '/posts/destroy/' + id
      $('#deleteModal').modal('show')
    }
  </script>
@endsection