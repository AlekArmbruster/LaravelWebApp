<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->done = false;
        $todo->priority = false;
        
        $todo->save();

        return \Response::make($todo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $toDo)
    {
        $id = $request->id;
        $todoDB = Todo::find($id);

        $todoDB->name = $request->name;
        $todoDB->done = $request->done;
        $todoDB->priority = $request->priority;
        $todoDB->save();

        // $retTodo = new Todo;
        // $retTodo->name = $todoDB->name;
        // $retTodo->done = $todoDB->done;
        // $retTodo->priority = $todoDB->priority;

        return \Response::make($todoDB, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    // public function destroy(ToDo $toDo)
    public function destroy(Request $request, ToDo $toDo)
    {
        $id = $request->id;
        Todo::destroy($id);
        return \Response::make('Todo deleted', 204);
    }
}
