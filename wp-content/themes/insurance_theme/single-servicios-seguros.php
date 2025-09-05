<?php

    /**
     * Template Name: Servicio de Seguros
     */
?>

<?php get_header(); ?>


  <!-- Hero Section con imagen de fondo -->
    <section class="relative  py-16 md:py-20" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>') !important; background-size: cover; background-position: center; width: 100%;">
        <!-- Overlay para mejorar la legibilidad del texto -->
        <div class="absolute inset-0 bg-[#133251]/60     bg-opacity-80"></div>

        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <?php echo get_the_title(); ?></h1>
                <p class="text-xl mb-8 text-white"><?php echo get_the_excerpt(); ?></p>
                <a href="#contacto" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:translate-x-2">
                    Contactar ahora
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Elementos decorativos -->
            <!-- <div class="absolute bottom-0 left-0 w-32 h-32 bg-orange-500 opacity-20 rounded-full -translate-x-12 translate-y-12 hidden md:block"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-orange-500 opacity-20 rounded-full translate-x-12 -translate-y-12 hidden md:block"></div> -->

            <!-- Iconos temáticos -->
            <div class="absolute left-10 top-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-chart-line text-white text-6xl"></i>
            </div>
            <div class="absolute right-10 bottom-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-shield-alt text-white text-6xl"></i>
            </div>
        </div>
    </section>



<?php
     $slug = get_post_field('post_name', get_post());

     echo do_shortcode('[beneficios_seguro tipo_seguro="'. $slug .'" numero_ventajas="20"]');
     echo do_shortcode('[como_funciona_seguro tipo_seguro="' . $slug . '" titulo_seccion="¿Cómo funciona el Seguro"]');
     echo do_shortcode('[consejos_seguro tipo_seguro="' . $slug . '" numero_consejos="20"]');
       
?>

<?php echo do_shortcode('[testimonios]'); ?>

  <!-- CONTACT FORM -->
  <div class="h-16"></div>
<?php
    echo do_shortcode("[seccion_contacto]");
?>


<div class="h-16"></div>


<?php get_footer(); ?>
