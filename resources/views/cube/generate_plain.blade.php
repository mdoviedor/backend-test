@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tests
            <small>New</small>
        </h3>
        <a class="btn btn-primary btn-lg" href="{{ route('cube.list') }}">
            Inicio
        </a>

        <hr>

        {!! Form::open(['method' => 'POST', 'route' => 'cube.generate_plain.execute']) !!}

        {!! Field::textarea('cases') !!}

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-default">
                    @lang('validation.attributes.generate')
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection