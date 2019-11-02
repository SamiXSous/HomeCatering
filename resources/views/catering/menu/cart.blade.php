<div class="card">
    <div class="card-body">
        @php
        $date = new DateTime($todaysDate);
        @endphp
        <h3>My Cart</h3>
        <h5 class="date">{{ $date->format('l jS F Y')}}</h5>
        {{-- @dump($cart) --}}
        @if (count($cart))
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width: 150px">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th style=></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                @php
                $subtotal = number_format((float)ltrim($item->price, '$') * $item->amount, 2, '.', '')
                @endphp
                <tr>
                    {{-- @dump($item) --}}
                    <td data-th="Product">

                        <h5 class="itemName">{{$item->name}}</h5>

                    </td>
                    <td data-th="Price">{{$item->price}}</td>
                    <td data-th="Quantity">

                        <input style="width: 35px;text-align: center;padding: 0px;" type="number"
                            id="productAmount{{$item->id}}" class="form-control text-center" value="{{$item->amount}}"
                            name="productAmount">
                    </td>

                    <td data-th="Subtotal" class="text-center">${{$subtotal}}</td>
                    <td class="actions" data-th="">


                        <button id="cartRefreshBtn{{$item->id}}" class="btn btn-info btn-sm"><i
                                class="fa fa-refresh"></i></button>


                        <form action="{{ route('removeProductFromCart', ['cateringId' => $item->cateringId]) }}"
                            method="POST" style="display:initial">
                            @csrf
                            <input type="hidden" name="cartProductId" class="cartProductId" value="{{$item->id}}">
                            <input type="hidden" name="cateringId" id="cateringId" value="{{$item->cateringId}}">
                            <button class="btn btn-danger btn-sm" data-token="{{ csrf_token() }}"><i
                                    class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                    @php
                    $totalCart += $subtotal;
                    @endphp
                </tr>
                @endforeach


            </tbody>
            <tfoot style="border-top: 1px solid #dee2e6;">
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total ${{number_format((float)$totalCart, 2, '.', '')}}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total
                            ${{number_format((float)$totalCart, 2, '.', '')}}</strong></td>
                    <td><a href="#" class="btn btn-success btn-block">Checkout</a></td>
                </tr>
            </tfoot>
        </table>
        @else
        <div class="noItemsInCart">
            <i class="fas fa-shopping-cart"></i>
            <h4>No Items In Cart</h4>
        </div>
        @endif

    </div>
</div>