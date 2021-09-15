@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="col-4">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('registerchannel.create') }}">
            @csrf
            <input class="form-control mr-sm-2" type="search" name="search_ch_query" id="input-Chtext"  placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="serch-ChBtn">チャンネル検索</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        @if(!is_null($regsterList))
        @foreach($regsterList as $ch)
        <div class="col-4">
            <div class="card mb-4">
                <a href="{{ route('registerchannel.show', $ch->channel_id) }}">
                    <img src="{{ $ch->thumbnail }}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-titled">{{ $ch->title_50 }}</h5>
                        <p>{{ $ch->description_50 }}</p>
                    </div>
                </a>
                <div class="card-footer text-muted">
                    <a href="{{ route('top.result_channel', $ch->channel_id) }}" class="btn btn-primary btn-lg">チャンネル動画一覧</a>
                </div>
            </div>
        </div>
    @endforeach
        @endif
    </div>
</div>
@endsection
