<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Language;
use App\Models\Sector;
use App\Models\Brand;
use App\Models\BrandSlider1;
use App\Models\BrandSlider2;
use App\Models\Blog;
use App\Models\BlogSlider;
use App\Models\About;
use App\Models\Menu;
use App\Models\Career;
use App\Models\CareerJob;
use App\Models\CareerSlider;
use App\Models\Catalog;
use App\Models\CatalogGroup;
use App\Models\Office;
use App\Models\Page;
use App\Models\SeoSettings;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('lang', app()->getLocale())->get();
        $languages = Language::all();
       

        //dd($brands);

        return view('home', compact('sliders', 'languages'));
    }

    public function route($slug, $slug2 = null)
    {

        if($slug == 'copy-db') {

            $lang_array = ['es', 'fr', 'ru', 'ae']; // Add more languages as needed

            if(in_array($slug2, $lang_array)) {
                $lang = $slug2;
            } else {
                return "Invalid or missing language code. Please provide a valid language code (e.g., /copy-db/es).";
            }

            //return $this->copyDB($lang);
        }

        $menu = Menu::where(['seo_url' => $slug, 'lang' => app()->getLocale()])->firstOrFail();
        //dd($menu);
        // If the menu item has a page_type of 'about', fetch the about data
        if($menu->page_type == 'about') {
            $about = About::where('lang', app()->getLocale())->first();
            
            $how_we_do = DB::table('about_how_we_do')->where('lang', app()->getLocale())->get()->toArray();
            $what_we_do =  DB::table('about_what_we_do')->where('lang', app()->getLocale())->get()->toArray();
            $memberships = DB::table('about_memberships')->where('lang', app()->getLocale())->get()->toArray();
            //debug($memberships);
            $seo = SeoSettings::where('page', 'about')->where('lang', app()->getLocale())->first();
            $politics = DB::table('about_politics')->where('lang', app()->getLocale())->get()->toArray();
            //dd($politics);
            return view('about', compact('about', 'how_we_do', 'what_we_do', 'memberships', 'politics', 'seo'));
        }

        if($menu->page_type == 'sector') {
            if($slug2!= null) {
                $sector = Sector::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
                $slider1 = DB::table('sector_slider_1')->where(['lang' => app()->getLocale(), 'sector_id' => $sector->sector_id])->get();
                $slider2 = DB::table('sector_slider_2')->where(['lang' => app()->getLocale(), 'sector_id' => $sector->sector_id])->get();
                $sector_id = $sector->sector_id;
                // Get brands associated with the sector, brand's sector_ids is a comma-separated string
                $brands = Brand::where('lang', app()->getLocale())
                                ->whereRaw("FIND_IN_SET(?, sector_ids)", [$sector_id])
                                ->get();
                $seo = $sector;
                return view('sector', compact('sector', 'slider1', 'slider2', 'brands', 'seo'));
            }
            
        }

        if($menu->page_type == 'career') {
            $career = Career::where(['lang' => app()->getLocale()])->first();
            $seo = SeoSettings::where('page', 'career')->where('lang', app()->getLocale())->first();
            $careerJobs = CareerJob::where(['lang' => app()->getLocale()])->get();
            $careerSlider = CareerSlider::where(['lang' => app()->getLocale()])->get();
            if($slug2!= null) {
                $careerJob = CareerJob::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->first();
                $seo = $careerJob;
                return view('career-job', compact('career', 'careerJobs', 'careerJob', 'seo'));
            }
            return view('career', compact('career', 'careerJobs', 'careerSlider', 'seo'));
        }

        if($menu->page_type == 'brand') {
            if($slug2!= null) {
                $brand = Brand::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->with(['slider1', 'slider2', 'gallery'])->first();
                $seo = $brand;
                //dd($brand);
                return view('brand', compact('brand', 'seo'));
            }
            
        }

        if($menu->page_type == 'catalog') {
            
            if($slug2!= null) {
                $catalogGroup = CatalogGroup::where([
                    'lang' => app()->getLocale(),
                    'seo_url' => $slug2,
                ])
                ->with([
                    'catalogs' => function ($q) {
                        $q->where('lang', app()->getLocale())
                          ->with(['files' => function ($q2) {
                              $q2->where('lang', app()->getLocale());
                          }]);
                    }
                ])  
                // eager load related catalogs
                ->firstOrFail();
                $seo = $catalogGroup;
                //dd($catalogGroup);
                return view('catalog', compact('catalogGroup', 'seo'));
            }
        }

        if($menu->page_type == 'blog') {
            if($slug2!= null) {
                // Get blog posts limit 5 as array
                $blogs = Blog::where(['lang' => app()->getLocale()])->orderBy('sort')->limit(5)->get()->toArray();
                //dd($blogs);
                $blog = Blog::where(['lang' => app()->getLocale(), 'seo_url' => $slug2])->firstOrFail();
                $seo = $blog;
                $blogSlider = BlogSlider::where(['lang' => app()->getLocale(), 'blog_id' => $blog->blog_id])->get();
                //dd($blogSlider);
                return view('blog-detail', compact('blog', 'blogs', 'blogSlider', 'seo'));
            }else{
                $seo = SeoSettings::where('page', 'news')->where('lang', app()->getLocale())->first();
                
                $blogs = Blog::where(['lang' => app()->getLocale()])->orderBy('sort')->limit(5)->get()->toArray();
                return view('blog', compact('blogs', 'seo'));
            }
            
        }

        if($menu->page_type == 'contact') {
            $offices = Office::where(['lang' => app()->getLocale()])->get();
            $seo = SeoSettings::where('page', 'contact')->where('lang', app()->getLocale())->first();
            return view('contact', compact('offices', 'seo'));
        }

        if($menu->page_type == 'page') {
            $page = Page::where(['lang' => app()->getLocale(), 'seo_url' => $slug])->first();
            $seo = $page;
            //dd($page);
            return view('page', compact('page', 'seo'));
        }

        //return view('page', compact('page'));
    }

    public function copyDB($lang)
    {
        $sourceLang = 'en';
        $targetLang = $lang;

        $tables = [
            'about_how_we_do',
            'about_memberships',
            'about_mission_vision',
            'about_page',
            'about_politics',
            'about_what_we_do',
            'blog',
            'blog_slider',
            'brand',
            'brand_gallery',
            'brand_slider_1',
            'brand_slider_2',
            'career',
            'career_jobs',
            'career_slider',
            'catalog',
            'catalog_file',
            'catalog_group',
            'footer_info',
            'main_slider',
            'menu',
            'office',
            'page',
            'sector',
            'sector_slider_1',
            'sector_slider_2',
            'static_image',
            'static_text'
        ];

        //Fetch all records from source language
        //Change the lang column to target language
        //Insert into the same table
        foreach ($tables as $table) {
            $records = DB::table($table)->where('lang', $sourceLang)->get();
            foreach ($records as $record) {
                $newRecord = (array) $record; // Convert stdClass to array
                $newRecord['lang'] = $targetLang;
                // Remove primary key to avoid duplicate key error
                unset($newRecord[array_key_first($newRecord)]);
                DB::table($table)->insert($newRecord);
            }
        }

        return "Database copy from {$sourceLang} to {$targetLang} completed.";
    }

    
}
