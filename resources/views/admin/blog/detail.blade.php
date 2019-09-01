@extends('admin.layout.masterpage')

@section('css')
    <style>
    .mg-15{
        margin-left: 15%;
    }
    </style>
@endsection

@section('title')
    Chi tiết bài đăng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-body">{{$post->title}}</h3>
            <p class="text-body"><span>Tác giả: </span>{{$post->author}}</p>
        </div>
        <div class="card-body">
            <div>
                @if ($post->image)
                    <img class="mg-15" width="70%" src="upload/images/{{$post->image}}" alt="">
                @else
                    @if ($post->image_link)
                        <img class="mg-15" width="70%" src="{{$post->image_link}}" alt="">
                    @endif
                @endif
            </div>
            <hr>
            <div>
                <p class="text-body">{!!$post->description!!}</p>
            </div>
        </div>
    </div>
@endsection