@extends('layout')
@section('title', 'Contact Us')
@section('content')
    <h1>Contact Us</h1>

    <form action="/contact" method="POST">
        <div class="form-group" >
            <lable for="name">Name:</lable>
            <input type="text" name="name" value="{{old('name')}}">
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{old('email')}}">
            <div>{{$errors->first('email')}}</div>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{old('message')}}</textarea>
            <div>{{$errors->first('message')}}</div>
        </div>

        @csrf

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection
