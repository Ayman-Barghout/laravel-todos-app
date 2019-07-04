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

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
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

        session()->flash('success', 'To-do created successfully');

        return redirect('/todos'); 
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:25',
            'description' => 'required',
        ]);

        $data = request()->all();

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'To-do updated successsfully');

        return redirect('/todos');
        
    }

    public function delete(Todo $todo)
    {
        $todoName = $todo->name;

        $todo->delete();

        session()->flash('deleted', $todoName .' : deleted successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'one more task done!');

        return redirect('/todos');
    }
}
