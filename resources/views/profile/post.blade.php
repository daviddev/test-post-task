@extends('layouts.profile')

@section('title') {{ $post->title }} @endsection

@section('content')
    <div class="col-md-12 blogShort">
        @if ($post->user_id === Auth::id())
            <form action="{{ route('post.destroy', $post->id) }}" method="post" class="text-right">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        @endif
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->user->id === Auth::id() ? 'Me' : $post->user->name }}</h2>
        <img src="https://keepitlocalcc.com/wp-content/uploads/2019/11/placeholder.png" alt="{{ $post->title }}" class="pull-left img-responsive postImg img-thumbnail margin10">
        <article>
            <p>{{ $post->content }}</p>
            <small>{{ $post->created_at }}</small>
        </article>
    </div>

    <div class="col-md-12 mt-5 mb-5">
        @if(count($post->comments) > 0)
            <h1>Comments</h1>
            <div class="qa-message-list" id="wallmessages">
                @foreach($post->comments as $comment)
                    <div class="message-item" id="m16">
                        <div class="message-inner">
                            <div class="message-head clearfix">
                                <div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
                                <div class="user-detail">
                                    <h5 class="handle">{{ $comment->user->id === Auth::id() ? 'Me' : $comment->user->name }}</h5>
                                    <div class="post-meta">
                                        <div class="asker-meta">
                                            <span class="qa-message-what"></span>
                                            <span class="qa-message-when">
                                                <span class="qa-message-when-data">{{ $comment->created_at }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="qa-message-content">
                                {{ $comment->text }}
                            </div>
                        </div></div>
                @endforeach
            </div>
        @else
            <h1>No comments</h1>
        @endif
        <form action="{{ route('comment.store') }}" method="post" class="mt-5">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                @if($errors->has('text'))
                    <small class="has-error">{{ $errors->first('text') }}</small>
                @endif
                <textarea class="form-control" name="text" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success float-right">Add comment</button>
            </div>
        </form>
    </div>
@endsection
