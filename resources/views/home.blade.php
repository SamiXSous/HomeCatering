@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">

                <div class="card-body">
                    Filters
                </div>
            </div>
        </div>
        <div class="col-md-9 caterings">

            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search Catering"
                    aria-label="Search">
                <div class="input-group-append">
                    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                            aria-hidden="true"></i></span>
                </div>

            </div>
            @foreach ($caterings as $catering)
            <div class="card catering" onclick="window.location='/catering/{{$catering->id}}/menu/'">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- @dump($catering) --}}
                    <div class="row">
                        <div class="col-md-2 logo">
                            @if ($catering->image == null)
                            <img src="https://static.thuisbezorgd.nl/images/restaurants/nl/O713/logo_465x320.png"
                                class="card-img-top">
                            @else
                            <img src="uploads/catering/{{$catering->image}}" class="card-img-top">
                            @endif

                        </div>

                        <div class="col-md-10 info">
                            <div class="name">
                                {{-- Real Sonny's Kitchen --}}
                                {{$catering->name}}
                            </div>

                            <div class="description">
                                {{-- A Real Antillean Chef --}}
                                {{$catering->description}}
                            </div>

                            <div class="graphics">
                                <div class="row">
                                    <div class="graphic">
                                        <i class="fal fa-door-open"></i>
                                        <a>Open</a>
                                    </div>
                                    <div class="graphic">
                                        <i class="fal fa-bicycle"></i>
                                        <a>$3.50</a>
                                    </div>
                                    <div class="graphic">
                                        <i class="fal fa-soup"></i>
                                        <a>4 Available</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection