<?php

    get_header();
?>

<main class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="bg-[#133251] text-white py-16 px-4">
        <div class="container mx-auto max-w-6xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Nuestro Blog</h1>
            <p class="text-xl max-w-3xl mx-auto">Artículos y noticias sobre seguros y protección</p>
        </div>
    </section>

    <!-- Posts Section -->
    <section class="container mx-auto max-w-6xl py-12 px-4">
        <div class="grid grid-cols-1 gap-8">
            <?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
							                    <article id="post-<?php the_ID(); ?>"<?php post_class('bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row transition-all duration-300 hover:shadow-xl'); ?>>
							                        <!-- Featured Image -->
							                        <div class="md:w-2/5">
							                            <?php if (has_post_thumbnail()): ?>
							                                <a href="<?php the_permalink(); ?>">
							                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-64 md:h-full object-cover']); ?>
							                                </a>
							                            <?php else: ?>
                                <div class="w-full h-64 md:h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6 md:w-3/5 flex flex-col justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-3 text-[#133251] hover:text-orange-500 transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
                                        Por:                                                                                                                                                                                                                                                                                                                     <?php the_author(); ?>
                                    </span>
                                </div>

                                <div class="text-gray-600 mb-4">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                            <div>
                                <!-- Categories -->
                                <?php
                                    $categories = get_the_category();
                                    if (! empty($categories)):
                                ?>
                                    <div class="mb-4">
                                        <span class="text-sm font-medium text-[#133251]">Categorías:</span>
                                        <div class="flex flex-wrap gap-2 mt-1">
                                            <?php foreach ($categories as $category): ?>
                                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="text-xs px-3 py-1 bg-gray-100 text-[#133251] rounded-full hover:bg-orange-500 hover:text-white transition-colors">
                                                    <?php echo esc_html($category->name); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Read More Button -->
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-4 py-2 bg-[#133251] text-white rounded-lg hover:bg-orange-500 transition-colors">
                                    Leer más
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
<?php else: ?>
                <div class="text-center py-12">
                    <h3 class="text-2xl font-bold text-[#133251] mb-4">No hay artículos disponibles</h3>
                    <p class="text-gray-600">Pronto publicaremos nuevo contenido.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
                echo paginate_links([
                    'prev_text' => '<span class="flex items-center px-4 py-2 bg-white text-[#133251] border border-gray-300 rounded-lg mr-2 hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-colors">« Anterior</span>',
                    'next_text' => '<span class="flex items-center px-4 py-2 bg-white text-[#133251] border border-gray-300 rounded-lg ml-2 hover:bg-orange-500 hover:text-white hover:border-orange-500 transition-colors">Siguiente »</span>',
                    'mid_size'  => 2,
                ]);
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>