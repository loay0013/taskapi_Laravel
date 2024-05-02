<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()->map(function ($task) {
            if ($task->image) {
                $task->image = asset('storage/' . $task->image); // Generates a URL for the image
            }
            return $task;
        });

        return response()->json(["tasks" => $tasks], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // Validates image uploads
        ]);

        $task = new Task($validatedData);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // Stores in storage/app/public/images
            $task->image = $path; // Save the path in the database
        }

        $task->save();
        return response()->json(['msg' => 'Task is created', 'task' => $task], 201);
    }
    public function show($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->image = url('/storage/' . $task->image); // Antager at billederne er gemt i storage/images mappen
            return response()->json($task);
        } else {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }
    public function complete(Request $request)
    {
        $request->validate(['id' => 'required|integer|exists:tasks,id']);
        $task = Task::findOrFail($request->id); // findOrFail automatically returns a 404 if not found

        $task->completed = !$task->completed;
        $task->save();

        return response()->json($task, 200);
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id); // This will automatically throw a 404 if the task isn't found
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

}


