@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Stock</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h5>Edit stock details</h5>
                    @include('includes.message')


                    <form role="form" method="POST" action="{{route('updatestock')}}">



                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="item">Item:</label>
                            <input type="text" class="form-control" id="item" name="item" placeholder="item"
                                value="{{$stock->item}}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="quantity" min="1" oninput="validity.valid||(value='');"
                                value="{{$stock->quantity}}">

                        </div>
                        <div class="form-group">
                            <label for="bprice">Buying price each:</label>
                            <input type="number" class="form-control" id="bprice" name="bprice"
                                placeholder="buying price per item" min="1" oninput="validity.valid||(value='');"
                                value="{{$stock->bprice}}">
                        </div>
                        <div class="form-group">
                            <label for="sprice">Selling price each:</label>
                            <input type="number" class="form-control" id="sprice" name="sprice"
                                placeholder="selling price per item" min="1" oninput="validity.valid||(value='');"
                                value="{{$stock->sprice}}">
                        </div>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="select date"
                                value="{{$stock->date}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="5" id="description" name="description"
                                placeholder="Update description of the item" >{{$stock->description}}</textarea>
                        </div>

                        <input type="text" id="id" name="id" value="{{$stock->id}}" hidden>

                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection