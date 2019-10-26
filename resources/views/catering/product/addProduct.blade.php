@extends('layouts.app')

@section('content')
<div class="container addProduct">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <form action="{{ route('addProduct', ['cateringId' => $cateringId ]) }}" method="POST"
                        {{-- action="{{ route('openOrClosedMenu', ['cateringId' => $catering->id, 'menuId' => $menuDate->id ]) }}"
                        --}}>
                        @csrf
                        <h5>Add New Product</h5>

                        {{-- <input type="hidden" name="cateringId" value="{{$catering->id}}"> --}}
                        {{-- <input type="hidden" name="DayOfTheWeekId" value="{{$menuDate->id}}"> --}}


                        <div class="hiddenForm">
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        placeholder="Food/Beverage Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="textarea" class="form-control"
                                        placeholder="Please describe the food that you are selling"
                                        name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" placeholder="$5.00">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" accept="image/x-png,image/gif,image/jpeg"
                                        class="form-control" name="image">
                                </div>
                            </div>
                            <input type="hidden" name="cateringId" value="{{$cateringId}}">


                        </div>
                        <button class="btn btn-primary btm-btn">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script src="{{ asset('js/addMenu.js') }}" defer></script> --}}
{{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
@endpush

@push('syles')
{{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
@endpush