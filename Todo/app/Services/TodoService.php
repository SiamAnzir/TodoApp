<?php

namespace App\Services;
use App\TodoModel;
use Auth;

class TodoService
{
    public function getAuthUserIncompleteTodos()
    {
        return TodoModel::incompleteTodos();
    } 

    public function getAuthUserCompleteTodos()
    {
        return TodoModel::completeTodos();
    }

    public function searchIncompleteTodos($keyword)
    {
        return Auth::user()
                ->Todos()
                ->where('title','LIKE','%'.$keyword.'%')
                ->orWhere('description','LIKE','%'.$keyword.'%')
                ->get()
                ->where('is_complete',false)
                ->all();
    }
    public function searchCompleteTodos($keyword)
    {
        return Auth::user()
                ->Todos()
                ->where('title','LIKE','%'.$keyword.'%')
                ->orWhere('description','LIKE','%'.$keyword.'%')
                ->get()
                ->where('is_complete',true)
                ->all();
    }

    public function addTodo($request)
    {
        TodoModel::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'is_complete' => false,
        ]);
        
    }

    public function deleteTodo($todo)
    {
        $todo->delete();
    }

    public function updateTodo($request,$todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    public function markComplete($todo)
    {
        $todo->update([
            'is_complete' => true,
        ]);
    }
    public function markUndo($todo)
    {
        $todo->update([
            'is_complete' => false,
        ]);
    }
}