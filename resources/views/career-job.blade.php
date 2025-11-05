@extends('layouts.main')

@section('content')
   <?php $pageTitle = $careerJob->title; 
        $breadcrumbImage = "corporate-breadcrumb.jpg";
        $breadcrumbVideo = "breadcrumb-video.mp4";
        $pageLink = "page-corporate.php";
        $imageOrVideo = "image";
    ?> 

<main class="main-field header-space">
    <section class="content pt-[50px]">
        <div class="container max-w-[1650px] mb-[50px]">
            <div class="career-content bg-white px-[150px] 2xl:px-[120px] xl:px-[75px] lg:px-[45px] md:px-[30px] py-[80px] 2xl:py-[60px] xl:py-[45px] md:py-[30px]">
                <div class="text-editor">
                    <h1><?=$careerJob->title?></h1>
                    <p><?=$careerJob->description?></p>
                </div>
            </div>
        </div>
        <div class="container max-w-[1650px] mb-[130px] 2xl:mb-[90px] lg:mb-[45px] md:mb-[30px]">
            <div class="form-area bg-secondary-main relative">
                <div class="bg-primary-main absolute -z-[1] -bottom-[40px] -left-[40px] w-[501px] aspect-square md:hidden"></div>
                <div class="relative grid grid-cols-[2.5fr_2fr] md:grid-cols-1 gap-[80px] xl:gap-[30px]">
                    <div class="left flex items-center reveal md:hidden">
                        <img src="../assets/image/static/career-mockup.png" alt="Kokulife Kariyer" width="900" height="796" class="w-[900px] h-auto translate-x-[-40px] sm:translate-x-[-20px]">
                    </div>
                    <div class="right py-[72px] xl:py-[50px] pr-[100px] 2xl:pr-[60px] lg:pr-[45px] md:px-[30px]">
                        <div class="form">
                            <h3 class="reveal text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white mb-[50px] lg:mb-[30px]">
                                Başvuru <span class="font-bold">Formu</span>
                            </h3>
                            <form action="#" method="post" id="career-form" enctype="multipart/form-data">
                                <div class="grid grid-cols-2 gap-x-[30px] gap-y-[45px] sm:gap-y-[30px] xs:gap-y-[12px]">
                                    <div class="form-group col-span-2 reveal">
                                        <div class="w-full relative flex flex-col group/item">
                                            <select name="position" id="position" required class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 text-[18px] font-light text-white pb-[16px] pr-[30px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                                <option value="Network Servisleri ve Güvenlik Satış Uzmanı" selected>Network Servisleri ve Güvenlik Satış Uzmanı</option>
                                                <option value="Network Servisleri ve Güvenlik Satış Uzmanı">Network Servisleri ve Güvenlik Satış Uzmanı</option>
                                                <option value="Network Servisleri ve Güvenlik Satış Uzmanı">Network Servisleri ve Güvenlik Satış Uzmanı</option>
                                                <option value="Network Servisleri ve Güvenlik Satış Uzmanı">Network Servisleri ve Güvenlik Satış Uzmanı</option>
                                                <option value="Network Servisleri ve Güvenlik Satış Uzmanı">Network Servisleri ve Güvenlik Satış Uzmanı</option>
                                            </select>
                                            <label for="position" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300">Pozisyon</label>
                                            <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                                            <i class="icon-angle-down text-[14px] leading-none text-white absolute right-0 bottom-[30px] pointer-events-none"></i>
                                        </div>
                                    </div>

                                    <div class="form-group reveal sm:col-span-2">
                                        <div class="w-full relative flex flex-col group/item">
                                            <input type="text" name="name" id="name" required minlength="2" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 text-[18px] font-light text-white pb-[16px] transition-all duration-300 peer [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                            <label for="name" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 translate-y-[40px] peer-focus:!translate-y-0 pointer-events-none">Adınız</label>
                                            <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                                        </div>
                                    </div>

                                    <div class="form-group reveal sm:col-span-2">
                                        <div class="w-full relative flex flex-col group/item">
                                            <input type="text" name="surname" id="surname" required minlength="2" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 text-[18px] font-light text-white pb-[16px] transition-all duration-300 peer [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                            <label for="surname" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 translate-y-[40px] peer-focus:!translate-y-0 pointer-events-none">Soyadınız</label>
                                            <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                                        </div>
                                    </div>

                                    <div class="form-group reveal sm:col-span-2">
                                        <div class="w-full relative flex flex-col group/item">
                                            <input type="email" name="email" id="email" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 text-[18px] font-light text-white pb-[16px] transition-all duration-300 peer [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                            <label for="email" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 translate-y-[40px] peer-focus:!translate-y-0 pointer-events-none">E-Posta</label>
                                            <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                                        </div>
                                    </div>

                                    <div class="form-group reveal sm:col-span-2">
                                        <div class="w-full relative flex flex-col group/item">
                                            <input type="text" name="phone" id="phone" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 text-[18px] font-light text-white pb-[16px] transition-all duration-300 peer [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                            <label for="phone" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 translate-y-[40px] peer-focus:!translate-y-0 pointer-events-none">Telefon</label>
                                            <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                                        </div>
                                    </div>

                                    <div class="form-group file-el col-span-2 reveal my-[12px]">
                                        <div class="file-field relative cursor-pointer h-full group/form">
                                            <input id="cv-file" type="file" class="file-with-name absolute z-20 left-0 top-0 w-full h-full cursor-pointer opacity-0">
                                            <div class="file-box h-full !translate-y-0">
                                                <div class="content relative p-[40px] flex flex-col gap-[8px] border border-dashed border-white/20 h-[calc(100%-1px)] duration-300 group-hover/form:border-white">
                                                    <div class="text-field flex gap-[10px] justify-center">
                                                        <p class="text text-[18px] md:text-[16px] leading-normal text-white font-bold tracking-[-0.18px] text-center">CV Yükleyin</p>
                                                        <i class="icon icon-upload-document text-[24px] text-white block leading-none duration-300"></i>
                                                    </div>
                                                    <p class="file-name text-[16px] font-light leading-normal text-white/50 text-center">Maksimum 5 Mb -.PDF -.JPG</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-el reveal group/form relative flex items-center gap-[20px] sm:col-span-2"> <!-- error için bu div'e class="error" eklenecek -->
                                        <input type="checkbox" id="app-form-checkbox" class="peer cursor-pointer absolute left-0 top-0 w-full h-full opacity-0 z-10">
                                        <div class="box relative shrink-0 w-[21px] aspect-square duration-300 before:absolute before:duration-450 peer-checked:before:!opacity-100 peer-checked:before:!scale-100 before:scale-0 before:opacity-0 before:left-[50%] before:top-[50%] before:translate-x-[-50%] before:translate-y-[-50%] before:w-[40%] before:h-[40%] before:bg-white border border-solid border-white/25 peer-hover:bg-primary-400/10 peer-hover:border-primary-400/50 peer-checked:!border-white group-[&.error]/form:border-red-500"></div>
                                        <label for="app-form-checkbox" class=" leading-normal duration-300 text-[15px] text-white font-light tracking-[-0.15px]">
                                            <a href="#popup-gdpr" class="inline-block relative z-20 text-white font-bold duration-300 decoration decoration-white underline" data-fancybox="">Aydınlatma Metni</a>'ni okudum ve kabul ediyorum.
                                        </label>
                                    </div>

                                    <div class="form-group flex justify-end sm:col-span-2 sm:justify-start">
                                        <button type="submit" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full">
                                            <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                                <span class="text-[16px] leading-none font-medium text-white transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2">Başvur</span>
                                                <span class="text-[16px] leading-none font-medium text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2">Başvur</span>
                                            </div>
                                            <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                                <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                                <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0"></i>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    <script>
        let fileWithName = document.querySelectorAll('.file-with-name');
        fileWithName.forEach(file => {
            file.addEventListener('change', function() {
                let fileName = this.files[0].name;
                let fileNameEl = document.querySelector('.file-el .file-name');
                fileNameEl.innerHTML = fileName;
            });
        });
    </script>

@endsection