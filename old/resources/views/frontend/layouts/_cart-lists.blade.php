<table>
    <thead>
    <tr>
        <th>Product image</th>
        <th>Product name</th>
        <th>Product Model</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()>0)
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
            <tr>
        <td>
            <div class="cv-cart-img">
                @php
                    $photo=explode(',',$item->model->image_path);
                @endphp
                <img src="{{asset($photo[0])}}" alt="{{$item->name}}" class="img-fluid">
            </div>
        </td>
        <td>
            {{ucfirst($item->name)}}
        </td><td>
            {{$item->model->model_no}}
        </td>
        <td>
            <div class="cv-cart-quantity quantity">
                <button data-id="{{$item->rowId}}" class="cv-sub"></button>
                <input type="number" data-id="{{$item->rowId}}" class="qty-text" id="qty-input-{{$item->rowId}}"  value="{{$item->qty}}" min="1">
                <button data-id="{{$item->rowId}}" class="cv-add"></button>
                <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">

            </div>
        </td>
                <td><a href="javascript:void(0);" class="cart_delete" data-id="{{$item->rowId}}"><i class="fas fa-trash-alt text-danger"  title="delete"></i> </a></td>
    </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="text-center">No cart found</td>
        </tr>
    @endif

    </tbody>
</table>
