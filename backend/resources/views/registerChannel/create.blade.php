@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @if(!is_null($channelLists))
            @foreach($channelLists->items as $key => $item)
            <div class="col-4">
                    <div class="card mb-4">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit($item->snippet->description, $limit = 50, $end = ' ...') }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <form class="form-inline" method="POST" action="{{ route('registerchannel.store') }}">
                                @csrf
                                <input class="form-control mr-sm-2" type="hidden" name="channelId" value="{{ $item->id->channelId }}">
                                <button class="btn btn-primary btn-lg" type="submit">登録</button>
                            </form>
                        </div>
                    </div>
            </div>
            @endforeach
            @endif
            <a href="{{ route('registerchannel.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
        </div>
    </div>
@endsection

