@extends('admin.layouts.main')
@section('title', 'Ofis Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Ofis Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb item active" aria-current="page">Ofis Yönetimi</li>
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
                        foreach($offices as $office){
                            $office_id[$office->lang] = $office->office_id;
                            $url[$office->lang] = $office->url;
                            $title[$office->lang] = $office->title;
                            $description[$office->lang] = $office->description;
                            $map_url[$office->lang] = $office->map_url;
                            $lat[$office->lang] = $office->lat;
                            $long[$office->lang] = $office->long;
                            $phone[$office->lang] = $office->phone;
                            $email[$office->lang] = $office->email;
                        }
                    ?>
                    <div class="card-body">
                        <form action="{{ route('admin.office.store', $office_id[$language->lang_code]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="tab-content" id="myTabContent">
                                @foreach($languages as $language)
                                <input type="hidden" name="office_id" value="{{ $office_id[$language->lang_code] }}">
                                <input type="hidden" name="lang" value="{{ $language->lang_code }}">
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->id }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                    <div class="card-body">
                                        <div class="grids-3">
                                            <div class="form-group">
                                                <label for="title_{{ $language->lang_code }}">Başlık ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="text" class="form-control" id="title_{{ $language->lang_code }}" name="title_{{ $language->lang_code }}" value="{{ $title[$language->lang_code] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="description_{{ $language->lang_code }}">Adres ({{ strtoupper($language->lang_code) }})</label>
                                                <textarea class="form-control" id="description_{{ $language->lang_code }}" name="description_{{ $language->lang_code }}" rows="3" >{{ $description[$language->lang_code] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="map_url_{{ $language->lang_code }}">Harita URL ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="text" class="form-control" id="map_url_{{ $language->lang_code }}" name="map_url_{{ $language->lang_code }}" value="{{ $map_url[$language->lang_code] }}" >
                                            </div>
                                        </div>
                                        <div class="grids-4">
                                            <div class="form-group">
                                                <label for="lat_{{ $language->lang_code }}">Enlem ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="text" class="form-control" id="lat_{{ $language->lang_code }}" name="lat_{{ $language->lang_code }}" value="{{ $lat[$language->lang_code] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="long_{{ $language->lang_code }}">Boylam ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="text" class="form-control" id="long_{{ $language->lang_code }}" name="long_{{ $language->lang_code }}" value="{{ $long[$language->lang_code] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_{{ $language->lang_code }}">Telefon ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="text" class="form-control" id="phone_{{ $language->lang_code }}" name="phone_{{ $language->lang_code }}" value="{{ $phone[$language->lang_code] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="email_{{ $language->lang_code }}">E-posta ({{ strtoupper($language->lang_code) }})</label>
                                                <input type="email" class="form-control" id="email_{{ $language->lang_code }}" name="email_{{ $language->lang_code }}" value="{{ $email[$language->lang_code] }}" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.office.index') }}" class="btn btn-secondary">Geri Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection