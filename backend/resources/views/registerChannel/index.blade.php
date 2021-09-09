@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="col-4">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('registerchannel.create') }}">
            @csrf
            <input class="form-control mr-sm-2" type="search" name="search_ch_query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">チャンネル検索</button>
        </form>
    </div>
    <div class="row">
        @if(!is_null($regsterList))
        @foreach($regsterList as $ch)
        <div class="col-4">
            <div class="card mb-4">
                <a href="{{ route('registerchannel.show', $ch->channel_Id) }}">
                    <img src="{{ $ch->thumbnail }}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($ch->title, $limit = 50, $end = ' ...') }}</h5>
                        <p>{{ \Illuminate\Support\Str::limit($ch->description, $limit = 50, $end = ' ...') }}</p>
                    </div>
                </a>
                <div class="card-footer text-muted">
                    <a href="{{ route('watchchannel.index', $ch->channel_Id) }}" class="btn btn-primary btn-lg">チャンネル動画一覧</a>
                </div>
            </div>
        </div>
    @endforeach
        @endif
    </div>
</div>
@endsection
