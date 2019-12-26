<?php

namespace App\Http\Controllers;

use App\TodoModel;
use App\Services\TodoService;
use Illuminate\Http\Request;
use App\Http\Requests\FieldRequest;
use Auth;

class TodoController extends Controller
{
    private $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function search(Request $request){
        $data['incompleteTodos'] = $this->todoService->searchIncompleteTodos($request->search);
        $data['completeTodos'] = $this->todoService->searchCompleteTodos($request->search);      
        return view('searchedTodos',$data);
    }
    
    public function viewTodos(){
        $data['incompleteTodos'] = $this->todoService->getAuthUserIncompleteTodos();
        $data['completeTodos'] = $this->todoService->getAuthUserCompleteTodos();
        //$data['viewTodos'] = TodoModel::where('user_id', Auth::User()->id)->paginate(1);
        return view('viewTodos',$data);
    }

    public function createTodos(){
        return view('createTodos');
    }

    public function addTodos(FieldRequest $request){
        // $todo = new TodoModel;
        // $todo->user_id = Auth::user()->id;
        // $todo->title = $request->title;
        // $todo->description = $request->description;
        // $todo->save();

        $this->todoService->addTodo($request);

        // TodoModel::create([
        //     'user_id' => Auth::user()->id,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_complete' => false,
        // ]);

        return redirect(route('viewTodos'))->with('success','Todo has been created Successful');
    }

    public function deleteTodos(TodoModel $todo){
         $this->todoService->deleteTodo($todo);
        //$todo = TodoModel::find($id);
        //$todo->delete();

        return redirect(route('viewTodos'));
    }

    public function editTodos(TodoModel $todo){
        //$todo = TodoModel::find($id);

        return view('editTodos', compact($todo,'todo'));
    }

    public function updateTodos(Request $request,TodoModel $todo){

        $this->todoService->updateTodo($request , $todo);
        //$todo = TodoModel::find($id);
        //$updatedTodo = $request->all();
        //$todo->title = $updatedTodo['title'];
        //$todo->description = $updatedTodo['description'];
        //$todo->save();

        // $todo->update([
        //     'title' => $updatedTodo['title'],
        //     'description' => $updatedTodo['description'],
        // ]);

        return redirect(route('viewTodos'));
    }

    public function markComplete(TodoModel $todo){
        
        $this->todoService->markComplete($todo);

        return redirect(route('viewTodos'));
    }

    public function markUndo(TodoModel $todo){
        $this->todoService->markUndo($todo);

        return redirect(route('viewTodos'));
    }
}

