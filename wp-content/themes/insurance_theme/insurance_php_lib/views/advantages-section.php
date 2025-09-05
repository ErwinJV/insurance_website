
  <?php

      $advantages = [
          [
              'icon'        => 'fas fa-shield-alt',
              'title'       => 'Cobertura Integral',
              'description' => 'Planes de seguros que protegen todos los aspectos importantes de tu vida, desde salud hasta patrimonio, con amplias garantías y mínimas exclusiones.',
              'link'        => '#',
          ],
          [
              'icon'        => 'fas fa-headset',
              'title'       => 'Atención Personalizada',
              'description' => 'Servicio bilingüe con seguimiento continuo. Estoy disponible para resolver tus dudas, gestionar reclamos y ajustar tu cobertura según cambien tus necesidades.',
              'link'        => '#',
          ],
          [
              'icon'        => 'fas fa-sliders-h',
              'title'       => 'Planes Flexibles',
              'description' => 'Soluciones adaptables a cualquier presupuesto, con opciones de pago y cobertura que se ajustan a tu situación financiera actual y futura.',
              'link'        => '#',
          ],
          [
              'icon'        => 'fas fa-chart-line',
              'title'       => 'Asesoría Experta',
              'description' => 'Conocimiento especializado en productos de seguros para la comunidad hispana. Te guío para tomar decisiones informadas que protejan tu futuro financiero.',
              'link'        => '#',
          ],

      ];
  ?>


  <section class="w-full px-4 py-12 bg-[url(/src/img/advantages-section-bg.webp)] bg-cover bg-fixed text-[#133251]">
      <div class="container mx-auto ">
          <!-- Contenedor de dos columnas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Columna izquierda: Titulo, eslogan y botón -->
            <div class="lg:pr-8">
                <span class="text-orange-500 font-bold text-lg tracking-wider mb-4 inline-block">
                    <i class="fas fa-star mr-2"></i>VALOR AÑADIDO
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6  leading-tight">
                    Por qué elegir a <span class="text-orange-500">Elvis Jimenez</span> como tu <span class="highlight">agente de seguros</span>
                </h2>
                <p class="text-xl mb-8 leading-relaxed">
                    Más de 15 años de experiencia protegiendo a familias hispanas con soluciones personalizadas que se adaptan a sus necesidades y presupuesto.
                </p>

                <div class="bg-orange-50 border-l-4 border-orange-500 rounded-lg p-6 mb-10">
                    <p class="text-gray-700 italic mb-3">
                        <i class="fas fa-quote-left text-orange-300 mr-2"></i>
                        Mi compromiso es brindarte tranquilidad financiera con coberturas que realmente protegen lo que más valoras.
                    </p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center mr-3">
                            <i class="fas fa-user text-orange-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold ">Elvis Jimenez</p>
                            <p class="text-sm text-gray-600">Agente de Seguros Certificado</p>
                        </div>
                    </div>
                </div>

                <button class="contact-btn bg-orange-500 hover:bg-orange-600 text-white font-bold py-5 px-10 rounded-full text-lg w-full lg:w-auto">
                    <i class="fas fa-calendar-check mr-3"></i>Agendar Consulta Gratis
                </button>
            </div>

            <!-- Columna derecha: Tarjetas de beneficios -->
            <div class="space-y-8">
                <!-- Beneficios  -->

             <?php foreach ($advantages as $advantage): ?>

                    <div class="benefit-card">
                    <div class="flex flex-col sm:flex-row p-7">
                        <div class="benefit-icon flex items-center justify-center mr-7 mb-4 sm:mb-0">
                            <i class="<?php echo $advantage["icon"] ?> text-3xl text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-3 text-gray-800"><?php echo $advantage["title"] ?></h3>
                            <p class="text-gray-600">
                                <?php echo $advantage['description']; ?>
                            </p>
                        </div>
                    </div>
                </div>

             <?php endforeach; ?>
            </div>
        </div>

        <!-- Estadísticas de confianza -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20 max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="text-4xl font-bold text-orange-500 mb-2">15+</div>
                <div>Años de Experiencia</div>
            </div>
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="text-4xl font-bold text-orange-500 mb-2">2K+</div>
                <div>Familias Protegidas</div>
            </div>
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="text-4xl font-bold text-orange-500 mb-2">98%</div>
                <div>Satisfacción Clientes</div>
            </div>
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="text-4xl font-bold text-orange-500 mb-2">24/7</div>
                <div>Soporte Disponible</div>
            </div>
        </div>
      </div>
    </section>
