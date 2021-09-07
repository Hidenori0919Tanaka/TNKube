@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-4">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('registerchannel.create') }}">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search_ch_query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">チャンネル検索</button>
            </form>
        </div>
        @if(!is_null($regsterList))
        @foreach($regsterList as $ch)
        <p>{{$ch->detail_channels}}</p>
        <div class="col-4">
            <a href="{{ route('registerchannel.show', $ch->detail_channel->channelId) }}">
                <div class="card mb-4">
                    <div class="card-body">
                        {{-- <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($ch->detail_channels_id->title, $limit = 50, $end = ' ...') }}</h5> --}}
                        <p>desc</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{-- <a href="{{ route('watch.index', $ch->detail_channels_id->channelId) }}" class="btn btn-primary btn-lg">チャンネル動画一覧</a> --}}
                    </div>
                </div>
            {{-- </a> --}}
        </div>
    @endforeach
        @endif
    </div>
</div>
@endsection
