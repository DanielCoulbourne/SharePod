@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-4 col-md-offset-4">
            <div class="panel-body text-center">
                <h2>{{ $show->title }}</h2>
                <div class="thumbnail">
                    <img src="{{ $show->artwork }}" />
                </div>
                <div class="links dropup">
                    <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Subscribe in your favorite app</button>
                    <ul class="btn-block dropdown-menu" aria-labelledby="dropdownMenu2">
                        @foreach ($show->apps as $app)
                            <li><a href="{{ $app->url }}">Open in {{ $app->title }}</a></li>
                        @endforeach
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
