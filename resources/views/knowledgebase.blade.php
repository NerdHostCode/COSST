@extends('layouts.core')

@section('page-title')
    @lang('cosst.knowledgebase')
@endsection

@section('main-content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.knowledgebase')</h6>
        <div class="text-center">
            <form class="form-inline">
                <div class="input-group mb-3 my-3" style="width: 100%;">
                    <input type="text" class="form-control" placeholder="@lang('cosst.kbsearchplaceholder')">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">@lang('cosst.search')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.populararticles')</h6>
        @foreach($knowledgebaseArticles as $article)
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark" style="font-size: 1.5em;">{{ $article->title }}</strong>
                <span class="d-block">
                    <small>
                        {{ $article->categoryData->name }}
                    </small>
                </span><br>
                    {{ $article->article }}
                </p>
            </div>
        @endforeach
        <small class="d-block text-right mt-3">

        </small>
    </div>
@endsection
