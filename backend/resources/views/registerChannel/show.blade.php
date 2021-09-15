@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ $detailModel->thumbnail }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="center-block">{{ $detailModel->title }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    {!! nl2br(e(str_replace('\n',"\n",$detailModel->description))) !!}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="text-muted">公開日{{ date('Y年n月j日', strtotime($detailModel->publishTime)) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('top.result_channel', $detailModel->channel_id) }}" class="btn btn-primary btn-lg">チャンネル動画一覧</a>
            </div>
            <div class="col-6">
                <a href="{{ route('registerchannel.destroy', $detailModel->channel_id) }}" class="btn btn-primary btn-lg">削除</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p> </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('registerchannel.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
            </div>
        </div>
    </div>
@endsection
