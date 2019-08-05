@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Updates.</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                   <h4> Update a status to clients.</h4>

                    @include('includes.message')

                    <form role="form" method="POST" action="{{route('updateup')}}">
                        @csrf

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="select date" value="{{$update->date}}">
                        </div>

                        <div class="form-group">
                            <label for="update">Update:</label>
                            <textarea class="form-control" rows="5" id="updates" name="updates"
                                placeholder="update status" value="">{{$update->updates}}</textarea>
                        </div>

                        <input type="text" id="id" name="id" value="{{$update->id}}" hidden>

                        <button type="submit" class="btn btn-info">Send Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection