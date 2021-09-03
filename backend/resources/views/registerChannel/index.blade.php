@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-4">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('top.result') }}">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">チャンネル検索</button>
            </form>
        </div>
        @foreach($videoLists->items as $key => $item)
            <div class="col-4">
                <a href="{{ route('regch.show', $item->id->videoId) }}">
                    <div class="card mb-4">
                        {{-- <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt=""> --}}
                        <div class="card-body">
                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                            <p>desc</p>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ route('watch.index', $item->id->videoId) }}" class="btn btn-primary btn-lg">動画一覧</a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
