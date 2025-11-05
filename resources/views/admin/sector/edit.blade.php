@extends('admin.layouts.main')
@section('title', 'Sektör Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Sektör Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sektör Yönetimi</li>
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
                        foreach($sectors as $sector){
                            $up_title[$sector->lang] = $sector->up_title;
                            $sector_id[$sector->lang] = $sector->sector_id;
                            $seo_url[$sector->lang] = $sector->seo_url;
                            $title[$sector->lang] = $sector->title;
                            $title_1[$sector->lang] = $sector->title_1;
                            $description[$sector->lang] = $sector->description;
                            $image[$sector->lang] = $sector->image;
                            $bg_image[$sector->lang] = $sector->bg_image;
                            $alt[$sector->lang] = $sector->alt;
                            $bg_alt[$sector->lang] = $sector->bg_alt;
                            $seo_title[$sector->lang] = $sector->seo_title;
                            $seo_description[$sector->lang] = $sector->seo_description;
                            $seo_keywords[$sector->lang] = $sector->seo_keywords;
                        }
                    ?>
                    <div class="card-body">
                        <form action="{{ route('admin.sector.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                @foreach($languages as $language)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body" >
                                        <input type="hidden" name="lang_{{ $language->lang_code }}" value="{{ $language->lang_code }}">
                                        <input type="hidden" name="sector_id" value="{{ $id }}">
                                        <div class="grids-4">
                                            <div class="mb-3">
                                                <label for="up_title_{{ $language->lang_code }}" class="form-label">Üst Metin ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="up_title_{{ $language->lang_code }}" name="up_title_{{ $language->lang_code }}" required value="{{ $up_title[$language->lang_code] ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title_{{ $language->lang_code }}" class="form-label">Başlık ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" required value="{{ $title[$language->lang_code] ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title_1_{{ $language->lang_code }}" class="form-label">Başlık 2 ({{ $language->lang_code }})</label>
                                                <input type="text" class="form-control" id="title_1_{{ $language->lang_code }}" name="title_1_{{ $language->lang_code }}" required value="{{ $title_1[$language->lang_code] ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description_{{ $language->lang_code }}" class="form-label">Açıklama ({{ $language->lang_code }})</label>
                                                <textarea class="form-control" id="description_{{ $language->lang_code }}" name="description_{{ $language->lang_code }}" rows="3" required>{{ $description[$language->lang_code] ?? '' }}</textarea>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label for="image_{{ $language->lang_code }}" class="form-label">Görsel ({{ $language->lang_code }})</label>
                                            <input type="file" class="form-control" id="image_{{ $language->lang_code }}" name="image_{{ $language->lang_code }}" accept="image/*" value="{{ $image[$language->lang_code] ?? '' }}">
                                            @if(isset($image[$language->lang_code]))
                                                <img src="{{ $language->domain .'/'.  getFolder(['uploads_folder','sector_images_folder'], $language->lang_code) . '/' . $image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_image_{{ $language->lang_code }}" name="old_image_{{ $language->lang_code }}" value="{{ $image[$language->lang_code] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="alt_{{ $language->lang_code }}" class="form-label">Alt Metin ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="alt_{{ $language->lang_code }}" name="alt_{{ $language->lang_code }}" required value="{{ $alt[$language->lang_code] ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bg_image_{{ $language->lang_code }}" class="form-label">Arka Plan Görseli ({{ $language->lang_code }})</label>
                                            <input type="file" class="form-control" id="bg_image_{{ $language->lang_code }}" name="bg_image_{{ $language->lang_code }}" accept="image/*" >
                                            @if(isset($bg_image[$language->lang_code]))
                                                <img src="{{ $language->domain .'/'.  getFolder(['uploads_folder','sector_images_folder'], $language->lang_code) . '/' . $bg_image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_bg_image_{{ $language->lang_code }}" name="old_bg_image_{{ $language->lang_code }}" value="{{ $bg_image[$language->lang_code] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="bg_alt_{{ $language->lang_code }}" class="form-label">Alt Metin 2 ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="bg_alt_{{ $language->lang_code }}" name="bg_alt_{{ $language->lang_code }}" required value="{{ $bg_alt[$language->lang_code] ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="seo_url_{{ $language->lang_code }}" class="form-label">SEO Url ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="seo_url_{{ $language->lang_code }}" name="seo_url_{{ $language->lang_code }}" required value="{{ $seo_url[$language->lang_code] ?? '' }}">
                                        </div>
                                        <!-- seo_title -->
                                        <div class="mb-3">
                                            <label for="seo_title_{{ $language->lang_code }}" class="form-label">SEO Başlığı ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control seo_title" id="seo_title_{{ $language->lang_code }}" name="seo_title_{{ $language->lang_code }}" required value="{{ $seo_title[$language->lang_code] ?? '' }}">
                                        </div>
                                        <!-- seo_description -->
                                        <div class="mb-3">
                                            <label for="seo_description_{{ $language->lang_code }}" class="form-label">SEO Açıklaması ({{ $language->lang_code }})</label>
                                            <textarea class="form-control seo_description" id="seo_description_{{ $language->lang_code }}" name="seo_description_{{ $language->lang_code }}" required rows="3">{{ $seo_description[$language->lang_code] ?? '' }}</textarea>
                                        </div>
                                        <!-- seo_keywords -->
                                        <div class="mb-3">
                                            <label for="seo_keywords_{{ $language->lang_code }}" class="form-label">SEO Anahtar Kelimeleri ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="seo_keywords_{{ $language->lang_code }}" name="seo_keywords_{{ $language->lang_code }}" required value="{{ $seo_keywords[$language->lang_code] ?? '' }}">
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