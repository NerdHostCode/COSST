@extends('layouts.core')

@section('page-title')
    @lang('cosst.announcements')
@endsection

@section('main-content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.announcements')</h6>
        @foreach($announcements as $announcement)
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark" style="font-size: 1.5em;">{{ $announcement->title }}</strong>
                    {!! html_entity_decode($announcement->article) !!}
                </p>
            </div>
        @endforeach
        <small class="d-block text-right mt-3">
            {{ $announcements->links() }}
        </small>
    </div>
@endsection
