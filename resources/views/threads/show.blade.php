@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $thread->title }}</div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>

                    <div class="panel-footer">
                        <a href="#">
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
                            <a href="#">
                                {{ $reply->owner->name }}
                            </a> replied {{ $reply->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if (auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Test
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
