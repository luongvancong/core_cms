@extends('frontend/default')

@section('content')
<div class="wrapper-content gray-bg">
    <div class="container">
        <div class="content-inner" style="padding: 50px 0;">
            <div class="title">
                <h1>{{ $page->getTitle() }}</h1>
            </div>
            {!! $page->getContent() !!}
        </div>
    </div>
</div>