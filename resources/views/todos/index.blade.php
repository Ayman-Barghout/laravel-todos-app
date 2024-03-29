@extends('layouts.app')

@section('title')
Todos List
@endsection

@section('content')
<h1 class="text-center my-5">To-dos List</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Todos
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                    <li class="list-group-item">
                        @if ($todo->completed == true)
                            <del>{{ $todo->name }}</del>
                        @else
                            {{ $todo->name }}
                        @endif
                        <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right">
                            View
                        </a>

                        @if ($todo->completed == false)
                        <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning btn-sm float-right mx-2">
                            Done
                        </a>
                        @endif

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
