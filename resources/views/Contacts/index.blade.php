@extends('Layouts.app')

@section('content')

<h1> Welcome to the Contact Page!!!</h1><br>

<a href="{{route('create.contact')}}">
    <h2>Create a New contact</h2>
</a>

@if (Session::has('success'))
<span style="color: green;">{{Session::get('success')}}</span><br>   
@endif

    <div class="tabulate">
        <table>
            <tr>
                <th>Sn</th>
                <th>Name</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($contact as $cont)
                
            <tr>
                <td>{{$cont->id}}</td>
                <td>{{$cont->name}}</td>
                <td>{{$cont->phone}}</td>
                <td>{{$cont->email}}</td>
                <td>
                    <img src="{{asset('/images/'.$cont->image)}}" alt="" width="50px" style="border-radius:50px">
                </td>
                <td>
                    <a href="{{route('edit.contact',$cont->id)}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>



    
@endsection