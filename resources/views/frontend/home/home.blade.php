@extends('frontend.layouts.master')
@section('title')
e-Commerce HTML Template
@endsection

@section('content')
<!--============================
            BANNER PART 2 START
        ==============================-->
@include('frontend.home.sections.banner-slider')
<!--============================
            BANNER PART 2 END
        ==============================-->


<!--============================
            FLASH SELL START
        ==============================-->
@include('frontend.home.sections.flash-sale')

@include('frontend.home.sections.brand-slider') 
 @include('frontend.home.sections.top-category-product')
@include('frontend.home.sections.single-banner')  
@include('frontend.home.sections.hot-deals')  
  @include('frontend.home.sections.large-banner')  
<!--============================
            FLASH SELL END
        ==============================-->


<!--============================
           MONTHLY TOP PRODUCT START
        ==============================-->
 
<!--============================
           MONTHLY TOP PRODUCT END
        ==============================-->


<!--============================
            BRAND SLIDER START
        ==============================-->
 
<!--============================
            BRAND SLIDER END
        ==============================-->


<!--============================
            SINGLE BANNER START
        ==============================-->
 
<!--============================
            SINGLE BANNER END
        ==============================-->


<!--============================
            HOT DEALS START
        ==============================-->
  @include('frontend.home.sections.hot-deals')  
<!--============================
            HOT DEALS END
        ==============================-->


<!--============================
            ELECTRONIC PART START
        ==============================-->
{{-- @include('frontend.home.sections.category-product-slider-one') --}}
<!--============================
            ELECTRONIC PART END
        ==============================-->


<!--============================
            ELECTRONIC PART START
        ==============================-->
{{-- @include('frontend.home.sections.category-product-slider-two') --}}

<!--============================
            ELECTRONIC PART END
        ==============================-->


<!--============================
            LARGE BANNER  START
        ==============================-->
{{-- @include('frontend.home.sections.large-banner') --}}

<!--============================
            LARGE BANNER  END
        ==============================-->


<!--============================
            WEEKLY BEST ITEM START
        ==============================-->
{{-- @include('frontend.home.sections.weekly-best-item') --}}
<!--============================
            WEEKLY BEST ITEM END
        ==============================-->


<!--============================
          HOME SERVICES START
        ==============================-->
  @include('frontend.home.sections.services')  
<!--============================
            HOME SERVICES END
        ==============================-->


<!--============================
            HOME BLOGS START
        ==============================-->
  @include('frontend.home.sections.blog') 
<!--============================
            HOME BLOGS END
        ==============================-->
@endsection
