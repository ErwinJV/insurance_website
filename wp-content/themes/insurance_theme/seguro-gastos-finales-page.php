<?php
    /**
     * Template Name: Seguro de gastos finales
     */
?>
<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();

?>

<div id="pad-nav"></div>

<?php require INSURANCE_VIEWS_PATH . '/gastos-finales-hero-section.php'; ?>
<?php require INSURANCE_VIEWS_PATH . "/gastos-finales-info.php"?>
<?php require INSURANCE_VIEWS_PATH . "/gastos-finales-info-metricas.php"?>
<?php require INSURANCE_VIEWS_PATH . "/testimonials-section.php"?>
<div class="h-10"></div>
<?php require INSURANCE_VIEWS_PATH . "/contact-form-section.php"?>
<div class="h-10"></div>
<?php require INSURANCE_VIEWS_PATH . "/consejos-gastos-finales-section.php"?>
<div class="h-10"></div>
<?php get_footer()?>