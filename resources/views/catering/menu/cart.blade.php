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
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th style=></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                <tr>
                    {{-- @dump($item) --}}
                    <td data-th="Product">
                        <div class="row">
                            <h5 class="nomargin">{{$item->name}}</h5>
                        </div>
                    </td>
                    <td data-th="Price">{{$item->price}}</td>
                    <td data-th="Quantity">
                        <input style="width: 35px;text-align: center;padding: 0px;" type="number"
                            class="form-control text-center" value="{{$item->amount}}">
                    </td>
                    @php
                    $subtotal = number_format((float)ltrim($item->price, '$') * $item->amount, 2, '.', '')
                    @endphp
                    <td data-th="Subtotal" class="text-center">${{$subtotal}}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
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
        <h4>No Items Yet</h4>
        @endif

    </div>
</div>