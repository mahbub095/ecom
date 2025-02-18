<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Brand;
use App\Models\Adverisement;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();

        // $popularCategory = HomePageSetting::where('key', 'popular_category_section')->first();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();
        $recentBlogs = Blog::with(['category', 'user'])->where('status',1)->orderBy('id', 'DESC')->take(8)->get();

        $homepage_secion_banner_one = Adverisement::where('key', 'homepage_secion_banner_one')->first();
        $homepage_secion_banner_one = json_decode($homepage_secion_banner_one->value);

        $homepage_secion_banner_two = Adverisement::where('key', 'homepage_secion_banner_two')->first();
        $homepage_secion_banner_two = json_decode($homepage_secion_banner_two?->value);

        $homepage_secion_banner_three = Adverisement::where('key', 'homepage_secion_banner_three')->first();
        $homepage_secion_banner_three = json_decode($homepage_secion_banner_three?->value);

        $homepage_secion_banner_four = Adverisement::where('key', 'homepage_secion_banner_four')->first();
        $homepage_secion_banner_four = json_decode($homepage_secion_banner_four?->value);
        return view(
            'frontend.home.home',

            compact(
                'sliders',
                'flashSaleDate',
                'flashSaleItems',
                'brands',
                'recentBlogs',

                'homepage_secion_banner_one',
                'homepage_secion_banner_two',
                'homepage_secion_banner_three',
                'homepage_secion_banner_four'
 
            ));
    }


    public function getTypeBaseProduct()
    {
        $typeBaseProducts = [];

        $typeBaseProducts['new_arrival'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
        ->with(['variants', 'category', 'productImageGalleries'])
        ->where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['featured_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
        ->with(['variants', 'category', 'productImageGalleries'])
        ->where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['top_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
        ->with(['variants', 'category', 'productImageGalleries'])
        ->where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['best_product'] = Product::withAvg('reviews', 'rating')->withCount('reviews')
        ->with(['variants', 'category', 'productImageGalleries'])
        ->where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        return $typeBaseProducts;
    }

    function ShowProductModal(string $id) {
        $product = Product::findOrFail($id);
 
        $content = view('frontend.layouts.modal', compact('product'))->render();
 
        return Response::make($content, 200, ['Content-Type' => 'text/html']);
     }
 }
 
