<a href="/threads/{{ $thread->channel->slug }}">
    <span class="label label-success pull-right" style="
            background-color: {{ $thread->channel->color }};
            color: {{ $thread->channel->textColor }};
            ">{{ $thread->channel->name }}</span>
</a>