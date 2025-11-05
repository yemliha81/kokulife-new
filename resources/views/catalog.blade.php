@extends('layouts.main')

@section('content')


<?php   $pageTitle = $catalogGroup->title; 
        $breadcrumbImage = "career-breadcrumb.jpg"; 
        $breadcrumbVideo = "breadcrumb-video.mp4"; 
        $pageLink = "page-catalogs.php"; 
        $imageOrVideo = "video"; 
?>

<main class="main-field header-space">
    @include('partials.breadcrumb')
    
    <section class="content mt-[60px] mb-[180px] 2xl:mb-[130px] xl:mb-[100px] lg:mb-[75px] md:mb-[50px] xs:mb-[30px]">
        <div class="container max-w-[1650px]">
            <div class="flex flex-col gap-[50px] md:gap-[30px]">
                <div class="filters w-full flex items-center justify-between">
                    <div class="reveal separator pr-[80px] xl:pr-[50px] w-full xs:hidden">
                        <div class="w-full h-[1px] bg-black/8"></div>
                    </div>

                    <div class="item flex items-center gap-[20px] sm:w-full whitespace-nowrap">
                        <span class="reveal block text-[18px] lg:text-[16px] leading-[25px] font-light text-paragraph tracking-[-0.18px]">Markalar</span>
                        <div class="reveal custom-dropdown sm:w-full">
                            <div class="dropdown relative group/dropdown">
                                <div class="placeholder flex items-center justify-between px-[32px] lg:px-[20px] py-[18px] border border-solid border-black/10 cursor-pointer transition-all duration-300 hover:border-black/30 group-[&.dropdown-active]">
                                    <span class="text-[16px] lg:text-[15px] leading-[25px] font-medium text-black tracking-[-0.16px] transition-all duration-300 block mr-[8px]">Tümünü Gör</span>
                                    <i class="icon-angle-down text-[12px] text-black leading-none transition-all duration-300 group-[&.active]/dropdown:rotate-180"></i>
                                </div>
                                <div class="dropdown-list w-full bg-white border border-solid border-black/10 overflow-hidden absolute left-0 z-10 transition-all duration-300 opacity-0 pointer-events-none group-[&.active]/dropdown:opacity-100 group-[&.active]/dropdown:pointer-events-auto">
                                    <ul class="flex flex-col gap-[10px] overflow-hidden [&_li]:px-[5px] [&_li]:py-[15px] [&_li]:block hover:[&_li]:bg-black/5 [&_li]:text-[15px] [&_li]:leading-none [&_li]:font-medium [&_li]:text-paragraph [&_li]:transition-all [&_li]:duration-300 hover:[&_li]:text-primary-main [&_li]:w-full [&_li]:text-center [&_li]:cursor-pointer">
                                        <li>A Markası</li>
                                        <li>B Markası</li>
                                        <li>C Markası</li>
                                        <li>D Markası</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="categories w-full flex flex-col gap-[70px] xl:gap-[50px] md:gap-[35px]">
                    <?php foreach ($catalogGroup->catalogs as $catalog): ?>
                    <div class="item flex flex-col gap-[30px] xsm:gap-[20px] sm:!border-b sm:border-0 sm:border-solid sm:border-b-black/10 last:sm:border-b-0 sm:pb-[30px] last:sm:pb-0">
                        <h2 class="reveal text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.32px] font-light text-secondary-main"><?= $catalog->title ?></h2>
                        <div class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xsm:grid-cols-1 gap-[30px]">
                            <?php foreach ($catalog->files as $key => $item): ?>
                            <div class="<?= $key <= 3 ? 'reveal' : '';  ?> item w-full flex flex-col group/item">
                                <a href="<?=env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder', 'catalog_files_folder'], app()->getLocale()) .'/'. $item['file'] ?>" class="block image-wrapper w-full h-[220px] relative group/gallery overflow-hidden" data-fancybox="catalog-1">
                                    <img src="<?=env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder', 'catalog_files_folder'], app()->getLocale()) .'/'. $item['image'] ?>" alt="Katalog Görsel" width="390" height="219" class="w-full h-full object-cover transition-transform duration-450 group-hover/item:scale-105">
                                </a>
                                <a href="<?=env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder', 'catalog_files_folder'], app()->getLocale()) .'/'. $item['file'] ?>" download class="bottom flex items-center group">
                                    <p class="text-[16px] lg:text-[15px] leading-[28px] font-medium text-paragraph tracking-[-0.16px] transition-all duration-300 bg-[#F0EEE7] min-h-[73px] h-full p-[30px] xl:p-[15px] w-full group-hover:min-md:bg-secondary-main group-hover:min-md:text-white inline-flex items-center"><?= $item['title'] ?></p>
                                    <div class="min-w-[73px] min-h-[73px] h-full aspect-square grid place-items-center bg-primary-main/10 transition-all duration-300 group-hover:min-md:bg-primary-main">
                                        <i class="icon-download-shape text-[22px] leading-none text-paragraph/65 transition-all duration-300 group-hover:min-md:text-white"></i>
                                    </div>
                                </a>
                            </div>

                            <?php endforeach; ?>
                        </div>
                        <div class="see-all grid place-items-center">
                            <a href="#" class="text-[16px] leading-[32px] md:text-[15px] text-[#888888] hover:text-secondary-main/90 font-light inline-flex items-center gap-[14px] transition-all duration-300">Tümünü Gör <i class="icon-angle-down text-[12px]"></i></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>
</main>

@endsection