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
                    <a href="{{ route('categories.edit', $post->id) }}" class="btn btn-info btn-sm">
                        Edit
                    </a>
                </td>
            </tr>
                {{--  <li class="list-group-item">{{ $post->title }}
                    <a href="{{ route('categories.edit', $post->id) }}" class="btn btn-info btn-sm">
                        Edit
                    </a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $post->id }})">Delete</button>
                </li>  --}}
            @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection