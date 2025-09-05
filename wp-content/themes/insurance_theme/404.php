<?php
    /**
     * The template for displaying 404 pages (not found)
     *
     * @package WordPress
     * @subpackage Insurance
     * @since Insurance 1.0
     */

    get_header();
?>


    <!-- Contenido principal 404 -->
    <main class="flex-grow flex justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 text-center">
            <div>
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-9xl font-extrabold text-white">404</h2>
                <p class="mt-4 text-2xl font-medium text-white">Página no encontrada</p>
                <p class="mt-2 text-lg text-white">Lo sentimos, no pudimos encontrar la página que estás buscando.</p>
            </div>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center">
                <a href="/" class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#133251] hover:bg-[#0f2a43] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#133251] transition-colors">
                    Volver al inicio
                </a>

            </div>
            <!-- <div class="pt-8">
                <div class="bg-gray-100 p-6 rounded-lg">
                    <h3 class="text-lg font-medium text-[#133251] mb-2">¿Necesitas ayuda?</h3>
                    <p class="text-gray-600 mb-4">Nuestros agentes están disponibles para asistirte</p>
                    <div class="flex items-center justify-center space-x-2 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>(123) 456-7890</span>
                    </div>
                </div>
            </div> -->
        </div>
    </main>


<?php get_footer(); ?>
