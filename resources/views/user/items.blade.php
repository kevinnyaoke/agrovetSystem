@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Available items</h2>
                </div>


                <div class="card-body">
                {{ $stock->links() }}

                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                             
                                <th>Item</th>
                                <th>Price per item</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($stock as $stock)
                            <tr>    
                                <td>{{$stock->item}}</td>
                                <td>{{$stock->sprice}}</td>
                                <th></th>
                            </tr>
                            @endforeach
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection