@extends('layouts.main')

@section('content')
    <main class="main-field header-space career-page">
    <?php
        $pageTitle = $career->title;
        $breadcrumbImage = "career-breadcrumb.jpg";
        $breadcrumbVideo = "breadcrumb-video.mp4";
        $pageLink = "page-career.php";
        $imageOrVideo = "image";
        
    ?>
    @include('partials.breadcrumb')
    <section class="content">
        <section class="career relative mb-[150px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] mt-[130px] xl:mt-[90px] ">
            <img src="../assets/image/static/vectorel.svg" alt="Vektör" width="387" height="588" class="pointer-events-none absolute top-1/2 -translate-y-1/2 right-0 ">
            <div class="container max-w-[1650px]">
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-full pr-[76px] xl:pr-[50px] lg:pr-[25px] md:p-0">
                        <div class="image-wrapper reveal w-full h-[650px] xl:h-[530px] sm:h-[400px] relative">
                            <img src="<?=env('HTTP_DOMAIN').'/'.getFolder(['uploads_folder', 'images_folder'], app()->getLocale()).'/'.$career->image ?>" alt="Kariyer" width="793" height="651" class="w-full h-full object-cover relative z-2">
                            <div class="bg-primary-main absolute -top-[38px] sm:-top-[20px] -right-[38px] sm:-right-[20px] w-[421px] sm:w-[320px] aspect-square"></div>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-full pl-[76px] xl:pr-[50px] lg:pr-[25px] md:p-0 md:mt-[30px]">
                        <div class="flex flex-col text-editor reveal">
                            <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[5px]"><?=$career->upper_title?></span>
                            <h2 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[80px] 2xl:mb-[50px] xl:mb-[30px] xs:mb-[20px]">
                                <?=$career->title?>
                            </h2>
                            <p class="text-[22px] lg:text-[18px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.22px] text-paragraph mb-[30px] xs:mb-[20px]"><?=$career->title_1?></p>
                            <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[30px]">
                                <?=$career->description?>
                            </p>

                            <div class="flex items-center justify-center relative w-max overflow-hidden main-button group cursor-pointer scrollable-selector sm:w-full" data-scrollable-section="#positions">
                                <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-full before:h-0 before:translate-y-[-100px] group-hover:before:min-md:h-full group-hover:before:min-md:translate-y-0 before:bg-primary-main before:transition-all before:duration-500">
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-y-[-100px] opacity-0 group-hover:min-md:translate-y-0 group-hover:opacity-100 w-0 whitespace-nowrap relative z-2"><?= $career->button_text ?></span>
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-y-[100px] group-hover:min-md:opacity-0 relative z-2"><?= $career->button_text ?></span>
                                </div>
                                <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                    <i class="icon-angle-down text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-y-[-100px] opacity-0 group-hover:min-md:translate-y-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                    <i class="icon-angle-down text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-y-[100px] group-hover:min-md:opacity-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="career-slider-area overflow-hidden md:bg-secondary-main mb-[200px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] relative">
            <div class="max-w-[1920px] mx-auto relative overflow-hidden">
                <div class="container max-w-[1800px]">
                    <div class="bg-primary-main absolute -z-[1] -bottom-[90px] xl:-bottom-[60px] lg:-bottom-[20px] -right-0 max-w-[440px] [@media(max-width:1780px)_and_(min-width:1441px)]:max-w-[400px] xl:max-w-[360px] w-full h-[426px] md:hidden"></div>
                    <div class="wrapper min-sm:overflow-hidden bg-secondary-main md:bg-transparent p-[50px] pl-[105px] xl:pl-[80px] lg:pl-[30px] lg:p-[30px] sm:p-[20px_0] relative">
                        <img src="../assets/image/static/vectorel-2.svg" alt="Vektör" width="610" height="535" class="reveal max-w-[610px] xl:max-w-[500px] sm:max-w-full sm:w-full h-auto absolute z-2 pointer-events-none left-1/2 top-1/2 sm:top-[30px] -translate-x-1/2 min-sm:-translate-y-1/2">
                        <div class="sector-slider reveal overflow-hidden relative z-4">
                            <div class="swiper-wrapper">
                                <?php foreach ($careerSlider as $key => $item) { ?>
                                    <div class="swiper-slide overflow-hidden" data-slide-name="<?= $item->title ?>" data-slide-id="<?= $key + 1 ?>">
                                        <div class="item w-full grid grid-cols-2 sm:grid-cols-1 items-end gap-[200px] 2xl:gap-[160px] xl:gap-[100px] lg:gap-[60px] md:gap-[30px]">
                                            <div class="left mb-[90px] 2xl:mb-[60px] xl:mb-[45px] lg:mb-[30px] md:mb-0">
                                                <span class="block mb-[50px] md:mb-[30px] text-[16px] leading-[32px] font-light text-white opacity-65 tracking-[7.2px]">{{$item->upper_title }}</span>
                                                <div class="flex flex-col gap-[30px] sm:gap-[20px] text-editor">
                                                    <h3 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white [&_span]:font-bold">{{$item->title }}</h3>
                                                    <p class="text-[17px] md:text-[16px] sm:text-[15px] leading-[32px] sm:leading-[28px] font-light text-white mb-[20px] sm:mb-[5px]">{{$item->description }}</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="image-wrapper w-full h-[500px]  xl:h-[450px] sm:h-[320px]  xsm:mt-[40px]">
                                                    <img src="<?=env('HTTP_DOMAIN').'/'.getFolder(['uploads_folder', 'images_folder'], app()->getLocale()).'/'.$item->image ?>" alt="<?= $item->title ?>" width="745" height="535" class="w-full h-full object-cover" data-swiper-parallax="50%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-navigation flex items-end gap-[112px] pt-[40px] xsm:pt-[20px] xs:pt-0 pb-[20px] md:pb-[40px] lg:gap-[50px] pl-[95px] 2xl:pl-[45px] xl:pl-0 pr-[85px] xl:pr-0 relative z-5 xsm:absolute xsm:bottom-[370px] xs:bottom-[360px] xsm:w-[calc(100%-60px)] xsm:p-0">
                        <div class="reveal sector-pagination flex items-center gap-[30px] xl:gap-[20px] xsm:gap-[15px] xs:gap-[10px] [&_.swiper-pagination-bullet]:!max-w-[192px] xsm:hidden"></div>
                        <div class="reveal nav-buttons pb-[5px] flex items-center gap-[30px] sm:hidden">
                            <div class="sector-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                                <span class="text-[16px] leading-[32px] text-white md:hidden"><?=getStaticText(2)?></span>
                            </div>

                            <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                            <div class="sector-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <span class="text-[16px] leading-[32px] text-white md:hidden"><?=getStaticText(3)?></span>
                                <i class="icon-angle-right text-[12px] leading-none text-white "></i>
                            </div>
                        </div>
                        <div class="swiper-scrollbar hidden xsm:block bg-white/15 [&_.swiper-scrollbar-drag]:bg-white relative left-0 w-full">
                            <div class="swiper-scrollbar-drag relative flex flex-col-reverse items-center">
                                <span class="block mb-[10px] text-white text-[13px] whitespace-nowrap pointer-events-none" id="scrollbar-name"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="position-section mb-[130px] xl:mb-[100px] lg:mb-[75px] md:mb-[50px]" id="positions">
            <div class="container max-w-[1650px]">
                <h3 class="reveal text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-center w-full text-secondary-main mb-[50px] xl:mb-[30px] xs:mb-[20px]">
                    Kokulife <br>
                    <span class="font-bold">Pozisyonlar</span>
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-1 gap-[30px]">
                    <?php foreach ($careerJobs as $item) { ?>
                            <div class="item reveal p-[50px] lg:p-[30px] relative bg-[#F0EEE7] transition-all duration-500 hover:min-md:bg-secondary-main group/item overflow-hidden">
                                <img src="../assets/image/static/career-box-vector.svg" alt="Vektör" width="457" height="401" class="h-full w-auto absolute z-2 top-1/2 -translate-y-1/2 right-0 transition-all duration-500 group-hover/item:min-md:opacity-0">
                                <img src="../assets/image/static/career-box-vector-hover.svg" alt="Vektör" width="457" height="401" class="h-full w-auto absolute z-2 top-1/2 -translate-y-1/2 right-0 transition-all duration-500 opacity-0 group-hover/item:min-md:opacity-100">
                                <div class="content flex flex-col relative z-3">
                                    <h3 class="text-[30px] xl:text-[24px] md:text-[20px] leading-[38px] md:leading-[30px] font-medium text-paragraph/80 tracking-[-0.3px] mb-[30px] xs:mb-[20px] transition-all duration-300 group-hover/item:min-md:text-white">
                                        <a href="<?= env('HTTP_DOMAIN') .'/'. getUrl('career_url') . '/' . $item['seo_url'] ?>"><?= $item['title'] ?></a>
                                    </h3>
                                    <p class="text-[18px] xl:text-[16px] leading-[32px] font-light text-paragraph/80 transition-all duration-300 group-hover/item:min-md:text-white line-clamp-3"><?= $item['description'] ?></p>
                                    <div class="buttons flex sm:flex-col items-center gap-[20px] mt-[80px] xl:mt-[60px] lg:mt-[40px]">
                                        <a href="<?= env('HTTP_DOMAIN') .'/'. getUrl('career_url') . '/' . $item['seo_url'] ?>" class="flex items-center justify-center relative w-max sm:w-full overflow-hidden main-button group">
                                            <div class="left px-[66px] xs:px-[20px] group-hover:min-md:px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-paragraph/16 group-hover/item:min-md:border-white/16 group-hover:min-md:border-primary-main transition-all duration-300 group-hover:min-md:bg-primary-main sm:w-full">
                                                <span class="text-[16px] leading-none font-medium text-paragraph transition-all duration-300 tracking-[-0.16px] group-hover/item:min-md:text-white group-hover:min-md:text-white"><?=getStaticText(5)?></span>
                                            </div>
                                            <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] border border-solid border-transparent transition-all duration-300 opacity-0 w-0 group-hover:min-md:w-[56px] group-hover:min-md:px-[24px] group-hover:min-md:border-[#9D8D5D] group-hover:min-md:opacity-100 h-[58px]">
                                                <i class="icon-angle-right text-[12px] leading-none text-white"></i>
                                            </div>
                                        </a>

                                        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection