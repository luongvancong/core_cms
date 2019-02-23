@extends('admin/layouts/master')

@section('main-content')
    <div class="panel">
        <div class="panel-body">
            <form method="post" class="form form-horizontal">
                {!! implode('', $content) !!}
                <button type="submit">Submit</button>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@stop