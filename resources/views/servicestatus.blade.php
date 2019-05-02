@extends('layouts.core')

@section('page-title')
    @lang('cosst.service_status')
@endsection

@section('main-content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">@lang('cosst.service_status')</h6>
            <div class="table-responsive">
                <table class="table text-center" style="margin-top: 10px;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Server</th>
                            <th>HTTP</th>
                            <th>FTP</th>
                            <th>SMTP</th>
                            <th>IMAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servers as $server)
                            <tr>
                                <td>{{ $server->name }}</td>
                                <td>
                                    @if(\App\COSST::portCheck($server->hostname, $server->services->http))
                                        <i class="fas fa-check-circle" style="color:green;"></i>
                                    @else
                                        <i class="fas fa-check-circle" style="color:red;"></i>
                                    @endif
                                </td>
                                <td>
                                    @if(\App\COSST::portCheck($server->hostname, $server->services->ftp))
                                        <i class="fas fa-check-circle" style="color:green;"></i>
                                    @else
                                        <i class="fas fa-check-circle" style="color:red;"></i>
                                    @endif
                                </td>
                                <td>
                                    @if(\App\COSST::portCheck($server->hostname, $server->services->smtp))
                                        <i class="fas fa-check-circle" style="color:green;"></i>
                                    @else
                                        <i class="fas fa-check-circle" style="color:red;"></i>
                                    @endif
                                </td>
                                <td>
                                    @if(\App\COSST::portCheck($server->hostname, $server->services->imap))
                                        <i class="fas fa-check-circle" style="color:green;"></i>
                                    @else
                                        <i class="fas fa-check-circle" style="color:red;"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <small class="d-block text-right mt-3">
            {{ $servers->links() }}
        </small>
    </div>
@endsection

@section('js-footer')
    <script src="{{ asset('js/servicestatus.js') }}"></script>
@endsection
