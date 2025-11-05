@extends('admin.layouts.main')
@section('title', 'Katalog Grubu Yönetimi')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Katalog Grubu Yönetimi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Katalog Grubu Yönetimi</li>
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
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">           
                <!-- /.card -->
                <div class="card mb-4">
                  <div class="card-header" >
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="display:inline-block;" class="card-title">Katalog Grubu Yönetimi</h3>
                        <a style="display:inline-block;" href="{{ route('admin.catalog.group.create') }}" class="btn btn-sm btn-primary">Grup Ekle</a>
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-striped dataTable">
                      <thead>
                        <tr>
                          <th style="width: 30px">#</th>
                          <th>Başlık</th>
                          <th>Görsel</th>
                          <th  style="width: 300px">İşlem</th>
                        </tr>
                      </thead>
                      <tbody class="connectedSortable">
                        @foreach($catalogGroups as $group)
                        <tr class="align-middle">
                          <td>{{ $group->id }}</td>
                          <td>{{ strip_tags($group->title) }}</td>
                          <td><img src="{{ $languages[0]->domain.'/'.getFolder([ 'uploads_folder', 'catalog_files_folder'], $group->lang) . '/' . $group->bg_image }}" alt="{{ $group->title }}" width="50"></td>
                          <td>
                            <!-- Kataloglar -->
                            <a href="{{ route('admin.catalog.index', ['catalogGroupId' => $group->catalog_group_id]) }}" class="btn btn-info btn-sm">Kataloglar</a>
                            <a href="{{ route('admin.catalog.group.edit', $group->catalog_group_id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                            <form action="{{ route('admin.catalog.group.destroy', $group->catalog_group_id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
                <!-- /.col -->
                </div>
            <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
@endsection
