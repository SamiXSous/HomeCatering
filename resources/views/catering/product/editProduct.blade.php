@extends('layouts.app')

@section('content')
<div class="container addProduct">
    <a href="{{ route('menu', ['cateringId' => $cateringId, 'menuDateId' => $menuId]) }}"
        class="btn btn-primary back-btn">Back</a>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <form autocomplete="off" action="{{ route('editProduct', ['cateringId' => $cateringId ]) }}"
                        method="POST"
                        {{-- action="{{ route('openOrClosedMenu', ['cateringId' => $catering->id, 'menuId' => $menuDate->id ]) }}"
                        --}}>
                        @csrf
                        <h5>Edit Existing Product</h5>

                        {{-- <input type="hidden" name="cateringId" value="{{$catering->id}}"> --}}
                        {{-- <input type="hidden" name="DayOfTheWeekId" value="{{$menuDate->id}}"> --}}


                        <div class="hiddenForm">
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        placeholder="{{$product->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="textarea" class="form-control"
                                        placeholder="{{$product->description}}" name="description" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price"
                                        placeholder="{{$product->price}}" required>
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
                            <input type="hidden" name="productId" value="{{$product->id}}">


                        </div>
                        <button class="btn btn-primary btm-btn">Save</button>
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