@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($videoLists->items as $key => $item)
                <div class="col-4">
                    <a href="{{ route('top.watch', $item->id->videoId) }}">
                        <div class="card mb-4">
                            <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                            <div class="card-body">
                                <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                            </div>
                            <div class="card-footer text-muted">
                                公開日 {{ date('d M Y', strtotime($item->snippet->publishTime)) }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
