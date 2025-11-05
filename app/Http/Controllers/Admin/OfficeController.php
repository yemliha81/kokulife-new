<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Language;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::all();
        view()->share('languages', $this->languages);
    }
    /**
     * Display a listing of the offices.
     */
    public function index()
    {
        $offices = Office::where('lang', app()->getLocale())->orderBy('sort', 'asc')->get();
        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new office.
     */
    public function create()
    {
        return view('admin.office.create');
    }

    /**
     * Store a newly created office in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            if($request->has('office_id')){
                $office_id = $request->input('office_id');
            }else{
                $office_id = Office::max('office_id') + 1;
                if(!$office_id) {
                    $office_id = 1;
                }
            }
            foreach($this->languages as $language) {
                if($language->lang_code == 'en'){
                    $data = $request->validate([
                        'title_' . $language->lang_code => 'nullable|string|max:100',
                        'description_' . $language->lang_code => 'nullable|string',
                        'map_url_' . $language->lang_code => 'nullable|string|max:255',
                        'lat_' . $language->lang_code => 'nullable|string|max:50',
                        'long_' . $language->lang_code => 'nullable|string|max:50',
                        'phone_' . $language->lang_code => 'nullable|string|max:50',
                        'email_' . $language->lang_code => 'nullable|string|email|max:100',
                    ]);
                }

                Office::updateOrCreate(
                    ['office_id' => $office_id, 'lang' => $language->lang_code],
                    [
                        'title' => $request->input('title_' . $language->lang_code) ?? $data['title_en'],
                        'description' => $request->input('description_' . $language->lang_code) ?? $data['description_en'],
                        'address' => $request->input('description_' . $language->lang_code) ?? $data['description_en'],
                        'map_url' => $request->input('map_url_' . $language->lang_code) ?? $data['map_url_en'],
                        'lat' => $request->input('lat_' . $language->lang_code) ?? $data['lat_en'],
                        'long' => $request->input('long_' . $language->lang_code) ?? '-',
                        'phone' => $request->input('phone_' . $language->lang_code) ?? $data['phone_en'],
                        'email' => $request->input('email_' . $language->lang_code) ?? $data['email_en'],
                    ]
                );
            }
            return redirect()->back()->with('success', 'Ofis başarıyla kaydedildi.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified office.
     */
    public function edit($office_id)
    {
        $offices = Office::where('office_id', $office_id)->get();
        return view('admin.office.edit', compact('offices'));
    }

    /**
     * Update the specified office in storage.
     */
    public function update(Request $request, Office $office)
    {
        $validated = $request->validate([
            'lang' => 'required|string|max:10',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'lat' => 'required|string|max:50',
            'long' => 'required|string|max:50',
            'sort' => 'nullable|integer',
        ]);

        $office->update($validated);

        return redirect()->route('admin.office.index')->with('success', 'Office updated successfully.');
    }

    /**
     * Remove the specified office from storage.
     */
    public function destroy($office_id)
    {
        $office = Office::where('office_id', $office_id)->get();
        $office->each->delete();

        return redirect()->route('admin.office.index')->with('success', 'Office deleted successfully.');
    }
}
