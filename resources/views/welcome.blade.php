@extends('layouts.core')

@section('page-title')
    @lang('cosst.welcome_title')
@endsection

@section('main-content')
    <div class="row px-3 py-3">
        <div class="col-md-12 d-flex align-items-center p-3 text-white-50 rounded shadow-sm" style="background-color: #b2b5b7">
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
    </div>
    <div class="row px-3 m-2 p-3 bg-white rounded">
        <div class="col-md-5">
            <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.announcements')</h6>
            @foreach($announcements as $announcement)
                <div class="media text-muted pt-3">
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
        <div class="col-md-5">
            <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.popularknowledgebasearticles')</h6>
            @foreach($knowledgebaseArticles as $article)
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $article->title }}</strong>
                        <span class="d-block">
                        <small>
                            {{ $article->categoryData->name }}
                        </small>
                    </span><br>
                        {!! html_entity_decode($article->article) !!}
                    </p>
                </div>
            @endforeach
            <small class="d-block text-right mt-3">
                <a href="{{ route('knowledgebase') }}">@lang('cosst.see_more')</a>
            </small>
        </div>
        <div class="col-md-2">
            <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.login')</h6>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-gray">
                    <form style="width: 100%;" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">@lang('cosst.emailaddress')</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('cosst.password')</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember"{{ old('remember') ? ' checked' : '' }}>
                            <label class="form-check-label" for="remember">@lang('cosst.rememberme')</label>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">@lang('cosst.login')</button>
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
@endsection
