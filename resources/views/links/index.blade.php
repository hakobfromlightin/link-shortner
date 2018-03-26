@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" id="link" placeholder="Paste a link to shorten it" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success btn-lg" id="shorten-link" type="button">Shorten</button>
                </div>
            </div>
        </div>

        <h2>All shortned links</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Original</th>
                    <th>Shortened</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr data-id="{{ $link->id }}">
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->original }}</td>
                        <td>{{ $link->shortened }}</td>
                        <td>{{ $link->created_at->diffForHumans() }}</td>
                        <td><button type="button" class="btn btn-danger btn-sm link-delete">Remove</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection