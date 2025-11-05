@extends('admin.layouts.main')
@section('title', 'Katalog Grubu Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Katalog Grubu Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb item active" aria-current="page">Katalog Grubu Yönetimi</li>
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
                        foreach($catalogGroup as $item){
                            $catalog_group_id = $item->catalog_group_id;
                            $brand_id = $item->brand_id;
                            $title[$item->lang] = $item->title;
                            $seo_url[$item->lang] = $item->seo_url;
                            $bg_image[$item->lang] = $item->bg_image;
                            $alt[$item->lang] = $item->alt;
                            $seo_title[$item->lang] = $item->seo_title;
                            $seo_description[$item->lang] = $item->seo_description;
                            $seo_keywords[$item->lang] = $item->seo_keywords;
                        }
                    ?>
                    <div class="card-body">
                        <form action="{{ route('admin.catalog.group.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="mb-3" style="padding:0 15px">
                                    <label for="brand_id_{{ $language->lang_code }}" class="form-label">Marka </label>
                                    <select class="form-select" name="brand_id_{{ $language->lang_code }}" id="brand_id_{{ $language->lang_code }}">
                                        <option value="">Seçiniz</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $brand_id ? 'selected' : '' }}>{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($languages as $language)
                                <input type="hidden" name="lang_{{ $language->lang_code }}" value="{{ $language->lang_code }}">
                                <input type="hidden" name="catalog_group_id" value="{{ $catalog_group_id }}" hidden>
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body" style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                                        <div class="form-group">
                                            <label for="title_{{ $language->lang_code }}">Başlık ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" value="{{ $title[$language->lang_code] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_url_{{ $language->lang_code }}">SEO URL ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="seo_url_{{ $language->lang_code }}" name="seo_url_{{ $language->lang_code }}" value="{{ $seo_url[$language->lang_code] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bg_image_{{ $language->lang_code }}">Resim ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="file" class="form-control" id="bg_image_{{ $language->lang_code }}" name="bg_image_{{ $language->lang_code }}">
                                            @if(isset($bg_image[$language->lang_code]))
                                                <img src="{{ $language->domain.'/'.getFolder(['uploads_folder','catalog_files_folder'], $language->lang_code) . '/' . $bg_image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_image_{{ $language->lang_code }}" name="old_image_{{ $language->lang_code }}" value="{{ $bg_image[$language->lang_code] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="alt_{{ $language->lang_code }}">Alt Metin ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="alt_{{ $language->lang_code }}" name="alt_{{ $language->lang_code }}" value="{{ $alt[$language->lang_code] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_title_{{ $language->lang_code }}">SEO Başlığı ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control seo_title" id="seo_title_{{ $language->lang_code }}" name="seo_title_{{ $language->lang_code }}" value="{{ $seo_title[$language->lang_code] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_description_{{ $language->lang_code }}">Açıklama ({{ strtoupper($language->lang_code) }})</label>
                                            <textarea class="form-control seo_description" id="seo_description_{{ $language->lang_code }}" name="seo_description_{{ $language->lang_code }}" rows="3" required>{{ $seo_description[$language->lang_code] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_keywords_{{ $language->lang_code }}">SEO Anahtar Kelimeleri ({{ strtoupper($language->lang_code) }})</label>
                                            <input type="text" class="form-control" id="seo_keywords_{{ $language->lang_code }}" name="seo_keywords_{{ $language->lang_code }}" value="{{ $seo_keywords[$language->lang_code] }}" required>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.catalog.group.index') }}" class="btn btn-secondary">Geri Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection