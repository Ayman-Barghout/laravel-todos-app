@extends('layouts.app')

@section('title')
To-do: {{ $todo->name }}
@endsection

@section('content')
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
