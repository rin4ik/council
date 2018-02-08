@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <a class="list-group-item caps" role="presentation" href="{{ route('admin.dashboard.index') }}">Dashboard</a> 
            
                    <a class="list-group-item caps" role="presentation" href="{{ route('admin.channels.index') }}">Channels</a></li>
               
            </div>

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @yield('administration-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection