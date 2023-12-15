@extends('Layouts.app')

@section('content')
<h2>Edit your contact here!!</h2>


<form action="{{route('edit.contact', $contact->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        
            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{$contact->name}}">
            @error('name')
                <span style="color: rgb(116, 113, 113)">{{$message}}</span>
             @enderror<br>
        
            <label for="phone">Phone</label><br>
            <input type="text" name="phone" value="{{$contact->phone}}">
            @error('phone')
            <span style="color: red">{{$message}}</span>
         @enderror<br>
        
            <label for="email">E-mail</label><br>
            <input type="email" name="email" value="{{$contact->email}}">
            @error('email')
                <span style="color: red">{{$message}}</span>
             @enderror<br>

             
             <input type="hidden" name="oldimage" value="{{$contact->image}}">
             <img src="{{asset('images/'.$contact->image)}}" height="50px" alt="">

            <label for="image">Image</label><br>
            <input type="file" name="image" value="{{$contact->image}}">
            @error('image')
                 <span style="color: red">{{$message}}</span>
            @enderror<br><br>
        
            <button type="submit">Save</button>
        </form>
    
@endsection