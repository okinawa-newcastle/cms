@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="/categories" class="btn btn-primary">Categories</a>
                    <a href="/categories/create" class="btn btn-primary">Add Category</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
