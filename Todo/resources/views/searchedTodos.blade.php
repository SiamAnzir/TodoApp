@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{route('search')}}" method="get">
                        <div class="form-group">
                            <input type="text" name="search" id="search">
                            <button type="submit">Search</button>
                        </div>
                    </form>

                    <h1><b>Incomplete Todo Lists: </b></h1>
                    @foreach($incompleteTodos as $todo)
                    <li>
                        <h3>Title: {{$todo->title}}</h3>
                        <h3>Description: {{$todo->description}} </h3>
                        Created: {{$todo->created_at}}

                        <form method="post" action="{{route('deleteTodos',[$todo->id])}}">
                        @method('DELETE')
                        @csrf
                        <button type= "submit">Delete</button>
                        </form>
                        <button><a href = "{{route('editTodos',[$todo->id])}}">Update</a></button>
                        <button type="button" ><a href = "{{route('markComplete',[$todo->id])}}"> Complete </a></button>
                    </li>
                    @endforeach
                    <br>
                    <hr>
                    <br>
                    
                    <hr>
                    <h2><b>Completed Todo lists : </b></h2>
                    @foreach($completeTodos as $todo)
                    <li>
                        <h3>Title: {{$todo->title}}</h3>
                        <h3>Description: {{$todo->description}} </h3>
                        Created: {{$todo->created_at}}
                        Completed: {{$todo->updated_at}}
                        <br>
                        <button><a href="{{route('markUndo',[$todo->id])}}">Undo</a></button>

                    </li>
                    @endforeach
                    <br>
                    
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection