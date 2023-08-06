@extends('layouts.site')
@section('title', $product->name)
@section('header')
    <link href="{{asset('public/css/style-product-detail.css')}}" rel="stylesheet">
    <link href="{{asset('public/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('public/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
@endsection
@section('footer')
    <script src="{{asset('public/js/script-product-detail.js')}}"></script>
    <script src="{{asset('public/owlcarousel/owl.carousel.min.js')}}"></script>
    <script>
        /*-------------------
        Quantity change
        --------------------- */
        (function ($) {
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // if(oldValue > $qty)
                // {
                //     newVal = $qty;
                // }
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find('input').val(newVal);
        });
        
        })(jQuery);
    </script>
    
@endsection
@php
    $product_image= $product->productimg;
    $hinh="";
    if(count($product_image)>0)
    {
        $hinh=$product_image[0]["image"];
    }
    $sale=$product->price_buy;
    if($product->productsale)
    {
        $sale=$product->productsale["price_sale"];
    }
@endphp
@section('content')
<div class="container my-4">
    <div class = "product-div">
        <div class = "product-div-left">
            <div class = "img-container">
                <img src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
            </div>
            @if (count($product_image)>1)
            <div class = "hover-container">
                @for ($i=0; $i <= count($product_image)-1; $i++)
                @php
                    $hinh=$product_image[$i]["image"];
                @endphp
                <div><img src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" /></div>
                @endfor
            </div>
            @endif
        </div>
        <div class = "product-div-right">
            <form action="{{route('cart.add',['id'=>$product->id])}}" method="get" accept-charset="utf-8">
            <div class="product-information">
                <span class = "product-name">{{$product->name}}</span>
                <div class="price">
                    <strong>
                        {{-- <span class="price">{{number_format($sale)}}<sup>đ</sup></span>  --}}
                        <span class="product-price">{{number_format($sale)}}<sup>đ</sup></span> 
                        <del>{{number_format($product->price_buy)}}<sup>đ</sup></del>
                    </strong>
                </div>
                {{-- <span>
                    <label>Thương hiệu: {{$product->brand_name}}</label>
                </span> --}}
                <div style="height:150px;">
                    <p class = "product-description">{!!$product->metadesc!!}</p>
                </div>
                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="300" data-layout="" data-action="" data-size="large" data-share="true"></div>

                @if ($qty_store-$qty_buy!=0)
                <span>
                    <label>Số lượng còn lại: {{$qty_store - $qty_buy}}</label></br>
                    <label>Số lượng đã bán: {{$qty_buy}}</label>
                </span>
                <table>
                    <tbody>
                        <tr>
                            <td class="qua-col">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="1">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class = "btn-groups">
                    <button type = "submit" class = "add-cart-btn"><i class = "fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                </form>{{-- Kết thúc form của add --}}
                    <a href="{{route('buynow',['id'=>$product->id])}}"><button type = "button" class = "buy-now-btn"><i class="fas fa-wallet"></i> Mua ngay</button></a>
                </div>

                @else
                    <img class="img-fluid w-100" style="height:160px;width:290px;margin:auto;" src="{{asset('public/images/sold_out.png')}}" alt="sold_out.png" />
                @endif
            </div>
        </div>
    </div>
    <div class = "product-div-right">
        <div class="row">
            <div class="col-md-8">
                <div class="product-information">
                    <h3>Thông tin chi tiết</h3>
                    <p class = "product-description">{!!$product->detail!!}</p>           
                </div>
            </div>
            <div class="col-md-4">
                <div class="comment_fb">
                    <div class="fb-comments" data-href="http://127.0.0.1:81/HoThiThuTrang_2120110029/tui-tote-double-pocket" data-width="350" data-numposts="5">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4">
        <div class="headline">
            <h2 class="category text-center">SẢN PHẨM CÙNG LOẠI</h2>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($product_list as $row)
            @php
                $product_image= $row->productimg;
                $hinh="";
                if(count($product_image)>0)
                {
                    $hinh=$product_image[0]["image"];
                }
                $sale_sub=$row->price_buy;
                if($row->productsale)
                {
                    $sale=$row->productsale["price_sale"];
                }
                // $qty=0;
                // $qty_store=(int)$product->qtystore;
                // $qty_buy=(int)$product->qtybuy;
                // $qty=qty_store-$qty_buy;
            @endphp
            <div class="item">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo ">
                            <a href="{{route('slug.home',['slug'=>$row->slug])}}">
                                <img class="img-fluid w-100" src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
                            </a>
                            <div class="productname">
                                <a href="{{route('slug.home',['slug'=>$row->brand_slug])}}"><p>{{$row->brand_name}}</p></a>

                                <a href="{{route('slug.home',['slug'=>$row->slug])}}">
                                    <h2> {{$row->name}}</h2>
                                </a>    
                            </div>
                            <div class="price text-center">
                                {{-- @if ($qty!=0) --}}
                                <strong>
                                    <span>{{number_format($sale_sub)}}<sup>đ</sup></span> 
                                    <del>{{number_format($row->price_buy)}}<sup>đ</sup></del>
                                </strong>
                                <a href="{{route('cart.add',['id'=>$row->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                {{-- @else
                                <img class="img-fluid w-100" style="height:78px;width:180px;margin:auto;" src="{{asset('public/images/sold_out.png')}}" alt="sold_out.png" />
                                @endif --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end owl-casousel -->
    </div>
</div>
@endsection

