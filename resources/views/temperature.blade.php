@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$city_name}} ( {{$country_name}} )</span>

                    <a style="float: right" href="{{route('home')}}">go back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                       <div class="alert alert-warning" role="alert">
                           {{Session::get('error')}}
                       </div>
                    @endif

                    <img src="{{$icon}}" class="img-responsive">
                    {{$weather_condition}}<br>
                    Tempreture : {{$tempreture['the_temp']}}<br>
                    Min Tempreture : {{$tempreture['min']}}<br>
                    Max Tempreture : {{$tempreture['max']}}<br>
                    Applicable Date : {{$applicable_date}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
