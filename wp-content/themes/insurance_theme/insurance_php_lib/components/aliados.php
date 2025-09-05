<?php 
 $iconos_salud = [
   'salud-1',
   "salud-2",
   "salud-3",
   "salud-4",
   "salud-5",
   "salud-6",
   "salud-7"
 ];

 $iconos_vida = [
   "vida-1",
   "vida-2"
 ];


?>

<div class="flex flex-col space-y-2.5  lg:flex-row lg:space-x-2.5  lg:space-y-0 bg-gray-300 rounded-lg p-4 mx-auto max-w-[1024px]">
   <div class="flex flex-col lg:w-[30%] space-y-2">
       <h2 class="text-[#133251] text-xl md:text-2xl lg:text-3xl ">Nuestros Aliados</h2>
       <h2 class="text-2xl md:text-4xl lg:text-5xl">Trabajamos con las principales </h2>
       <h2 class="text-2xl  md:text-4xl  lg:text-5xl font-bold text-orange-500 uppercase">Compañias de seguros</h2>
   </div>

   <div class="flex flex-col space-y-3 lg:w-[70%] p-3">
       <div class="flex flex-col space-y-2">
          <h3 class="text-xl font-bold">Salud</h3>
          <div class="grid grid-cols-3 md:grid-cols-4 gap-4">
            <?php foreach($iconos_salud as $icono_salud): ?>
               <img class="w-full h-full object-contain" src="<?php echo INSURANCE_URI . "/src/img/aliados/". $icono_salud. ".webp" ?>" alt="<?php echo $icono_salud; ?>" />
            <?php endforeach; ?>
          </div>
       </div>
        <div class="flex flex-col space-y-2">
          <h3 class="text-xl font-bold">Vida</h3>
          <div class="grid grid-cols-3 md:grid-cols-4 gap-4">
            <?php foreach($iconos_vida as $icono_vida): ?>
               <img class="w-full h-full object-contain" src="<?php echo INSURANCE_URI . "/src/img/aliados/". $icono_vida. ".webp" ?>" alt="<?php echo $icono_vida; ?>" />
            <?php endforeach; ?>
          </div>
       </div>
   </div>
</div>