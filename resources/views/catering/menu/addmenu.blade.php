@extends('layouts.app')

@section('content')
<div class="container addMenu">

    {{-- @dump($catering) --}}
    <a href="{{ route('menus', ['id' => $catering->id]) }}" class="btn btn-primary back-btn">Back</a>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <form method="POST"
                        action="{{ route('openOrClosedMenu', ['cateringId' => $catering->id, 'menuId' => $menuDate->id ]) }}">
                        @csrf
                        <h5>{{$menuDate->DayOfTheWeek}}</h5>
                        <div class="custom-control custom-switch">
                            {{-- @dump($menu) --}}
                            @if ($menu)
                            <input type="checkbox" class="custom-control-input" id="openOrClosed" name="openOrClosed"
                                checked>
                            <label class="custom-control-label" for="openOrClosed" id="openOrClosedLabel">Open</label>
                            @else
                            <input type="checkbox" class="custom-control-input" id="openOrClosed" name="openOrClosed">
                            <label class="custom-control-label" for="openOrClosed" id="openOrClosedLabel">Closed</label>
                            @endif


                        </div>
                        <input type="hidden" name="cateringId" value="{{$catering->id}}">
                        <input type="hidden" name="DayOfTheWeekId" value="{{$menuDate->id}}">


                        <div class="hiddenForm" @if ($menu) style="display: inherit" @endif>
                            @if ($menu)
                            <div class="form-group row">
                                <label for="opening"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Opening Time:') }}</label>

                                <div class="col-md-6">
                                    <input id="openingTime" type="time" class="form-control" name="openingTime"
                                        value="{{$menu->openingTime}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="closing"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Closing Time:') }}</label>

                                <div class="col-md-6">
                                    <input id="closingTime" type="time" class="form-control" name="closingTime"
                                        value="{{$menu->closingTime}}">
                                </div>
                            </div>
                            @else
                            <div class="form-group row">
                                <label for="opening"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Opening Time:') }}</label>

                                <div class="col-md-6">
                                    <input id="openingTime" type="time" class="form-control" name="openingTime">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="closing"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Closing Time:') }}</label>

                                <div class="col-md-6">
                                    <input id="closingTime" type="time" class="form-control" name="closingTime">
                                </div>
                            </div>
                            @endif

                        </div>
                        <button href="#" class="btn btn-primary btm-btn">Save</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="hiddenForm" @if ($menu) style="display: inherit" @endif>
            @if ($menu)
            <h3>{{$menuDate->DayOfTheWeek}}'s Menu </h3>
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Remove</th>
                        {{-- <th>Role</th>
                                    <th></th> --}}
                    </thead>
                    <tbody>
                        @foreach($productsMenu as $productMenu)
                        {{-- @dump($productMenu, $menu) --}}
                        @if ($productMenu->menuId === $menu->id)
                        <tr>
                            <td>{{$productMenu->name}}</td>
                            <td>{{$productMenu->description}}</td>
                            <td>{{$productMenu->image}}</td>
                            <td>{{$productMenu->price}}</td>
                            <td style="padding: 5px"><a class="btn btn-primary">Edit</a> </td>
                            <td style="padding: 5px">
                                <form
                                    action="{{ route('removeProductFromMenu', ['cateringId' => $catering->id, 'menuId' => $menu->id, 'productId' => $productMenu->productId] ) }}"
                                    method="post">
                                    @csrf
                                    <input class="btn btn-danger addProduct" type="submit" name="removeProductFromMenu"
                                        value="Del">
                                </form>
                            </td>
                        </tr>

                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>


            <h3>My Products </h3>
            <div class="card myProducts">
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Add To Menu</th>
                        {{-- <th>Role</th>
                        <th></th> --}}
                    </thead>
                    <tbody>
                        {{-- @dump($products) --}}
                        @if ($products)
                        @foreach($products as $product)
                        <tr>
                            {{-- <td>{{$user->name}} </td>
                            <td>{{$user->email}} </td>
                            <td>{{date_format($user->created_at, 'd-M-Y')}} </td> --}}
                            {{-- @if ($user->role == 1) --}}
                            <td>{{$product->name }}</td>
                            {{-- @endif
                                                        @if ($user->role == 2) --}}
                            <td>{{$product->description}}</td>
                            {{-- @endif
                                                        @if ($user->role == 3) --}}
                            <td>{{$product->image}} </td>
                            {{-- @endif --}}
                            <td>{{$product->price}}</td>
                            <td style="padding: 5px"><a class="btn btn-primary">Edit</a> </td>
                            <td style="padding: 5px"><a
                                    onclick="window.location='/mycatering/{{$catering->id}}/menu/{{$menu->id}}/product/{{$product->id}}/menuDateId/{{$menuDate->id}}'"
                                    class="btn btn-primary" style="margin-left: 16px;">Add</a>
                            </td>


                            {{-- <td><a href="{{ route('editUser', ['id' => $user->id]) }}"> Edit</a> </td> --}}
                        </tr>
                        @endforeach
                        @endif
                        <tr class="no-hover">
                            {{-- <td>{{$user->name}} </td>
                            <td>{{$user->email}} </td>
                            <td>{{date_format($user->created_at, 'd-M-Y')}} </td> --}}
                            {{-- @if ($user->role == 1) --}}
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <button class="btn btn-primary btm-btn addProduct"
                                    onclick="window.location='/mycatering/{{$catering->id}}/product'">Add
                                    Product</button>
                            </td>
                            {{-- @endif
                                                    @if ($user->role == 2) --}}
                            {{-- <td>Seller </td> --}}
                            {{-- @endif
                                                    @if ($user->role == 3) --}}
                            {{-- <td>Admin </td> --}}
                            {{-- @endif --}}


                            {{-- <td><a href="{{ route('editUser', ['id' => $user->id]) }}"> Edit</a> </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
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