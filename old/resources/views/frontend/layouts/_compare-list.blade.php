<div class="table-responsive">
    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->count()<=0)
        <p class="text-center">You don't have any items in compare</p>
    @else
        <table class="table table-bordered mb-0 compare-table">
            <tbody>
            <tr>
                <td class="com-title">Product Image</td>

                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    @php
                        $photo=explode(',',$item->model->image_path);
                    @endphp
                    <td class="com-pro-img">
                        <a href="{{route('product.detail',$item->model->slug)}}" target="_blank"><img style="max-width: 150px" src="{{ asset($photo[0]) }}"
                                                                                                      alt=""></a>
                    </td>
                @endforeach
            </tr>
            <tr>
                <td class="com-title">Product Name</td>

                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td><a href="{{route('product.detail',$item->model->slug)}}" target="_blank">{{ucfirst($item->name)}}</a></td>
                @endforeach

            </tr>
            <tr>
                <td class="com-title">Rating</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td>
                        <div class="rating">
                            @php
                                $rate=$item->model->productReviews->avg('rate')
                            @endphp
                            @for($i=0; $i<5;$i++)
                                @if($i<$rate)
                                    <i class="ri-star-fill"></i>
                                @else
                                    <i class="ri-star-line"></i>
                                @endif
                            @endfor
                        </div>
                    </td>
                @endforeach

            </tr>
            <tr>
                <td class="com-title">Brand</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td>{{ucfirst($item->model->brand->title)}}</td>
                @endforeach
            </tr>
            <tr>
                <td class="com-title">Price</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td>Rs. {{number_format($item->price,2)}}</td>
                @endforeach
            </tr>

            <tr>
                <td class="com-title">Discount</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td>Rs. {{$item->model->discount}}%</td>
                @endforeach
            </tr>

            <tr>
                <td class="com-title">Description</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td>{!! html_entity_decode($item->model->summary) !!}</td>
                @endforeach
            </tr>

            <tr>
                <td class="com-title">Availability</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    @if($item->model->stock>0)
                        <td class="instock text-success">Instock</td>
                    @else
                        <td class="instock text-danger">Out of stock</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td class="com-title">Actions</td>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                    <td class="action">
                        <a href="javascript:void(0);" data-id="{{$item->rowId}}"  class="move-to-cart mb-1 compare_addTocart"><i
                                class="ri-shopping-cart-line widget-icon"></i></a>
                        <a href="javascript:void(0);"  data-id="{{$item->id}}" data-quantity="1" id="add_to_wishlist_{{$item->rowId}}" class="add_to_wishlist mb-1 compare_addWishlist"><i class="ri-heart-line  widget-icon"></i></a>
                        <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="delete_compare mb-1 remove_from_compare"><i class="ri-close-line  widget-icon"></i></a>
                    </td>
                @endforeach

            </tr>
            </tbody>
        </table>
    @endif
</div>
