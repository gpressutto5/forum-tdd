<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="{{ $reply->owner->profile }}">
                    {{ $reply->owner->name }}
                </a> replied {{ $reply->created_at->diffForHumans() }}
            </h5>

            <div>
                {!! Form::open(['url' => '/replies/'. $reply->id .'/favorites', 'method' => 'POST']) !!}
                    <!--- Favorite Field --->
                    {!! Form::button($reply->favorites()->count().' '.str_plural('favorite', $reply->favorites()->count()), [
                        'class' => 'btn btn-default',
                        'type' => 'submit',
                    ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>
