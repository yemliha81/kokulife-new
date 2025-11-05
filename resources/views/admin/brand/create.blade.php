@extends('admin.layouts.main')
@section('title', 'Marka Ekleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Marka Ekleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Marka Yönetimi</li>
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
                    <div class="card-body">
                        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="mb-3 px-3">
                                    <label for="sector_ids" class="form-label">Sektör</label>
                                    <select class="form-select" id="sector_ids" name="sector_ids[]" multiple required>
                                        <option value="">Sektör Seçiniz</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->sector_id }}">{{ $sector->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($languages as $language)
                                <?php $required = $language->lang_code == 'en' ? 'required' : ''; ?>
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body">
                                        <input type="hidden" name="lang_{{ $language->lang_code }}" value="{{ $language->lang_code }}">
                                        
                                        <div class="grids-3">
                                            <div class="mb-3">
                                                <label for="up_title_{{ $language->lang_code }}" class="form-label">Üst Metin ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="up_title_{{ $language->lang_code }}" name="up_title_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title_{{ $language->lang_code }}" class="form-label">Başlık ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <!-- title_1 -->
                                            <div class="mb-3">
                                                <label for="title_1_{{ $language->lang_code }}" class="form-label">Alt Başlık({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="title_1_{{ $language->lang_code }}" name="title_1_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image_{{ $language->lang_code }}" class="form-label">Logo ({{ $language->lang_code }})</label>
                                                <input type="file" class="form-control" id="image_{{ $language->lang_code }}" name="image_{{ $language->lang_code }}" accept="image/*" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bg_image_{{ $language->lang_code }}" class="form-label">Görsel ({{ $language->lang_code }})</label>
                                                <input type="file" class="form-control" id="bg_image_{{ $language->lang_code }}" name="bg_image_{{ $language->lang_code }}" accept="image/*" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="banner_image_{{ $language->lang_code }}" class="form-label">Arkaplan Görsel ({{ $language->lang_code }})</label>
                                                <input type="file" class="form-control" id="banner_image_{{ $language->lang_code }}" name="banner_image_{{ $language->lang_code }}" accept="image/*" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="url_{{ $language->lang_code }}" class="form-label">Buton URL({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="url_{{ $language->lang_code }}" name="url_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seo_url_{{ $language->lang_code }}" class="form-label">SEO Url ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="seo_url_{{ $language->lang_code }}" name="seo_url_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alt_{{ $language->lang_code }}" class="form-label">Alt Metin ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="alt_{{ $language->lang_code }}" name="alt_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description_{{ $language->lang_code }}" class="form-label">Açıklama ({{ $language->lang_code }})</label>
                                                <textarea class="form-control" id="description_{{ $language->lang_code }}" name="description_{{ $language->lang_code }}" rows="3" {{ $required }}></textarea>
                                            </div>
                                            <!-- seo_title -->
                                            <div class="mb-3">
                                                <label for="seo_title_{{ $language->lang_code }}" class="form-label">SEO Başlığı ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control seo_title" id="seo_title_{{ $language->lang_code }}" name="seo_title_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                            <!-- seo_description -->
                                            <div class="mb-3">
                                                <label for="seo_description_{{ $language->lang_code }}" class="form-label">SEO Açıklaması ({{ $language->lang_code }})</label>
                                                <textarea class="form-control seo_description" id="seo_description_{{ $language->lang_code }}" name="seo_description_{{ $language->lang_code }}" rows="3" {{ $required }}></textarea>
                                            </div>
                                            <!-- seo_keywords -->
                                            <div class="mb-3">
                                                <label for="seo_keywords_{{ $language->lang_code }}" class="form-label">SEO Anahtar Kelimeleri ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="seo_keywords_{{ $language->lang_code }}" name="seo_keywords_{{ $language->lang_code }}" {{ $required }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection