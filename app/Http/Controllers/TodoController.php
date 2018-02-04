<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
      $todos = Todo::all();
      return view('home')->with('todos', $todos);
    }

    public function create()
    {
      return view('todo.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
              'title'         => 'required|max:255',
              'description'   => 'required'
      ]);

      $todo = new Todo;

      $todo->title = $request->title;
      $todo->description = $request->description;

      $todo->save();

      return redirect('/')->with('success', 'Task created successfully.');
    }

    public function remove($id)
    {
      $todo = Todo::where('id', $id)->firstOrFail();

      $todo->delete();

      return redirect('/');

    }
}
