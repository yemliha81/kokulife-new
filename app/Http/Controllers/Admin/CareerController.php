<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerSlider;
use App\Models\CareerJob;
use App\Models\Language; // Assuming you have a Language model to fetch languages

class CareerController extends Controller
{

    protected $languages;

    //constructor
    public function __construct()
    {
        //$this->middleware('auth');
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }


    //Career methods
    public function index()
    {
        $careers = Career::all();
        return view('admin.career.index', compact('careers'));
    }

    public function create()
    {

        $career = Career::all();

        if ($career->isEmpty()) {
            // Handle the case when there are no careers
            return view('admin.career.create');
        }else{
            return view('admin.career.edit', compact( 'career'));
        }
        
    }

    public function store(Request $request)
    {
        try {
            foreach ($this->languages as $language) {
                    // Validate the request data
                    if ($language->lang_code === 'en') {
                        $request->validate([
                            'lang_' . $language->lang_code => 'required|string|max:10',
                            'title_' . $language->lang_code => 'required|string|max:100',
                            'upper_title_' . $language->lang_code => 'required|string|max:100',
                            'title_1_' . $language->lang_code => 'required|string|max:255',
                            'description_' . $language->lang_code => 'required|string',
                            'image_' . $language->lang_code => 'nullable|image|max:2048',
                            'alt_' . $language->lang_code => 'required|string|max:255',
                            'button_text_' . $language->lang_code => 'required|string|max:50',
                            'seo_title_' . $language->lang_code => 'required|string|max:255',
                            'seo_description_' . $language->lang_code => 'required|string|max:255',
                            'seo_keywords_' . $language->lang_code => 'nullable|string|max:255',
                        ]);
                    }

                    if ($request->hasFile('image_en') || $request->hasFile('image_' . $language->lang_code)) {
                        $tmpImgPath = createTmpFile($request, 'image_en', $this->languages[0]);
                        $imageName = moveFile($request,$language,'image_' . $language->lang_code, 'image_en', 'alt_' . $language->lang_code, 'alt_en', $language->images_folder, $tmpImgPath);
                        //dd($imageName);
                    }else{
                        $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                    }

                     

                    // Create or update the career content for the specific language
                    Career::updateOrCreate(
                        [
                            'lang' => $language->lang_code,
                        ],
                        [
                            'title' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                            'upper_title' => $request->input('upper_title_' . $language->lang_code) ?? $request->input('upper_title_en'),
                            'title_1' => $request->input('title_1_' . $language->lang_code) ?? $request->input('title_1_en'),
                            'description' => $request->input('description_' . $language->lang_code) ?? $request->input('description_en'),
                            'image' => $imageName, // save relative path
                            'alt' => $request->input('alt_' . $language->lang_code) ?? $request->input('alt_en'),
                            'button_text' => $request->input('button_text_' . $language->lang_code) ?? $request->input('button_text_en'),
                            'seo_title' => $request->input('seo_title_' . $language->lang_code) ?? $request->input('seo_title_en'),
                            'seo_description' => $request->input('seo_description_' . $language->lang_code) ?? $request->input('seo_description_en'),
                            'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code) ?? $request->input('seo_keywords_en'),
                        ]
                    );

                }

            return redirect()->back()->with('success', 'Kariyer başarıyla kaydedildi.');

        } catch (\Throwable $th) {
            // Handle the exception, log it or return an error response
            return redirect()->back()->withErrors(['error' => 'Hata: ' . $th->getMessage()]);
        }
    }

    public function edit()
    {
        $career = Career::all();
        //dd($career);
        return view('admin.career.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lang' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        Career::where('id', $id)->update($validated);
        return redirect()->route('admin.career.index');
    }

    public function destroy($id)
    {
        Career::destroy($id);
        return redirect()->route('admin.career.index');
    }

    // Career slider methods, index, create, store, edit, destroy
    public function sliderIndex()
    {
        $sliders = CareerSlider::where('lang', app()->getLocale())->get();
        
        return view('admin.career.slider.index', compact('sliders'));
    }

    public function sliderCreate()
    {
        return view('admin.career.slider.create');
    }

    public function sliderStore(Request $request)
    {
        //dd($request->all());
        if($request->has('slider_id')) {
            $slider_id = $request->slider_id; // Use the provided slider_id
        }
        else {
            $slider_id = CareerSlider::max('slider_id') + 1; // Increment the maximum slider_id by 1
            if (!$slider_id) {
                $slider_id = 1; // If no sliders exist, start with 1
            }
        }

       try {
            foreach ($this->languages as $language) {
                if($language->lang_code == 'en'){
                    $request->validate([
                        'lang_' . $language->lang_code => 'required|string|max:10',
                        'upper_title_' . $language->lang_code => 'required|string|max:100',
                        'title_' . $language->lang_code => 'required|string|max:100',
                        'title_1_' . $language->lang_code => 'required|string|max:255',
                        'description_' . $language->lang_code => 'required|string|max:500',
                        'image_' . $language->lang_code => 'nullable|image|max:2048',
                        'alt_' . $language->lang_code => 'required|string|max:255',
                    ]);
                }

                if ($request->hasFile('image_en') || $request->hasFile('image_' . $language->lang_code)) {
                    $tmpImgPath = createTmpFile($request, 'image_en', $this->languages[0]);
                    $imageName = moveFile($request,$language,'image_' . $language->lang_code, 'image_en', 'title_' . $language->lang_code, 'title_en', $language->images_folder, $tmpImgPath);
                    //dd($imageName);
                }else{
                    $imageName = $request->input('old_image_' . $language->lang_code, null); // Use old image if no new image is uploaded
                }

                CareerSlider::updateOrCreate(
                    [
                        'lang' => $language->lang_code,
                        'slider_id' => $slider_id,
                    ],
                    [
                        'upper_title' => $request->input('upper_title_' . $language->lang_code) ?? $request->input('upper_title_en'),
                        'title' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                        'title_1' => $request->input('title_1_' . $language->lang_code) ?? $request->input('title_1_en'),
                        'description' => $request->input('description_' . $language->lang_code) ?? $request->input('description_en'),
                        'image' => $imageName,
                        'alt' => $request->input('alt_' . $language->lang_code) ?? $request->input('alt_en'),
                    ]
                );
            }

            return redirect()->route('admin.career.slider.index')->with('success', 'Kariyer slayt başarıyla kaydedildi.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Kariyer slayt kaydedilirken bir hata oluştu. Hata: ' . $th->getMessage());
        }

    }

    public function sliderEdit($id)
    {
        $slider = CareerSlider::where('slider_id', $id)->get();
        return view('admin.career.slider.edit', compact('slider'));
    }


    public function sliderDestroy($id)
    {
        CareerSlider::where('slider_id', $id)->delete();
        return redirect()->route('admin.career.slider.index');
    }


    // Career Job methods
    public function jobIndex()
    {
        $jobs = CareerJob::where('lang', app()->getLocale())->get();
        return view('admin.career.job.index', compact('jobs'));
    }

    public function jobCreate()
    {
        return view('admin.career.job.create');
    }

    public function jobStore(Request $request)
    {
            
        try {
            if($request->has('job_id')) {
                $job_id = $request->job_id; // Use the provided job_id
            } else {
                $job_id = CareerJob::max('id') + 1; // Increment the maximum job_id by 1
                if (!$job_id) {
                    $job_id = 1; // If no jobs exist, start with 1
                }
            }

            foreach ($this->languages as $language) {
                $request->validate([
                    'lang_' . $language->lang_code => 'required|string|max:10',
                    'title_' . $language->lang_code => 'required|string|max:100',
                    'seo_url_' . $language->lang_code => 'required|string|max:255',
                    'short_description_' . $language->lang_code => 'required|string',
                    'description_' . $language->lang_code => 'required|string',
                    'outer_url_' . $language->lang_code => 'nullable|url|max:255',
                    'button_text_' . $language->lang_code => 'nullable|string|max:50',
                    'seo_title_' . $language->lang_code => 'nullable|string|max:255',
                    'seo_description_' . $language->lang_code => 'nullable|string|max:255',
                    'seo_keywords_' . $language->lang_code => 'nullable|string|max:255',
            ]);

                

                $careerJob = CareerJob::updateOrCreate(
                    ['job_id' => $job_id, 'lang' => $language->lang_code],
                    [
                        'job_id' => $job_id,
                        'title' => $request->input('title_' . $language->lang_code),
                        'seo_url' => $request->input('seo_url_' . $language->lang_code),
                        'short_description' => $request->input('short_description_' . $language->lang_code),
                        'description' => $request->input('description_' . $language->lang_code),
                        'outer_url' => $request->input('outer_url_' . $language->lang_code),
                        'button_text' => $request->input('button_text_' . $language->lang_code),
                        'seo_title' => $request->input('seo_title_' . $language->lang_code),
                        'seo_description' => $request->input('seo_description_' . $language->lang_code),
                        'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code),
                        //'image' => $imageName,
                    ]
                );
            }

            return redirect()->back()->with('success', 'Job başarıyla kaydedildi.');

        } catch (\Throwable $th) {
            throw $th;
            //return redirect()->back()->with('error', 'Job kaydedilirken bir hata oluştu.' . $th->getMessage());
        }
    }

    public function jobEdit($id)
    {
        $job = CareerJob::where('job_id', $id)->get();
        return view('admin.career.job.edit', compact('job'));
    }

    public function jobUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'lang' => 'required',
            'title' => 'required|string|max:100',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'outer_url' => 'nullable|url|max:255',
            'button_text' => 'nullable|string|max:50',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string|max:255',
        ]);

        $job = CareerJob::findOrFail($id);
        $job->update($validated);
        return redirect()->route('admin.career.job.index');
    }

    public function jobDestroy($id)
    {
        CareerJob::destroy($id);
        return redirect()->route('admin.career.job.index');
    }
}
