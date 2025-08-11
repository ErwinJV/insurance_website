
<?php
    $services = [1, 2, 3, 4, 5, 6, 7, 8, 9];

?>

<section >

      <div class="container mx-auto py-14 flex flex-col space-y-2.5">
 <!-- Contenedor del Carousel -->
  <h1 class="text-5xl  my-4 ">Lorem ipsum sit amet</h1>

  <h2 class="text-5xl font-bold text-orange-500">sit emen adespius sou deus sue</h2>
       </br>
        </br>
         </br>
        <div class="swiper-container w-full max-w-6xl mx-auto ">

            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                     <?php foreach ($services as $service): ?>
                    <div class="swiper-slide !w-auto">
                        <div class="card bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-xs">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                     alt="Lorem Sit amet"
                                     class="w-full h-72 object-cover ">
                              <div class="absolute  w-[90%] top-4 left-4 flex flex-col space-y-2">

                                <span class=" w-full text-orange-500 px-3 py-1  text-2xl  font-bold  bg-black/40 d">
                                    Lorem ipsum sit amet
                                </span>
                                  <span class="h-[20px]"></span>
                                  <span class=" w-full  text-white px-3 py-1  text-4xl  font-bold  bg-black/40">
                                    Lorem ipsum sit amet
                                </span>
                              </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Lorem ipsum amet</h3>
                                <p class="text-gray-600 mb-4">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. In cupiditate distinctio, nesciunt asperiores debitis magni, error maiores ducimus reprehenderit voluptatibus fugiat odio accusamus quod delectus quos numquam. Ullam, neque iusto?
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-indigo-600 font-medium">Leer más</span>
                                    <!-- <div class="flex space-x-1 text-yellow-400">

                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

                <!-- Controles del Carousel -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
       </div>

</section>