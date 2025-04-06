<?php get_header()?>

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
              'menu_class'     => 'flex  space-x-5 mt-5',
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

