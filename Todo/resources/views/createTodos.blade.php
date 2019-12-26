@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
            

                    <h1>Create New To-Do </h1>
                    <form method = "post">
                    @csrf
                    <div class="form-group row">
                            <label for="title" class="">{{ __('Title : ') }}</label>
                            <input type="text" name="title" id="" class="form-control" value="{{old('title')}}" >
                            {{$errors->first('title')}}
                    </div>

                    <!-- <label>Title</label>
                    <input type="text" name="title" value=""> -->
                    <br>
                    <div class="form-group row">
                            <label for="description" class="">{{ __('Description : ') }}</label>

                            <textarea name="description" id="" cols="30" rows="4">{{old('description')}}</textarea>
                            {{$errors->first('description')}}
                    </div>
                    <!-- <label> Description </label>
                    <textarea type = "textarea" name="description" value=""></textarea> -->
                    <br>
                    <button type = "submit"> Save Todo </button>
                    </form>

                    <br>
       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
