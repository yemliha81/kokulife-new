@extends('admin.layouts.main')
@section('title', 'Katalog Dosyası Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Katalog Dosyası Güncelleme</h3></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Katalog Dosyası Güncelleme</li>
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
                    <?php $filename = []; ?>
                    <?php foreach($catalogFiles as $file){
                        $file_id = $file->file_id;
                        $title[$file->lang] = $file->title;
                        $image[$file->lang] = $file->image;
                        $filename[$file->lang] = $file->file;
                        $alt[$file->lang] = $file->alt;
                        $description[$file->lang] = $file->description;
                        
                    }

                     ?>
                    <div class="card-body">
                        <form action="{{ route('admin.catalog.files.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                @foreach($languages as $language)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body" style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                                        <input type="hidden" name="lang_{{ $language->lang_code }}" value="{{ $language->lang_code }}">
                                        <input type="hidden" name="file_id" value="{{ $file_id }}">
                                        <input type="hidden" name="catalog_id" value="{{ $catalogId }}">
                                        <div class="mb-3">
                                            <label for="title_{{ $language->lang_code }}" class="form-label">Başlık ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" required value="{{ $title[$language->lang_code] ?? '' }}">
                                        </div>
                                        
                                        <!-- title_1 -->
                                        <div class="mb-3">
                                            <label for="image_{{ $language->lang_code }}" class="form-label">Görsel ({{ $language->lang_code }})</label>
                                            <input type="file" class="form-control" id="image_{{ $language->lang_code }}" name="image_{{ $language->lang_code }}" accept="image/*" >
                                            @if(isset($image[$language->lang_code]))
                                                <img src="{{ $language->domain .'/'. getFolder(['uploads_folder','catalog_files_folder'], $language->lang_code) . '/' . $image[$language->lang_code] }}" alt="{{ $alt[$language->lang_code] }}" style="width: 200px; height: auto; margin-top: 10px;">
                                                <input type="hidden" class="form-control" id="old_image_{{ $language->lang_code }}" name="old_image_{{ $language->lang_code }}" value="{{ $image[$language->lang_code] }}" readonly>
                                            @endif
                                        </div>
                                        <!-- file(PDf) -->
                                        <div class="mb-3">
                                            <label for="file_{{ $language->lang_code }}" class="form-label">Dosya ({{ $language->lang_code }})</label>
                                            <input type="file" class="form-control" id="file_{{ $language->lang_code }}" name="file_{{ $language->lang_code }}" accept=".pdf" >
                                            @if($filename[$language->lang_code])
                                                <a href="{{ $language->domain .'/'. getFolder(['uploads_folder','catalog_files_folder'], $language->lang_code) . '/' . $filename[$language->lang_code] }}" target="_blank">Mevcut Dosyayı Görüntüle</a>
                                                <input type="hidden" class="form-control" id="old_file_{{ $language->lang_code }}" name="old_file_{{ $language->lang_code }}" value="{{ $filename[$language->lang_code] }}" readonly>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="alt_{{ $language->lang_code }}" class="form-label">Alt Metin ({{ $language->lang_code }})</label>
                                            <input type="text" class="form-control" id="alt_{{ $language->lang_code }}" name="alt_{{ $language->lang_code }}" required value="{{ $alt[$language->lang_code] ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description_{{ $language->lang_code }}" class="form-label">Açıklama ({{ $language->lang_code }})</label>
                                            <textarea class="form-control" id="description_{{ $language->lang_code }}" name="description_{{ $language->lang_code }}" rows="3" required>{{ $description[$language->lang_code] ?? '' }}</textarea>
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