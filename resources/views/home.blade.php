@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
                <div class="meesha1">
                    <div class="meesha">
                        <div class="title">Eagle Financial Services </div>
                        <a href="{{url('/customers')}}" >Customer</a>
                        <a href="{{url('/stocks')}}" >Stock</a>
                        <a href="{{url('/investments')}}" >Investment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        meesha {
            height: 100%;
        }
        .meesha {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        .meesha1{
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .meesha {
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 96px;
        }
    </style>
@endsection
