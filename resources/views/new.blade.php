@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-body text-center">
                    <h2>Easy Podcast Subscribe Links</h2>
                    <form action="{{ route('index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="rss" placeholder="Podcast RSS Feed URL">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Generate Link</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div>
                <div class="panel-footer text-center">
                    Need an example? 
                    <a href="/?rss=http://fitsandstarts.fm/rss" class="btn btn-xs btn-info">Check out my show</a>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">What is this?</div>
                <div class="panel-body">
                    <p>Sharing podcasts is hard. There is no easy standardized way to generate subscribe links that target different apps on different platforms. This is an attempt to solve that. As of now I'm only generating "show" links, and only support a few apps, but I hope to add more apps and "episode" links soon.</p>

                    <h3 class="text-primary">Upcoming Features <small>Hopefully soon...</small></h3>
                    <ul>
                        <li>Episode links</li>
                        <li>Audio player for episodes</li>
                        <li>Accounts for show owners (with verification)</li>
                        <li>A small podcast directory of claimed shows.</li>
                        <li>Use Javascript to detect whether an App's URL scheme works, remove it from list if not.</li>
                    </ul>

                    <p>If you use this tool, find bugs, or want to suggest features, <a href="http://twitter.com/dcoulbourne">hit me up on twitter.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
