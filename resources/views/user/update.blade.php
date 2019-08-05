@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Agrovet Updates</h2></div>

                <div class="card-body">
{{$update->links()}}

                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th></th>
                                <th>Updates</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($update as $update)
                            <tr>
                                <td>{{$update->date}}</td>
                                <td></td>
                                <td>{{$update->updates}}</td>
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