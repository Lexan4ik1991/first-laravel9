<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

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
        dd(request()->all());

        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();
        session()->flash('success', 'Задача создана');
        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
      return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
      $this->validate(request(), [
        'name' => 'required|min:6|max:12',
        'description' => 'required'
      ]);

      $data = request()->all();


      $todo->name = $data['name'];
      $todo->description = $data['description'];

      $todo->save();
      session()->flash('success', 'Задача отредактирована.');
      return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
      $todo->delete();
      session()->flash('success', 'Задача успешно удалена.');
      return redirect('/todos');
    }
    public function complete(Todo $todo)
    {
      $todo->completed = true;
      $todo->save();
      session()->flash('success', 'Задача выполнена.');
      return redirect('/todos');
    }
}
