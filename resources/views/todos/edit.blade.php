@extends('layouts.app')

@section('title')
Update: {{ $todo->name }}
@endsection

@section('content')
<h1 class="text-center my-5">Update to-do: {{ $todo->name }}</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                New info
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
                <form action="/todos/{{ $todo->id }}/update-todo" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $todo->name }}" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" cols="5" rows="5" class="form-control" placeholder="Enter a description...">{{ $todo->description }}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-info">
                            Update To-do
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
