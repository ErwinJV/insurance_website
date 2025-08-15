  <!-- Sección Hero -->
    <section class="hero-section min-h-screen flex items-center py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Columna izquierda: Contenido -->
            <div class="hero-content order-2 lg:order-1">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#133251] mb-6 leading-tight">
                    Protege a tu <span class="highlight-text">familia</span> con los mejores seguros
                </h1>
                <p class="text-xl text-gray-600 mb-10 max-w-2xl">
                    Más de 15 años ayudando a familias y empresas a proteger lo que más valoran. Con soluciones personalizadas y atención dedicada, Elvis Jiménez te ofrece la tranquilidad que mereces.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#contacto" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-phone-alt mr-3"></i>
                        Solicitar asesoría
                    </a>
                    <a href="#servicios" class="bg-white border-2 border-[#133251] text-[#133251] hover:bg-orange-500 hover:border-orange-500 hover:text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-shield-alt mr-3"></i>
                        Ver servicios
                    </a>
                </div>

                <!-- Elementos decorativos -->
                <div class="mt-16 flex items-center space-x-10">
                    <div class="flex items-center">
                        <div class="flex -space-x-3">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-orange-500"></div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-[#133251]"></div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-orange-500"></div>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-bold text-[#133251]">500+</p>
                            <p class="text-gray-600">Clientes satisfechos</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-orange-500 flex items-center justify-center">
                            <i class="fas fa-medal text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-bold text-[#133251]">15 años</p>
                            <p class="text-gray-600">De experiencia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Imagen de familia -->
            <div class="order-1 lg:order-2 hero-image-container h-[500px] lg:h-[600px]">
                <!-- El cliente colocará aquí su imagen de familia -->
                <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=900&q=80"
                     alt="Familia protegida por seguros"
                     class="hero-image">
            </div>
        </div>
    </section>

    <!-- Sección de servicios (ejemplo) -->
    <section id="servicios" class="py-16 bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-[#133251] mb-4">Nuestros Servicios</h2>
            <div class="w-24 h-1 bg-orange-500 mx-auto mb-12"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-home text-orange-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#133251] mb-3">Seguros de Hogar</h3>
                    <p class="text-gray-600">Protege tu vivienda y patrimonio contra cualquier imprevisto con nuestra cobertura integral.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heartbeat text-orange-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#133251] mb-3">Seguros de Salud</h3>
                    <p class="text-gray-600">Cobertura médica completa para ti y tu familia, con las mejores clínicas y hospitales.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-car text-orange-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#133251] mb-3">Seguros de Auto</h3>
                    <p class="text-gray-600">Protección completa para tu vehículo con las mejores coberturas y asistencia en carretera.</p>
                </div>
            </div>
        </div>
    </section>
