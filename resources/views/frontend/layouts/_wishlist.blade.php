<table class="table table-bordered mb-30">
    <thead>
    <tr>
        <th scope="col">S.N.</th>
        <th scope="col">Image</th>
        <th scope="col">Product</th>
        <th scope="col">Unit Price</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
            <tr>
                <th scope="row">
                    {{$loop->iteration}}
                </th>
                @php
                    $photo=explode(',',$item->model->image_path);
                @endphp
                <td>
                    <img src="{{asset($photo[0])}}" style="max-width: 150px" alt="Product">
                </td>
                <td>
                    <a href="{{route('product.detail',$item->model->slug)}}" class="text-info font-weight-bold" target="_blank">{{ucfirst($item->name)}}</a>
                </td>
                <td>${{number_format($item->price,2)}}</td>
                <td>
                    <span class="ri ri-undo"></span>
                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="move-to-cart btn btn-info btn-sm"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                    <a href="javascript:void(0);"  data-id="{{$item->rowId}}" class="delete_wishlist btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="text-center">You don't have any wishlist product!</td>
        </tr>
    @endif
    </tbody>
</table>
