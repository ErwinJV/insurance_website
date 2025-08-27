<?php get_header(); ?>

    <!-- Artículo -->
        <article class="bg-white rounded-lg shadow-md overflow-hidden editor-styles-wrapper">
            <!-- Cabecera del post -->
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-2xl md:text-3xl font-bold mb-4" style="color: #133251;">
                    <?php the_title(); ?>
                </h2>

                <div class="flex flex-wrap items-center text-sm text-gray-600">
                    <span class="flex items-center mr-6 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </span>

                    <span class="flex items-center mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <?php the_author(); ?>
                    </span>
                </div>
            </div>

            <!-- Contenido del post -->
            <div class="prose max-w-none p-6">
                <?php the_content(); ?>
            </div>

            <!-- Elemento decorativo con los colores de la marca -->
            <div class="h-2 w-full bg-orange-500"></div>
        </article>

        <!-- Enlace para volver atrás -->
        <div class="mt-8">
            <a href="<?php echo home_url(); ?>" class="inline-flex items-center text-orange-500 hover:text-orange-600 font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al inicio
            </a>
        </div>
    </div>

    <?php get_footer(); ?>