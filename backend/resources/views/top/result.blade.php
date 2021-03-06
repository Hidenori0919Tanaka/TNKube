@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                @foreach($videoLists->items as $key => $item)
                    <div class="row mb-3">
                        <a href="{{ route('top.watch', $item->id->videoId) }}" style="display: contents">
                            <div class="col-4">
                                <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8">
                                <h5>{{ $item->snippet->title_150 }}</h5>
                                <p class="text-muted">公開日
                                     {{ date('Y年n月j日', strtotime($item->snippet->publishTime)) }}</p>
                                <p>{{ $item->snippet->description_300 }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
