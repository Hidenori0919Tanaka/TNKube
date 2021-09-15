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
                        <h5>{{ $singleVideo->items[0]->snippet->title_150 }}</h5>
                        <p class="text-secondary">公開日
                             {{ date('Y年n月j日', strtotime($item->snippet->publishTime)) }}</p>
                        <p>{{ $singleVideo->items[0]->snippet->description_300 }}</p>
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
                                            <h5>{{ $item->snippet->title_50 }}</h5>
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
            </div>
        </div>
    </div>
@endsection
