@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Stock</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h5>Enter stock details</h5>
                    @include('includes.message')


                    <form role="form" method="POST" action="{{route('addstock')}}">



                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="item">Item:</label>
                            <input type="text" class="form-control" id="item" name="item" placeholder="item">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="quantity" min="1" oninput="validity.valid||(value='');" >
                                
                        </div>
                        <div class="form-group">
                            <label for="bprice">Buying price each:</label>
                            <input type="number" class="form-control" id="bprice" name="bprice"
                                placeholder="buying price per item" min="1" oninput="validity.valid||(value='');" >
                        </div>
                        <div class="form-group">
                            <label for="sprice">Selling price each:</label>
                            <input type="number" class="form-control" id="sprice" name="sprice"
                                placeholder="selling price per item" min="1" oninput="validity.valid||(value='');" >
                        </div>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="select date">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="5" id="description" name="description"
                                placeholder="write the description of the item"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection