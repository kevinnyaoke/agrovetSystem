@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>My purchase history</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
            
                
                    @include('includes.message')

                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                           
                                <th>Client</th>
                                <th>Contact</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($orders as $orders)
                            <tr>
                                
                                <td>{{$orders->client}}</td>
                                <td>{{$orders->contact}}</td>
                                <td>{{$orders->item}}</td>
                                <td>{{$orders->quantity}}</td>
                                <td>{{$orders->description}}</td>
                                <th><a class="btn btn-info" href="{{route('editorder',['id'=>$orders->id])}}">Edit purchase</a></th>
                                <td><a class="btn btn-danger" href="{{route('delorder',['id'=>$orders->id])}}">Remove</a></td>
<!-- 
                                href="{{route('delorder',['id'=>$orders->id])}}">Remove</a></td> -->



                            </tr>
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection