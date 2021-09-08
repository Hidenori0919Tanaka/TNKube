@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card mb-4" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/{{ $singleVideo->items[0]->id }}" width="560" height="600" frameborder="0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5>{{ $singleVideo->items[0]->snippet->title }}</h5>
                        <p class="text-secondary">公開日
                             {{ date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt)) }}</p>
                        <p>{{ $singleVideo->items[0]->snippet->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container">
                    <div class="row">
                        @foreach($videoLists->items as $key => $item)
                            <div class="col-12">
                                <a href="{{ route('top.watch', $item->id->videoId) }}">
                                    <div class="card mb-4">
                                        <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="">
                                        <div class="card-body">
                                            <h5>{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
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
            </div>
        </div>
        <a href="{{ route('watchchannel.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
    </div>
@endsection
