<?php
    /**
     * Template Name: Archivo de Seguros
     * Description: Plantilla para mostrar el listado de seguros
     */
    get_header();
?>

<main class="w-screen editor-styles-wrapper">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-bold mb-4" style="color: #133251;">
                <?php post_type_archive_title('Nuestros ', ''); ?>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Descubre toda nuestra gama de productos de seguros de salud
            </p>
        </header>

        <div class="space-y-8">
            <?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
			                    <!-- Aquí va la estructura de cada tarjeta de seguro -->
			                    <article id="post-<?php the_ID(); ?>"<?php post_class('bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row transition-transform duration-300 hover:scale-[1.02]'); ?>>
			                        <!-- Thumbnail -->
			                        <div class="md:w-2/5">
			                            <?php if (has_post_thumbnail()): ?>
			                                <a href="<?php the_permalink(); ?>">
			                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
			                                </a>
			                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seguro-default.jpg" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
                            <?php endif; ?>
                        </div>

                        <!-- Contenido -->
                        <div class="p-6 md:w-3/5 flex flex-col justify-center">
                            <h2 class="text-2xl font-bold mb-3" style="color: #133251;">
                                <a href="<?php the_permalink(); ?>" class="hover:text-orange-500 transition-colors"><?php the_title(); ?></a>
                            </h2>

                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="flex items-center mr-6">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Por:                                                                                                                         <?php the_author(); ?>
                                </span>
                            </div>

                            <div class="text-gray-600 mb-4">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-orange-500 font-medium hover:text-orange-600 transition-colors">
                                Ver detalles
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
<?php else: ?>
                <p class="text-center text-gray-600">No se encontraron seguros.</p>
            <?php endif; ?>
        </div>

        <!-- Paginación -->
        <div class="mt-12 flex justify-center">
            <?php
                echo paginate_links([
                    'prev_text' => __('&laquo; Anterior'),
                    'next_text' => __('Siguiente &raquo;'),
                ]);
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>