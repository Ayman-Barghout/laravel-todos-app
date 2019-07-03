<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    public function index()
    { 
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show($todoId)
    {
        return view('todos.show')->with('todo', Todo::find($todoId));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'name' => 'required|min:6|max:25',
            'description' => 'required',
        ]);

        $data = request()->all();

        $todo = new Todo(array(
            'name' => $data['name'],
            'description' => $data['description'],
            'completed' => false
        ));

        $todo->save();

        return redirect('/todos'); 
    }
}
