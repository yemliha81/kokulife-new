@extends('admin.layouts.main')
@section('title', 'Marka Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Marka Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb item active" aria-current="page">Marka Yönetimi</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            @foreach($languages as $language)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $language->id }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $language->id }}"
                                            type="button" role="tab" aria-controls="tab-{{ $language->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <img src="{{ $language->domain .'/'. getFolder(['uploads_folder', 'images_folder'], $language->lang_code) .'/'.$language->flag_image }}" alt="{{ $language->title }}" style="width: 20px; margin-right: 5px;"> {{ strtoupper($language->lang_code) }}
                                    </button>
                                </li>
                            @endforeach
                        </ul> 
                    </div>
                    <?php 
                        foreach($brands as $brand){
                            $sector_ids = explode(',', $brand->sector_ids)  ?? [];
                            $brand_id[$brand->lang] = $brand->brand_id;
                            $url[$brand->lang] = $brand->url;
                            $up_title[$brand->lang] = $brand->up_title;
                            $title[$brand->lang] = $brand->title;
                            $title_1[$brand->lang] = $brand->title_1;
                            $description[$brand->lang] = $brand->description;
                            $image[$brand->lang] = $brand->image;
                            $banner_image[$brand->lang] = $brand->banner_image;
                            $bg_image[$brand->lang] = $brand->bg_image;
                            $alt[$brand->lang] = $brand->alt;
                            $seo_url[$brand->lang] = $brand->seo_url;
                            $seo_title[$brand->lang] = $brand->seo_title;
                            $seo_description[$brand->lang] = $brand->seo_description;
                            $seo_keywords[$brand->lang] = $brand->seo_keywords;
                        }
                    ?>
                    <div class="card-body">
                        <form action="{{ route('admin.brand.store' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="mb-3 px-3">
                                    <label for="sector_ids" class="form-label">Sektör</label>
                                    <select class="form-select" id="sector_ids" name="sector_ids[]" multiple required>
                                        <option value="">Sektör Seçiniz</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->sector_id }}" {{ in_array($sector->sector_id, $sector_ids) ? 'selected' : '' }}>{{ $sector->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($languages as $language)
                                <input type="hidden" name="brand_id" value="{{ $brand_id[$language->lang_code] ?? $brand_id['en'] }}">
                                <input type="hidden" name="lang" value="{{ $language->lang_code }}">
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body" style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                                        
                                        <div class="form-group">
                                            <label for="up_title_{{ $language->lang_code }}">Üst Metin ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="up_title_{{ $language->lang_code }}" name="up_title_{{ $language->lang_code }}" value="{{ $up_title[$language->lang_code] ?? $up_title['en'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title_{{ $language->lang_code }}">Başlık ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" value="{{ $title[$language->lang_code] ?? $title['en']  }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title_1_{{ $language->lang_code }}">Alt Başlık ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="title_1_{{ $language->lang_code }}" name="title_1_{{ $language->lang_code }}" value="{{ $title_1[$language->lang_code] ?? $title_1['en']  }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image_{{ $language->lang_code }}">Logo ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="file" class="form-control" id="image_{{ $language->lang_code }}" name="image_{{ $language->lang_code }}">
                                            @if(isset($image[$language->lang_code]))
                                                <img src="{{ $language->domain.'/'. getFolder(['uploads_folder','brand_images_folder'], $language->lang_code) . '/' . $image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_image_{{ $language->lang_code }}" name="old_image_{{ $language->lang_code }}" value="{{ $image[$language->lang_code] ?? $image['en'] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="bg_image_{{ $language->lang_code }}">Görsel ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="file" class="form-control" id="bg_image_{{ $language->lang_code }}" name="bg_image_{{ $language->lang_code }}">
                                            @if(isset($bg_image[$language->lang_code]))
                                                <img src="{{ $language->domain.'/'. getFolder(['uploads_folder','brand_images_folder'], $language->lang_code) . '/' . $bg_image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_bg_image_{{ $language->lang_code }}" name="old_bg_image_{{ $language->lang_code }}" value="{{ $bg_image[$language->lang_code] ?? $bg_image['en'] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="banner_image_{{ $language->lang_code }}">Arkaplan Görsel ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="file" class="form-control" id="banner_image_{{ $language->lang_code }}" name="banner_image_{{ $language->lang_code }}">
                                            @if(isset($banner_image[$language->lang_code]))
                                                <img src="{{ $language->domain.'/'. getFolder(['uploads_folder','brand_images_folder'], $language->lang_code) . '/' . $banner_image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_banner_image_{{ $language->lang_code }}" name="old_banner_image_{{ $language->lang_code }}" value="{{ $banner_image[$language->lang_code] ?? $banner_image['en'] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="url_{{ $language->lang_code }}">Buton URL ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="url_{{ $language->lang_code }}" name="url_{{ $language->lang_code }}" value="{{ $url[$language->lang_code] ?? $url['en'] }}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="seo_url_{{ $language->lang_code }}">SEO URL ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="seo_url_{{ $language->lang_code }}" name="seo_url_{{ $language->lang_code }}" value="{{ $seo_url[$language->lang_code] ?? $seo_url['en'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alt_{{ $language->lang_code }}">Alt Metin ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="alt_{{ $language->lang_code }}" name="alt_{{ $language->lang_code }}" value="{{ $alt[$language->lang_code] ?? $alt['en'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_{{ $language->lang_code }}">Açıklama ({{ strtoupper($language->lang_code) }})</label>
                                            <textarea class="form-control" id="description_{{ $language->lang_code }}" name="description_{{ $language->lang_code }}" rows="3" required>{{ $description[$language->lang_code] ?? $description['en'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_title_{{ $language->lang_code }}">SEO Başlık ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control seo_title" id="seo_title_{{ $language->lang_code }}" name="seo_title_{{ $language->lang_code }}" value="{{ $seo_title[$language->lang_code] ?? $seo_title['en'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_description_{{ $language->lang_code }}">SEO Açıklama ({{ strtoupper($language->lang_code) }})</label>
                                            <textarea class="form-control seo_description" id="seo_description_{{ $language->lang_code }}" name="seo_description_{{ $language->lang_code }}" rows="3">{{ $seo_description[$language->lang_code] ?? $seo_description['en'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_keywords_{{ $language->lang_code }}">SEO Anahtar Kelimeler ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="seo_keywords_{{ $language->lang_code }}" name="seo_keywords_{{ $language->lang_code }}" value="{{ $seo_keywords[$language->lang_code] ?? $seo_keywords['en'] }}">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.brand') }}" class="btn btn-secondary">Geri Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection