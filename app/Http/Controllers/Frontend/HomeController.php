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

        $popularCategory = HomePageSetting::where('key', 'popular_category_section')->first();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();
        $recentBlogs = Blog::with(['category', 'user'])->where('status', 1)->orderBy('id', 'DESC')->take(8)->get();

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
                'popularCategory',
                'homepage_secion_banner_one',
                'homepage_secion_banner_two',
                'homepage_secion_banner_three',
                'homepage_secion_banner_four'

            )
        );
    }

}