@extends('admin/layouts/master')

@section('main-content')
    <div class="panel">
        <div class="panel-body">
            <form method="post" class="form form-horizontal">
                {!! implode('', $content) !!}
                <div class="col-sm-3 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@stop