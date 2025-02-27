<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // If the request is ajax, return the data in JSON
        if ($request->wantsJson()) {
            return Todo::all();
        }

        return view('todos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the input which is the task string before storing it in the database
        $validated = $request->validate(['task' => 'required|string|max:255']);

        //Since this is a new task, set is_completed to false
        return Todo::create($validated + ['is_completed' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //Update the task completion status
        $todo->update($request->validate(['is_completed' => 'required|boolean']));
        return $todo;
    }
}
