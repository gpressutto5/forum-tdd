@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">
                        @if (count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        @endif
                        {!! Form::open(['url' => '/threads', 'method' => 'POST']) !!}
                            <!--- Channel Field --->
                            <div class="form-group">
                                {!! Form::label('channel_id', 'Channel:') !!}
                                {!! Form::select('channel_id', $selectArray, null, [
                                    'class' => 'form-control',
                                    'placeholder'=> 'Chose one...',
                                    'required'
                                ])!!}
                            </div>

                            <!--- Title Field --->
                            <div class="form-group">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <!--- Body Field --->
                            <div class="form-group">
                                {!! Form::label('body', 'Body:') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
                            </div>
                            
                            <!--- Publish Field --->
                            <div class="form-group">
                                {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
