@extends('Layout')
@section('title','category')
@section('content')

    <x-slot name="title">
        Categories
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4>Categories
                        <a href="{{url('catergories/create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Is Active</th>
                            <th>Time Slot</th> <!-- Time Slot Header -->
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($catergories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/'.$item->image) }}" width="100" height="100">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    @if($item->is_active)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>
                                <td>
                                    @if($item->time_slot)
                                        {{ \Carbon\Carbon::parse($item->time_slot)->format('H:i') }} <!-- Displaying Time Slot -->
                                    @else
                                        No Time Slot
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('catergories/'.$item->id.'/edit')}}" class="btn btn-success mx-2">Edit</a>
                                    <a href="{{url('catergories/'.$item->id.'/delete')}}" class="btn btn-danger mx-1" onclick="return confirm('Are you Sure ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
