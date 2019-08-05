@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Available stock</h2>
                </div>

                <div class="card-body">
                 {{ $stock->links() }}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @include('includes.message')
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>

                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Buying price per Item</th>
                                <th>Selling Price per item</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($stock as $stock)
                            <tr>

                                <td>{{$stock->item}}</td>
                                <td>{{$stock->quantity}}</td>
                                <td>{{$stock->bprice}}</td>
                                <td>{{$stock->sprice}}</td>
                                <td>{{$stock->date}}</td>
                                <td>{{$stock->description}}</td>
                                <td><a class="btn btn-primary" href="{{route('editstock',['id'=>$stock->id])}}">Edit</a>
                                </td>
                                <td><a class="btn btn-danger" href="{{route('delstock',['id'=>$stock->id])}}">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection