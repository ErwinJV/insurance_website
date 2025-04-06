<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Website</title>
    <?php wp_head(); ?>
</head>
<body>
<header class="bg-white drop-shadow-lg fixed w-full z-50" x-data="header">
  <nav class="container mx-auto px-6 py-3">
    <div class="flex items-center justify-between">
      <div class="text-black font-bold text-xl">
        <a href="#">Logo</a>
      </div>
      <div class="hidden md:block" >
        <ul class="flex items-center space-x-8">
          <li> <a href="#" class="text-black">Home</a></li>
          <li><a href="#" class="text-black">About</a></li>
          <li class="relative">
            <span class="text-black cursor-pointer select-none" @click="services = !services" >Services</span>
             <div class="bg-white drop-shadow-lg ring-black absolute left-0 bottom-20px w-[120px] rounded-[5px] p-3  border-e-fuchsia-900" @click.outside="services=false" x-show="services">
                <ul class=" flex flex-col space-y-2 text-black ">
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                </ul>
             </div>
        </li>
          <li><a href="#" class="text-black">Contact</a></li>
        </ul>
      </div>
      <div class="md:hidden">
        <button class="outline-none mobile-menu-button" @click='open = !open'>
          <svg class="w-6 h-6 text-black"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  <template x-if="open">
      <div class="mobile-menu  md:hidden" >
      <ul class="mt-4 space-y-4">
        <li><a href="#" class="block px-4 py-2 text-white bg-gray-900 rounded">Home</a></li>
        <li><a href="#" class="block px-4 py-2 text-white bg-gray-900 rounded">About</a></li>
        <li class="relative">
          <span class="block px-4 py-2 text-white bg-gray-900 rounded cursor-pointer" @click="services=!services" >Services</span>
          <div class="bg-gray-900 absolute left-0 bottom-[-110px] w-full p-3 rounded-b-xs" x-show="services" @click.outside="services = false" >
              <ul class=" flex flex-col space-y-2 text-white ">
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                    <li class="cursor-pointer select-none"><a href="#">Lorem Ipsum sit amet</a></li>
                </ul>
          </div>
        </li>
        <li><a href="#" class="block px-4 py-2 text-white bg-gray-900 rounded">Contact</a></li>
      </ul>
    </div>
   </template>
  </nav>
</header>

<!-- <div class="py-6"></div> -->