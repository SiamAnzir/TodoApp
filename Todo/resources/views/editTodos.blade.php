@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Update Your To-Do </h1>
                    <form method = "post" action="{{route('updateTodos',[$todo->id])}}">
                    @method('PUT')
                    @csrf
                    <label>Title</label>
                    <input type="text" name="title" value="{{$todo->title}}">
                    <br>
                    <label> Description </label>
                    <textarea type = "textarea" name="description" >{{$todo->description}}</textarea>
                    <br>
                    <button type = "submit"> Update Todo </button>
                    </form>

                    <br>
                    <br>
                    <button><a href = "{{route('viewTodos')}}"> No need to Update,Back to the List </a> </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
