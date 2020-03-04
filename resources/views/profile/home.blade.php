@extends('layouts.profile')

@section('title') Profile @endsection

@section('content')
    <div class="col-sm-12 mt-4 mb-4 text-center">
        <button class="btn btn-primary m-3" data-toggle="modal" data-target="#addPost">Add post</button>
    </div>
    @foreach($posts as $post)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4 mb-4">
            <div class="card card-inverse card-info">
                <h3 class="card-title text-center mt-2">{{ $post->user->id === Auth::id() ? 'Me' : $post->user->name }}</h3>
                <img class="card-img-top" src="https://keepitlocalcc.com/wp-content/uploads/2019/11/placeholder.png">
                <div class="card-block">
                    <h4 class="card-title">{{ \Illuminate\Support\Str::limit($post->title, 15, $end='...') }}</h4>
                    <div class="card-text">
                        {{ \Illuminate\Support\Str::limit($post->content, 20, $end='...') }}
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small>{{ $post->created_at }}</small>
                    <button class="btn btn-info btn-sm">
                        <a class="white-no-decoration" href="{{ route('post.show', $post->id) }}">More</a>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-sm-12 mt-4 mb-4">
        {{ $posts->links() }}
    </div>
@endsection
