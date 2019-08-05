@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-4">


                    </div>
                    <h2>Welcome {{Auth::user()->name}}</h2>
                    @include('includes.message')
                </div>

                <div class="card-body">


                </div>
            </div>
        </div>
    </div>
</div>
@endsection