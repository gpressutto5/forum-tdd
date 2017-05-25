@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $thread->title }}
                        @include('helpers.channel_badge')
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>

                    <div class="panel-footer">
                        <a href="{{ $thread->creator->profile }}">
                            {{ $thread->creator->name }}
                        </a> posted {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>

                @foreach($thread->replies as $reply)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $reply->body }}
                        </div>

                        <div class="panel-footer">
                            <a href="{{ $reply->owner->profile }}">
                                {{ $reply->owner->name }}
                            </a> replied {{ $reply->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach

                @if (auth()->check())
                    {!! Form::open(['route' => ['add_reply', $thread->channel->slug, $thread->id], 'method' => 'POST']) !!}
                        <!--- Body Field --->
                        <div class="form-group">
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Have something to say?', 'rows' => 5]) !!}
                        </div>

                        <!--- Post Field --->
                        <div class="form-group">
                            {!! Form::submit('Post', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="{{ $thread->creator->profile }}">{{ $thread->creator->name }}</a> and currently has {{ $thread->replies()->count() }} replies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
