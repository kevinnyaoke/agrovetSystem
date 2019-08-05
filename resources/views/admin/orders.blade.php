@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Orders</h2>
                </div>

                <div class="card-body">
                {{ $orders->links() }}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h3>Available Orders</h3>
                    @include('includes.message')
     
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Client</th>
                                <th>Contact</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($orders as $orders)
                            <tr>
                                <!-- <td>{{$orders->id}}</td> -->
                                <td>{{$orders->client}}</td>
                                <td>{{$orders->contact}}</td>
                                <td>{{$orders->item}}</td>
                                <td>{{$orders->quantity}}</td>
                                <td>{{$orders->description}}</td>
                                <th></th>
                                <td><a class="btn btn-danger"
                                        href="{{route('delorder',['id'=>$orders->id])}}">Remove</a></td>


                            </tr>
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection