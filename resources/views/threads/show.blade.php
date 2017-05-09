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
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $reply->owner->name }}
                        </div>

                        <div class="panel-body">
                            {{ $reply->body }}
                        </div>

                        <div class="panel-footer">
                            {{ $reply->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
