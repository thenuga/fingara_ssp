@extends('Layout')
@section('title','category')
@section('content')


    <x-slot name="title">
        Create
    </x-slot>
    <div class="container mt-5">
        <div class = "row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                    <h4>Categories
                        <a href="{{url('catergories')}}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('catergories/create')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{old('discription')}}></textarea>
                            @error('description')<span class="text-danger">{{$message}}</span>@enderror

                        </div>
                        <div class="mb-3">
                            <label for="is_active">Is Active</label>
                            <input type="checkbox" id="is_active" name="is_active" {{ old('is_active') ? 'checked' : '' }} />
                            @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <button type="Submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
