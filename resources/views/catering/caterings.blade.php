@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center">

        <div class="col-md-8 caterings">
            @foreach ($caterings as $catering)

            <div href='/catering/edit/{{$catering->id}}' class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

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
                                {{$catering->name}}
                            </div>
                            <button onclick="window.location='/catering/edit/{{$catering->id}}'">Edit</button>
                            <button class="AddMenu" onclick="window.location='/mycatering/{{$catering->id}}/menus'">Add
                                Menu</button>
                            <div class="description">
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