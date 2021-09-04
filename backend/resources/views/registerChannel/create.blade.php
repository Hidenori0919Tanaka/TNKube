@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @if(!is_null($regsterList))
            @foreach($channelLists->items as $key => $item)
            <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                            <p>desc</p>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ route('regch.store', $item->id->channelId) }}" class="btn btn-primary btn-lg">登録</a>
                        </div>
                    </div>
            </div>
            @endforeach
            @endif
            <a href="{{ route('regch.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
        </div>
    </div>
@endsection
