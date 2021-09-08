@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
        @if(!is_null($detailModel))
        @foreach($detailModel as $ch)
        <div class="col-4">
            <div class="card mb-4">
                <img src="{{ $ch->thumbnail }}" class="img-fluid" alt="">
                <div class="card-body">
                    <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($ch->title, $limit = 50, $end = ' ...') }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($ch->description, $limit = 50, $end = ' ...') }}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('registerchannel.destroy', $ch->channel_Id) }}" class="btn btn-primary btn-lg">削除</a>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('watchchannel.index', $ch->channel_Id) }}" class="btn btn-primary btn-lg">チャンネル動画一覧</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection
