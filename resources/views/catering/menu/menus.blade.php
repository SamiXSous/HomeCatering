@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('MyCatering') }}" class="btn btn-primary back-btn">Back</a>
    <div class="row">
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
    </div>
</div>


@endsection