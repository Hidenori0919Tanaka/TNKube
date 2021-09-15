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
                                <h5 class="card-titled">{{ $item->snippet->title_50 }}</h5>
                            </div>
                            <div class="card-footer text-muted">
                                公開日 {{ date('Y年n月j日', strtotime($item->snippet->publishTime)) }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

