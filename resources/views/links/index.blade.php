@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">
                        Your Links
                    </h2>
                    <table class="table table-straped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <td>Url</td>
                                <th>Visits</th>
                                <th>Last Visit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td>{{ $link->name }}</td>
                                    <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                    <td>0</td>
                                    <td>Aug 3, 2020 - 1230 pm</td>
                                    <td><a href="{{ route('links.edit',  $link->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('links.create')}} " class="btn btn-primary">Add Link</a>
                </div>
            </div>
        </div>
    </div>
@endsection