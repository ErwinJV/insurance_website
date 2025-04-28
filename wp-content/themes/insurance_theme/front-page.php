<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();

?>

<!-- MAIN SECTION -->
<main class="w-full h-[100vh] bg-cover bg-[url(/src/img/bg-main-front-page.jpg)]">
   <div class="container mx-auto h-full">

     <div class="grid grid-cols-1 lg:grid-cols-3 h-full">

        <div class="hidden lg:inline lg:col-span-2">
        </div>

         <div class="flex flex-col justify-end lg:justify-center text-white p-2 sm:p-0 ">
           <h1 class="font-bold text-4xl lg:text-6xl mb-1">Lorem ipsum sit amet</h1>
           <h3 class="font-semibold text-2xl lg:text-3xl">Lorem ipsum sit amet</h3>
           <p class="mt-2 text-lg lg:text-xl">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ab voluptatibus, fugiat impedit ut vel non laudantium ad deleniti magnam veniam dolores nostrum quas nulla cupiditate aliquid architecto velit quam?
           </p>
        </div>

     </div>

   </div>

</main>


 <!-- CUSTOMERS OPINION -->

<section class="w-full h-screen select-none" >

<div class="container flex flex-col justify-center items-center w-full h-full my-auto mx-auto py-3">

 <h1 class="text-4xl uppercase self-start font-bold">#clientesfelices</h1>


    <div class="w-[80%] h-auto">
         <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide relative ">

           <img class="h-full w-full" src="<?php echo "https://images.unsplash.com/photo-1556740738-b6a63e27c4df?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" ?>" alt="">

             <div class="absolute left-1.5 bottom-1 flex flex-col items-start space-y-4 z-10">
               <span class="p-2 bg-white rounded-xl font-bold text-xs lg:text-lg  2xl:text-xl">
               Lorem ipsum, sit amet
              </span>
              <span class="bg-black p-3 text-white text-sm lg:text-xl 2xl:text-2xl font-bold rounded-xl w-[auto] ">
               "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis delectus amet"
              </span>
             </div>

          </div>

           <div class="swiper-slide relative">

             <img class="h-full w-full" src="<?php echo "https://images.unsplash.com/photo-1556740738-b6a63e27c4df?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" ?>" alt="">

             <div class="absolute left-1.5 bottom-1 flex flex-col items-start space-y-4 z-10">
               <span class="p-2 bg-white rounded-xl font-bold text-xs lg:text-lg  2xl:text-xl">
               Lorem ipsum, sit amet
              </span>
              <span class="bg-black p-3 text-white text-sm lg:text-xl 2xl:text-2xl font-bold rounded-xl w-[auto] ">
               "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis delectus amet"
              </span>
             </div>

          </div>
        </div>
        <!-- If we need pagination -->
        <!-- <div class="swiper-pagination"></div> -->

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
      </div>
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


  <!-- CONTACT FORM -->
<section id="contact-form" class="w-full h-[100vh] flex justify-center items-center bg-black sm:bg-white">
<div class="container xl:w-[80%] 2xl:w-[90%] bg-[url(/src/img/bg-contact-form.jpg)] mx-auto rounded-xl">
 <div class="grid grid-cols-1 lg:grid-cols-2 text-white rounded-lg">

    <div class="hidden lg:flex">
    </div>

    <div class="flex flex-col items-center space-y-2 p-3 bg-black lg:rounded-r-xl">
      <h1 class="text-2xl sm:text-3xl md:text-4xl mb-5 font-bold">Contáctanos</h1>

      <?php
          wp_nav_menu([
              'theme_location' => 'social_links',
              'container_id'   => 'social-links-contact',
              'menu_id'        => 'social-links-contact-menu',
              'menu_class'     => 'flex space-x-5 mt-5',
          ]);
      ?>

       <?php
           echo do_shortcode('[contact-form-7 id="f573abe" title="Contáctanos"]');
       ?>
    </div>


 </div>
</div>



</section>


<?php get_footer()?>

