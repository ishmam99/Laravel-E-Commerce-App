@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <p classs="text-center"></p>

                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fas fa-user" style="font-size:100px;"></i><br><br>{{Auth::user()->name}} </h5>
                    
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{route('password.change')}}">Change Password</a></li>
                    <li class="list-group-item">Line 1</li>
                    <li class="list-group-item">Line 2</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
