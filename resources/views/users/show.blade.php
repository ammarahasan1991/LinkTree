@extends('layouts.app')

@section('content')
<div style="background-color: {{ $user->background_color}};">
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                @foreach ($user->links as $link)
                <div class="link">
                    <a href="{{ $link->link }}" class="user-link d-block p-4 mb-4 rounded h3 text-center"
                        data-link-id="{{ $link->id }}" target="_blank" rel="nofollow"
                        style="border: 2px solid {{ $user->text_color }}; color:{{ $user->text_color }}; text-decoration:none;">
                        {{ $link->name }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection