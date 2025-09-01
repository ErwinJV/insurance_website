<?php
    /**
     * Template Name: Front Page
     */

?>
<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();

?>

<!-- MAIN SECTION -->

<?php require INSURANCE_VIEWS_PATH . "/hero-section.php"; ?>


<!-- SERVICES SECTION -->

<?php require INSURANCE_VIEWS_PATH . '/services-section.php'; ?>
<?php
    // require INSURANCE_VIEWS_PATH . "/advantages-section.php";
?>

<?php
    echo do_shortcode('[seccion_ventajas]');
?>


 <!-- CUSTOMERS OPINION -->

<?php
    //require INSURANCE_VIEWS_PATH . "/customers-opinion.php";
?>

<?php echo do_shortcode('[testimonios]'); ?>




<!--
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

</section> -->


<!-- <section class= " w-full h-screen bg-[url(/src/img/insurance-body-background.webp)] bg-cover" >


</section> -->


  <!-- CONTACT FORM -->
  <div class="h-16"></div>
<?php require INSURANCE_VIEWS_PATH . "/contact-form-section.php"; ?>

<div class="h-16"></div>
<!-- SERVICES SLIDER -->

<?php
    // require INSURANCE_VIEWS_PATH . "/services-slider.php";
?>




<?php get_footer()?>

