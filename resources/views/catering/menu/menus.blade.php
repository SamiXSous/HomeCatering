@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm">

    </div>
    @foreach ($menuDates as $menuDate)
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$menuDate->DayOfTheWeek}}</h5>
                <button class="btn btn-primary"
                    onclick="window.location='/mycatering/{{$catering->id}}/menu/{{$menuDate->id}}'">Edit</button>
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-sm">

    </div>
</div>


@endsection