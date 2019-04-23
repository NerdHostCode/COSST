@extends('layouts.core')

@section('page-title')
    {{ $announcement->title }}
@endsection

@section('main-content')
        <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.announcements')</h6>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">{{ $announcement->title }}</strong>
                    {!! html_entity_decode($announcement->article) !!}
                </p>
            </div>

            @if($last->status && $next->status)
                <small class="d-block mt-3">
                    <a href="{{ route('announcements') }}/{{ $last->id }}">&laquo; {{ substr($last->title, 0, 50) }}</a>
                    <a href="{{ route('announcements') }}/{{ $next->id }}" style="float: right;">{{ substr($next->title, 0, 50) }} &raquo;</a>
                </small>
            @elseif($last->status && !$next->status)
                <small class="d-block mt-3">
                    <a href="{{ route('announcements') }}/{{ $last->id }}">&laquo; {{ substr($last->title, 0, 50) }}</a>
                </small>
            @endif
            @if(!$last->status && $next->status)
                <small class="d-block text-right mt-3">
                    <a href="{{ route('announcements') }}/{{ $next->id }}">{{ substr($next->title, 0, 50) }} &raquo;</a>
                </small>
            @endif
    </div>
@endsection
