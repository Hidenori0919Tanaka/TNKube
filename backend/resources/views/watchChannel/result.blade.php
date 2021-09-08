@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                @foreach($videoLists->items as $key => $item)
                    <div class="row mb-3">
                        <a href="{{ route('watchchannel.watch', $item->id->videoId) }}" style="display: contents">
                            <div class="col-4">
                                <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8">
                                <h5>{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 150, $end = ' ...') }}</h5>
                                <p class="text-muted">公開日
                                     {{ date('d M Y', strtotime($item->snippet->publishTime)) }}</p>
                                <p>{{ \Illuminate\Support\Str::limit($item->snippet->description, $limit = 300, $end = ' ...') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <a href="{{ route('registerchannel.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
            </div>
        </div>
    </div>
@endsection
