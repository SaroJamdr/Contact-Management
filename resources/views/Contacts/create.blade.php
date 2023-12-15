@extends('Layouts.app')

@section('content')


<form action="{{route('create.contact')}}" method="post" enctype="multipart/form-data">
        @csrf
        
            <label for="name">Name</label><br>
            <input type="text" name="name">
            @error('name')
                <span style="color: red">{{$message}}</span>
             @enderror<br>
        
            <label for="phone">Phone</label><br>
            <input type="text" name="phone">
            @error('phone')
            <span style="color: red">{{$message}}</span>
         @enderror<br>
        
            <label for="email">E-mail</label><br>
            <input type="email" name="email">
            @error('email')
                <span style="color: red">{{$message}}</span>
             @enderror<br>

            <label for="image">Image</label><br>
            <input type="file" name="image">
            @error('image')
                 <span style="color: red">{{$message}}</span>
            @enderror<br><br>
        
            <button type="submit">Save</button>
        </form>
    
@endsection