<!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('admin-template') }}/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Kokulife</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Anasayfa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    İçerik Yönetimi
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.menu') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menü Yönetimi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.menu.footer', 'footer') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Footer Menü Yönetimi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.slider.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Slider</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.blog') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Blog</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.brand') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Markalar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.sector.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sektörler</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.office.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Ofisler</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.catalog.group.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Katalog Grupları</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.page.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sayfa Yönetimi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.static_text.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sabit Kelime Yönetimi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.footer_info.create') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Footer İletişim Yönetimi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-box-arrow-in-right"></i>
                    <p>
                      Kariyer
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.career.create') }}" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Kariyer Yönetimi</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.career.job.index') }}" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>İş İlanları</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.career.slider.index') }}" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Kariyer Slider</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.seo.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>SEO Yönetimi</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Hakkımızda Yönetimi
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.about.edit') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Hakkımızda</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.about.how_we_do') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Nasıl Yaparız?</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.about.what_we_do') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Neler Yaparız?</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.about.politics') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Politikalar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.about.memberships') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Üyelikler</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Dil Yönetimi
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.language') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dil Ayarları</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->