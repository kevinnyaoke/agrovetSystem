@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Agrovet Updates</h2>
                </div>

                <div class="card-body">

                {{$update->links()}}
                  @include('includes.message')
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Updates</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($update as $update)
                            <tr>
                                <td>{{$update->date}}</td>
                                <td>{{$update->updates}}</td>
                                <td><a class="btn btn-info" href="{{route('editupdate',['id'=>$update->id])}}">Edit</a></td>
                                <td><a class="btn btn-danger" href="{{route('delupdate',['id'=>$update->id])}}">Delete</a></td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection