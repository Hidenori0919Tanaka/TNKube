@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($videoLists->items as $key => $item)
            <div class="col-4">
                    <div class="card mb-4">
                        {{-- <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt=""> --}}
                        <div class="card-body">
                            <h5 class="card-titled">{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}</h5>
                            <p>desc</p>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ route('regch.store', $item->id->videoId) }}" class="btn btn-primary btn-lg">登録</a>
                        </div>
                    </div>
            </div>
            @endforeach
            <a href="{{ route('regch.index') }}" class="btn btn-primary btn-lg">登録チャンネル一覧へ戻る</a>
        </div>
    </div>
@endsection
