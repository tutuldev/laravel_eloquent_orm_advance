@extends('layout')
@section('title')
All User Data
@endsection

@section('content')
<a href="{{route('user.create')}}" class="btn btn-success btn-sm mb-3">Add New</a>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Show</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                @foreach ( $users as $user)
                <tr>
                    <td class="px-5">{{$user->id}}</td>
                    <td class="px-5">{{$user->name}}</td>
                    <td class="px-5">{{$user->email}}</td>
                    <td class="px-5">{{$user->age}}</td>
                    <td class="px-5">{{$user->city}}</td>
                    <td>  <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-sm">View</a></td>
                    <td>  <a href="{{route('user.show',$user->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                    <td>  <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                  </tr>
                @endforeach
            </table>
@endsection
