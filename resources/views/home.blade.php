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
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-2 logo">
                            <img src="https://static.thuisbezorgd.nl/images/restaurants/nl/NNP11OQ/logo_465x320.png" class="card-img-top">
                        </div>

                        <div class="col-md-10 info">
                            <div class="name">
                                Real Sonny's Kitchen
                            </div>

                            <div class="description">
                                A Real Antillean Chef
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
        </div>
    </div>
</div>
@endsection