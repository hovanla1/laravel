@extends('layouts.site')
@section('title', $row_cat->name)
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-3"><!--cột trái-->


            <div class="left-sidebar">
                <x-category-list/>
                <x-brand-list/>
                <x-topic-list/>

                
                <div class="shipping text-center" ><!--shipping-->
                    <img src="public/images/festive-2022-2-b-2.gif" alt="" width="260" height="350" />
                </div><!--/shipping-->
            </div>

        </div>
        <div class="col-md-9"><!--cột phải-->
            <div class="features_items">
                <div class="headline">          
                    <h2 class="category text-center">{{$row_cat->name}}</h2>           
                </div>
                <div style="margin:10px 20px">
                    @php
                        $i=count($count_list);
                    @endphp
                    <span>Có {{$i}} kết quả được tìm thấy.</span>
                </div>
                <div class="row">
                    @if (count($product_list)>0)
                        @foreach($product_list as $product)
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
                            // $qty=0;
                            // if($product->productstore)
                            // {
                            //     $qty=$product->productstore["qty"];
                            // }
                        @endphp
                        <div class="col-md-4 mb-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo ">
                                        {{-- <img src="{{asset('public/images/product/'.$product->image)}}" alt="" /> --}}
                                        <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                                            <img class="img-fluid w-100" src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
                                        </a>
                                        <div class="productname">
                                            <a href="{{route('slug.home',['slug'=>$product->brand_slug])}}"><p>{{$product->brand_name}}</p></a>
            
                                            <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                                                <h2 class="text-center"> {{$product->name}}</h2>
                                            </a>    
                                        </div>
                                        <div class="price text-center" style="height:80px;">
                                            {{-- @if ($qty!=0) --}}
                                            <strong>
                                                <span class="price">{{number_format($sale)}}<sup>đ</sup></span> 
                                                <del>{{number_format($product->price_buy)}}<sup>đ</sup></del>
                                            </strong>
                                            <a href="{{route('cart.add',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            {{-- <a onclick="AddCart({{$product->id}})" href="javascript:" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
                                            {{-- @else
                                            <img class="img-fluid w-100" style="height:78px;width:180px;margin:auto;" src="{{asset('public/images/sold_out.png')}}" alt="sold_out.png" />
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <h4 class="text-center">Không có sản phẩm nào thuộc danh mục này!!!</h4>
                    @endif
                </div><!--end_một_mẫu tin -->
                <div><!--phân trang -->
                    {{ $product_list->links() }}
                </div>
            </div><!--product_category_items-->
        </div>

    </div>
</div>
@endsection
