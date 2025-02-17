@extends('frontend.layouts.master')

@section('title')
     || Flash Sale
@endsection

@section('content')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Flash Sale</h4>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">Flash Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            DAILY DEALS DETAILS START
        ==============================-->
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">
                <div class="row">

                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($flashSaleItems as $item)
                        @php
                            $product = \App\Models\Product::find($item->product_id);
                        @endphp
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <span class="wsus__new"></span>

                                <span class="wsus__minus">-</span>

                                <a class="wsus__pro_link" href="">
                                    <img src="{{asset($product->thumb_image)}}" alt="product"
                                         class="img-fluid w-100 img_1"/>
                                    <img src="{{asset($product->productImageGalleries[0]->image)}} " alt="product"
                                         class="img-fluid w-100 img_2"/>
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal-{{$product->id}}"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="" class="add_to_wishlist" data-id="{{$product->id}}"><i
                                                class="far fa-heart"></i></a></li>
                                     <li><a href="#"><i class="far fa-random"></i></a> 
                                </ul>
                                                           <div class="wsus__product_details"> 
                                                             <a class="wsus__category" href="#">{{$product->category->name}} </a> 
                                                            <p class="wsus__pro_rating"> 
                  
                                                         <a class="wsus__pro_name"
                                                                  href="{{route('product-detail', $product->slug)}}">{{$product->name}}</a>
                                                                @if(checkDiscount($product))
                                                                  <p class="wsus__price">{{$settings->currency_icon}}{{$product->offer_price}}
                                                                          <del>{{$settings->currency_icon}}{{$product->price}}</del>
                                                                    </p>
                                                                 @else
                                                                   <p class="wsus__price">{{$settings->currency_icon}}{{$product->price}}</p>
                                                            @endif
                                                       <form class="shopping-cart-form">
                                                                       <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                      @foreach ($product->variants as $variant)
                                                                          @if ($variant->status != 0)
                                                                              <select class="d-none" name="variants_items[]">
                                                                                   @foreach ($variant->productVariantItems as $variantItem)
                                                                                @if ($variantItem->status != 0)
                                                                                       <option
                                                                                        value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}}
                                                                                          (${{$variantItem->price}})-
                                                                                        </option>
                                                                                  @endif
                                                                              @endforeach
                                                                          </select>
                                                                      @endif
                                                               @endforeach
                                                              <input class="" name="qty" type="hidden" min="1" max="100" value="1"/>
                                                                    <button class="add_cart" type="submit">add to cart</button>
                                                                 </form>
                                                          </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    @if ($flashSaleItems->hasPages())
                        {{$flashSaleItems->links()}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
            DAILY DEALS DETAILS END
        ==============================-->

    <!--==========================
        PRODUCT MODAL VIEW START
    ===========================-->
    @foreach ($flashSaleItems as $item)
        @php
            $product = \App\Models\Product::find($item->product_id);
        @endphp

        <section class="product_popup_modal">
            <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        @if ($product->video_link)
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true"
                                               data-vbtype="video"
                                               href="{{$product->video_link}}">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        @endif
                                        <div class="row modal_slider">
                                            <div class="col-xl-12">
                                                <div class="modal_slider_img">
                                                    <img src="{{asset($product->thumb_image)}}" alt="product"
                                                         class="img-fluid w-100">
                                                </div>
                                            </div>

                                            @if(count($product->productImageGalleries) === 0)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{asset($product->thumb_image)}}" alt="product"
                                                             class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endif

                                            @foreach ($product->productImageGalleries as $productImage)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{asset($productImage->image)}}"
                                                             alt="{{$product->name}}" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!--==========================
    PRODUCT MODAL VIEW END
===========================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            simplyCountdown('.simply-countdown-one', {
                year: {{date('Y', strtotime($flashSaleDate->end_date))}},
                month: {{date('m', strtotime($flashSaleDate->end_date))}},
                day: {{date('d', strtotime($flashSaleDate->end_date))}},
            });
        })
    </script>
@endpush
