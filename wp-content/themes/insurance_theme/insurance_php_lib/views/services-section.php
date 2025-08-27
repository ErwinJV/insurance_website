
   <?php

       /**
        * Servicios Section
        *
        * Muestra una sección de servicios con tarjetas que incluyen imagen, título, descripción e ícono.
        *
        * @package Insurance_Theme
        */

       $services = get_posts([
           'post_type'      => 'servicios-seguros',
           'posts_per_page' => -1,
       ]);

       foreach ($services as $key => $service) {
           $services[$key] = [
               'title'       => get_the_title($service->ID),
               'description' => get_the_excerpt($service->ID),
               'image'       => get_the_post_thumbnail_url($service->ID, 'large'),
               'icon'        => get_post_meta($service->ID, '_icono_seguro', true),
               'link'        => get_permalink($service->ID),
           ];
       }
   ?>


   <section class="w-full max-w-6xl mx-auto px-5 py-6" id="servicios">
        <!-- Encabezado -->
        <div class="text-center mb-20">
            <div class="mb-8">
                <span class="section-subtitle text-orange-500 font-bold text-lg tracking-wider">
                    SEGURIDAD FINANCIERA
                </span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">
                Nuestros <span class="section-title text-orange-500">Servicios</span>
            </h2>
            <p class="text-xl text-white max-w-3xl mx-auto mt-6">
                Protección integral diseñada para cada etapa de tu vida. Soluciones personalizadas para tu seguridad y bienestar financiero.
            </p>
        </div>

        <!-- Grid de tarjetas - 2 columnas en tablet y desktop -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">
            <!-- Tarjeta  -->
          <?php foreach ($services as $service): ?>

              <div class="service-card">
                <div class="overflow-hidden">
                    <img
                        src="<?php echo $service['image']; ?>"
                        alt="<?php echo $service['title']; ?>"
                        class="w-full h-full object-cover service-image"
                        loading="lazy"
                    >
                </div>
                <div class="p-10 flex-grow">
                    <div class="flex items-start">
                        <div class="service-icon flex items-center justify-center mr-7">
                            <i class="fa                                         <?php echo $service['icon']; ?> text-4xl text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold mb-5 text-gray-800"><?php echo $service["title"] ?></h3>
                            <p class="text-gray-600 mb-7 text-lg leading-relaxed">
                             <?php echo $service['description']; ?>
                            </p>
                            <a href="<?php echo $service['link']; ?>" class="learn-more text-orange-500 font-semibold text-lg">

                                Ver más

                            </a>
                        </div>
                    </div>
                </div>
            </div>

         <?php endforeach; ?>


        </div>

        <!-- CTA Final -->
        <div class="text-center mt-24">
            <div class="bg-white relative bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-12 shadow-2xl max-w-4xl mx-auto overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <div class="absolute -top-10 -left-10 w-40 h-40 rounded-full bg-white"></div>
                    <div class="absolute bottom-5 right-5 w-32 h-32 rounded-full bg-white"></div>
                    <div class="absolute top-1/3 right-1/4 w-24 h-24 rounded-full bg-white"></div>
                </div>
                <div class="relative z-10">
                    <h3 class="text-2xl md:text-4xl font-bold text-[#133251] mb-6">
                        <i class="fas fa-shield-alt mr-4"></i>Protege tu futuro hoy mismo
                    </h3>
                    <p class="text-[#133251] text-xl mb-10 max-w-2xl mx-auto">
                        Nuestros expertos te ayudarán a encontrar el seguro perfecto para tus necesidades específicas.
                    </p>
                    <button class=" hover:bg-orange-500 cursor-pointer  text-white bg-[#133251] font-bold py-5 px-14 rounded-full text-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-phone-alt mr-3"></i>Solicitar Asesoría Gratis
                    </button>
                    <div class="mt-8">
                        <!-- <span class="text-orange-500 text-sm flex items-center justify-center">
                            <i class="fas fa-star mr-2"></i>Más de 15 años protegiendo familias hispanas
                        </span> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
