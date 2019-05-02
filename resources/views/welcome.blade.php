@extends('layouts.core')

@section('page-title')
    @lang('cosst.welcome_title')
@endsection

@section('main-content')
    <div class="d-flex align-items-center p-3 my-3 text-white-50 rounded shadow-sm" style="background-color: #b2b5b7">
        @if(\Auth::check())
            <img class="mr-3" src="https://www.gravatar.com/avatar/{{ md5(strtolower(\Auth::user()->email)) }}" alt="" width="48" height="48">
        @endif
        <div class="lh-100">
            @if(\Auth::check())
                <h6 class="mb-0 text-white lh-100">
                    @lang('cosst.welcome'), {{ \Auth::user()->name }}!
                </h6>
                <small><a href="#">@lang('cosst.viewprofilelink')</a></small>
            @else
                <h4 class="mb-0 text-white lh-100">
                    @lang('cosst.welcometo') {{ \App\Configuration::get('CompanyName') }}
                </h4>
            @endif
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.announcements')</h6>
            @foreach($announcements as $announcement)
                <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $announcement->title }}</strong>
                        {!! html_entity_decode($announcement->article) !!}
                    </p>
                </div>
            @endforeach
        <small class="d-block text-right mt-3">
            <a href="{{ route('announcements') }}">@lang('cosst.see_more')</a>
        </small>
    </div>
@endsection
