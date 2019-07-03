@extends('layouts.app')

@section('title')
Create a new to-do
@endsection

@section('content')
<h1 class="text-center my-5">Create a to-do</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                New to-do info
            </div>
            <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/store-todo" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" cols="5" rows="5" class="form-control" placeholder="Enter a description..."></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">
                            Create To-do
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
