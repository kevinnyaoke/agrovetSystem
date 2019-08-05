@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Make purchase</h2>

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div>
                        <h4>Fill form to make purchase</h4>
                    </div>


                    @include('includes.message')

                    <form role="form" method="POST" action="{{route('purchase')}}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="client">Client Name:</label>
                            <input type="text" class="form-control" id="client" name="client" placeholder="client name" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="number" class="form-control" id="contact" name="contact" placeholder="contact"
                                min="0" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label for="item">Item:</label>
                            <input type="text" class="form-control" id="item" name="item" placeholder="item">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="quantity" min="1" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="5" id="description" name="description"
                                placeholder="write the description of the item"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection