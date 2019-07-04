@extends('layouts.app')

@section('title')
To-do: {{ $todo->name }}
@endsection

@section('content')

@if ($todo->completed == true)
<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Keep up the good work
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@else
<div class="mt-3 alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Just do it!</strong> Are you done with this task?
    <a href="/todos/{{ $todo->id }}/complete" class="close button">
        <span aria-hidden="true">&#10004;</span>
    </a>
</div>
@endif

<h1 class="text-center my-5">
    {{ $todo->name }}
</h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                Details
            </div>
            <div class="card-body">
                {{ $todo->description }}
                <div class="row mt-5">
                    <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info col-md-6">Edit</a>
                    <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger col-md-6">Delete</a>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
