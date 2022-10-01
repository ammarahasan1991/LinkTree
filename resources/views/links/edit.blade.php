@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">
                    Editing Link
                </h2>
                <form action="{{ route('links.update', $link->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Link Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control{{ $errors->first('name') ? ' is-invalid': '' }}"
                                    placeholder="My Youtube Channel Link" value="{{ $link->name }}" required>
                                @if ($errors->first('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="link">Link URL</label>
                                <input type="text" id="link" name="link"
                                    class="form-control{{ $errors->first('link') ? ' is-invalid': '' }}"
                                    placeholder="https://youtube.com/user/ayour-channel" value="{{ $link->link }}"
                                    required>
                                @if ($errors->first('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Updaye Link</button>
                            <button type="submit" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('delete-form').submit()">Delete
                                Link</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('links.destroy', $link->id) }}" method="post" id="delete-form">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection