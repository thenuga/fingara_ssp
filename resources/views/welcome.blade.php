@extends('layout')
@section('title', 'Home Page')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-image: url('https://tse2.mm.bing.net/th?id=OIP.48MZ3Hs-Q9SB5K0M2AdEkgHaEo&pid=Api&P=0&h=220'); background-size: cover;">
        <div class="card text-center" style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="card-body">
                <h4 style="font-size: 10rem;">Welcome</h4>
                <a href="http://127.0.0.1:8000/catergories" class="btn btn-primary mt-3">Go to Admin Dash-Board</a>
            </div>
        </div>
    </div>
@endsection
