
<?php
    $sliders = [1, 2, 3, 4, 5, 6];
?>


<section class=" bg-[url(/src/img/background-section-customers.webp)] bg-cover bg-right flex flex-col items-end  pt-12 ">

 <div class="container mx-auto  ">
    <h1 class="text-2xl md:text-4xl lg:text-6xl font-bold w-[290px] sm:w-[320px] px-8 ">Lo que opinan <span class="text-orange-500 uppercase">nuestros clientes</span></h1>
 </div>

  <div class="container mx-auto flex flex-col lg:flex-row  lg:items-end ">



  <div class="w-full lg:w-[60%] ">


  <div id="default-carousel" class="relative w-full h-[540px]" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[600px] overflow-hidden rounded-lg ">
      <?php foreach ($sliders as $slider): ?>
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out  " data-carousel-item >

          <div class="flex flex-col px-7">

            <p class="w-[320px] text-xl sm:text-2xl italic my-10 ">"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quo veniam animi amet do"</p>

            <div class="w-full flex ">
                <img  class="rounded-full w-[90px] h-[90px] sm:w-[240px] sm:h-[240px] me-[20px] sm:me-[70px]" src="<?php echo INSURANCE_RESOURCES_URI . "/img/customers-happy-2.jpg" ?>" />
                  <div class="flex flex-col justify-center">
                <span class="text-xl font-bold">Jhon Doe</span>
                 <span class="text-xl">Lorem Ipsum</span>
            </div>
            </div>



          </div>

        </div>
      <?php endforeach; ?>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
       <?php foreach ($sliders as $key => $slider): ?>
           <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="" data-carousel-slide-to="<?php echo $key + 1; ?>"></button>
       <?php endforeach; ?>


    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
  </div>

  </div>

   <div class="w-full lg:w-[40%] flex justify-center ">
      <img alt="elvis-jimenez" class="w-[580px]" src="<?php echo INSURANCE_RESOURCES_URI . "/img/elvis-jimenez.png" ?>" />
  </div>
  </div>
</section>