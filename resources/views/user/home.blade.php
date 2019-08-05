@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add your profile pic to complete Registration</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <form action="{{route('loadpic')}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('includes.message')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name', auth()->user()->name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="{{ old('email', auth()->user()->email) }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Upload
                                Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo">
                                @if (auth()->user()->image)
                                <code>{{ auth()->user()->image }}</code>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update Photo</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection