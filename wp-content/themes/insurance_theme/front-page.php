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

<?php echo do_shortcode("[hero_section]") ?>


<!-- SERVICES SECTION -->

<?php require INSURANCE_VIEWS_PATH . '/services-section.php'; ?>


<?php

    echo do_shortcode('[seccion_ventajas]');
?>


 <!-- CUSTOMERS OPINION -->


<?php echo do_shortcode('[testimonios]'); ?>

  <!-- CONTACT FORM -->
  <div class="h-16"></div>
<?php
    echo do_shortcode("[seccion_contacto]");
?>


<div class="h-16"></div>
<!-- SERVICES SLIDER -->


<?php get_footer()?>

