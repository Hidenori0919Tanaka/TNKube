@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @if(!is_null($channelViewList))
            @foreach($channelViewList->items as $key => $item)
            <div class="col-4">
                    <div class="card mb-4">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-titled">{{ $item->snippet->title_50 }}</h5>
                            <p>{{ $item->snippet->description_50 }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            @if($item->regFlag)
                            <a href="{{ route('top.result_channel', $item->id->channelId) }}" class="btn btn-primary">チャンネル動画一覧</a>
                            <a href="{{ route('registerchannel.show', $item->id->channelId) }}" class="btn btn-primary">詳細</a>
                            @else
                            <form class="form-inline" method="POST" action="{{ route('registerchannel.store') }}">
                                @csrf
                                <input class="form-control mr-sm-2" type="hidden" name="channelId" value="{{ $item->id->channelId }}">
                                <button class="btn btn-primary btn-lg" type="submit">登録</button>
                            </form>
                            @endif
                        </div>
                    </div>
            </div>
            @endforeach
            @endif
        </div>
        <a href="{{ route('registerchannel.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
    </div>
@endsection

