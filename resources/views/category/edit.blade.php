@extends('Layout')
@section('title','category')
@section('content')


    <x-slot name="title">
        Edit
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Categories
                            <a href="{{ url('catergories') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('catergories/'.$category->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" accept="image/*">
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="is_active">Is Active</label>
                                <input type="checkbox" id="is_active" name="is_active" {{ $category->is_active ? 'checked' : '' }} />
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="time_slot">Select Time Slot</label>
                                <select name="time_slot" class="form-control" required>
                                    <option value="">Select Time Slot</option>
                                    @for($hour = 0; $hour < 24; $hour++)
                                        <option value="{{ sprintf('%02d:00:00', $hour) }}" {{ $category->time_slot === sprintf('%02d:00:00', $hour) ? 'selected' : '' }}>
                                            {{ sprintf('%02d:00', $hour) }} - {{ sprintf('%02d:59', $hour) }}
                                        </option>
                                    @endfor
                                </select>
                                @error('time_slot')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
