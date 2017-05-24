@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $thread->title }}
                        @include('helpers.channel_badge')
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>

                    <div class="panel-footer">
                        <a href="/threads?by={{ $thread->creator->name }}">
                            {{ $thread->creator->name }}
                        </a> posted {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $reply->body }}
                        </div>

                        <div class="panel-footer">
                            <a href="/threads?by={{ $reply->owner->name }}">
                                {{ $reply->owner->name }}
                            </a> replied {{ $reply->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>
@endsection
