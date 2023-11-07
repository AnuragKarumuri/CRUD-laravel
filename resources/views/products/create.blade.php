<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel CRUD</title>
</head>
<body>
@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <div class="card mt-3 p-3">
            <form method="POST" action="/product/store" enctype="multipart/form-data">
              @csrf
              <!-- <input type="hidden" name="email_action" value="/send-email"> -->
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                @if($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
              </div>
              
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" value="{{ old('image') }}"/>
                @if($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
              </div>
              <button type="submit" class="btn btn-dark" >Submit</button>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
</body>
</html>