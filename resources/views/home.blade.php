@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Get City Weather</div>

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

                    <form method="post" action="{{route('get-temperature')}}" style="text-align: center;">
                        @csrf
                        <input type="text" name="city_name" placeholder="Enter city name" class="form-control @error('city_name') is-invalid @enderror" value="{{ old('city_name') }}">
                        @error('city_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br />
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
            @if (isset($data))
                <?php dd($data); ?>
            @endif
        </div>
    </div>
</div>
@endsection
