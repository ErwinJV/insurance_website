<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();

    $sliders = [1, 2, 3, 4, 5, 6];

    $services = [1, 2, 3, 4, 5, 6, 7, 8, 9];

?>

<!-- MAIN SECTION -->
<main class="w-full h-screen bg-cover bg-[url(/src/img/insurance-hero-background.jpg)]">
   <div class="container mx-auto h-ful flex items-center ">

     <div class="flex flex-col lg:flex-row lg:items-center mt-36">



        <div class="flex flex-col lg:justify-center text-white p-2 sm:p-0 w-full lg:!w-[30%] h-full lg:h-auto ">
           <h1 class="font-bold text-4xl lg:text-6xl mb-1">Lorem ipsum sit <span class="text-green-500">amet</span></h1>
           <h3 class="font-semibold text-2xl lg:text-3xl">Lorem ipsum sit amet</h3>
           <p class="mt-2 text-lg lg:text-xl">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ab voluptatibus, fugiat impedit ut vel non laudantium ad deleniti magnam veniam dolores nostrum quas nulla cupiditate aliquid architecto velit quam?
           </p>
        </div>

        <div class="hidden lg:flex  lg:justify-center text-white p-2 sm:p-0   lg:w-[70%] ">
        </div>

     </div>

   </div>

</main>


 <!-- CUSTOMERS OPINION -->

<section class="w-screen h-screen">
  <div class="container mx-auto flex flex-col lg:flex-row lg:items-center h-full ">

  <div class="w-full lg:w-[60%] bg-rose-600 p-7">


<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[600px] overflow-hidden rounded-lg ">
      <?php foreach ($sliders as $slider): ?>
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out " data-carousel-item >

          <div class="flex flex-col p-7">

            <p class="w-[320px] text-2xl italic my-10 ">"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quo veniam animi amet do"</p>

            <div class="w-full flex  ">
                <img  class="rounded-full w-[240px] h-[240px] me-[70px]" src="<?php echo INSURANCE_RESOURCES_URI . "/img/customers-happy-2.jpg" ?>" />
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

   <div class="w-full lg:w-[40%] p-2">

  </div>
  </div>
</section>





<section class=" bg-gray-400">


  <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
      <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
        <div class="md:5/12 lg:w-5/12">
          <img src="https://images.unsplash.com/photo-1554774853-719586f82d77?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D
" alt="image" loading="lazy" width="" height="">
        </div>
        <div class="md:7/12 lg:w-6/12">
          <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Lorem ipsum sit amet sit amet consectetur adipisicing elit. Eum omnis </h2>
          <p class="mt-6 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum omnis voluptatem accusantium nemo perspiciatis delectus atque autem! Voluptatum tenetur beatae unde aperiam, repellat expedita consequatur! Officiis id consequatur atque doloremque!</p>
          <p class="mt-4 text-gray-600"> Nobis minus voluptatibus pariatur dignissimos libero quaerat iure expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.</p>
        </div>
      </div>
  </div>

</section>


<section class= " w-full h-screen bg-[url(/src/img/insurance-body-background.jpg)] bg-cover" >


</section>


  <!-- CONTACT FORM -->
<section id="contact-form" class="w-screen container flex justify-center items-center sm:bg-white mx-auto sm:p-5">

<div class="flex flex-col lg:flex-row w-full p-12 bg-[url(/src/img/contact-background.jpg)] bg-right lg:bg-[position:none] bg-cover min-h-[570px] sm:rounded-xl ">
    <div class="w-full lg:w-[45%] h-full ">
       <h2 class="text-blue-900 font-bold text-2xl">LOREM</h2>
       <p class="text-white font-bold text-4xl">Lorem ipsum sit amet asicpiscis: <span class="text-blue-900 font-bold">quorum no eta</span></p>

       <p class="text-white my-5 ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque praesentium ab facilis optio qui ut aliquam officiis necessitatibus beatae veniam esse vel, sit repellat quasi id maiores. Distinctio, quae dolores!</p>
    </div>

    <div class="w-full lg:w-[45%] h-full flex justify-center">
     <?php
         echo do_shortcode('[contact-form-7 id="f573abe" title="Contáctanos"]');
     ?>

    </div>
</div>



</section>


<section >

      <div class="container mx-auto py-14 flex flex-col space-y-2.5">
 <!-- Contenedor del Carousel -->
  <h1 class="text-5xl  my-4 ">Lorem ipsum sit amet</h1>

  <h2 class="text-5xl font-bold text-orange-500">sit emen adespius sou deus sue</h2>
       </br>
        </br>
         </br>
        <div class="swiper-container w-full max-w-6xl mx-auto ">

            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                     <?php foreach ($services as $service): ?>
                    <div class="swiper-slide !w-auto">
                        <div class="card bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-xs">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                     alt="Lorem Sit amet"
                                     class="w-full h-72 object-cover ">
                              <div class="absolute  w-[90%] top-4 left-4 flex flex-col space-y-2">

                                <span class=" w-full text-orange-500 px-3 py-1  text-2xl  font-bold  bg-black/40 d">
                                    Lorem ipsum sit amet
                                </span>
                                  <span class="h-[20px]"></span>
                                  <span class=" w-full  text-white px-3 py-1  text-4xl  font-bold  bg-black/40">
                                    Lorem ipsum sit amet
                                </span>
                              </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Lorem ipsum amet</h3>
                                <p class="text-gray-600 mb-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. In cupiditate distinctio, nesciunt asperiores debitis magni, error maiores ducimus reprehenderit voluptatibus fugiat odio accusamus quod delectus quos numquam. Ullam, neque iusto?
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-indigo-600 font-medium">Leer más</span>
                                    <!-- <div class="flex space-x-1 text-yellow-400">

                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

                <!-- Controles del Carousel -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
       </div>

</section>


<?php get_footer()?>

