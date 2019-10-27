@extends('layouts.app')

@section('content')
<ul class="nav justify-content-center nav-tabs dayOfTheWeekNav">
    @foreach ($menuDates as $item)
    @if ($item->id == $dayOfTheWeek)
    <li class="nav-item">
        <a class="nav-link active"
            href="{{ route('cateringMenuDay', ['id' => $cateringId, 'dayOfTheWeekId' => $item->id]) }}">{{$item->DayOfTheWeek}}</a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link"
            href="{{ route('cateringMenuDay', ['id' => $cateringId, 'dayOfTheWeekId' => $item->id]) }}">{{$item->DayOfTheWeek}}</a>
    </li>
    @endif
    @endforeach
</ul>
<div class="container displayMenu">

    <div class="col-md-12 products">
        @foreach ($products as $product)
        <div class="card product">
            <div class="card-body">
                <h3>{{$product->name}}</h3>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/addMenu.js') }}" defer></script>
{{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
@endpush

@push('syles')
{{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
@endpush