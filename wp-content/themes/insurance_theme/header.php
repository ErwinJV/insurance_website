<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Primary Meta Tags -->
<title>Elvis Jimenez - Insurance Agent</title>
<meta name="title" content="Elvis Jimenez - Insurance Agent" />
<meta name="description" content="Elvis Jimenez - Agente de seguros especializado en Seguros Obamacare, Seguros de Gastos Finales, Seguros IUL y Seguros Complementarios (Visión/Dental). Obtén asesoría personalizada para proteger tu salud y tu futuro." />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://elvisjimenezinsurance.com/" />
<meta property="og:title" content="Elvis Jimenez - Insurance Agent" />
<meta property="og:description" content="Elvis Jimenez - Agente de seguros especializado en Seguros Obamacare, Seguros de Gastos Finales, Seguros IUL y Seguros Complementarios (Visión/Dental). Obtén asesoría personalizada para proteger tu salud y tu futuro." />
<meta property="og:image" content="https://metatags.io/images/meta-tags.png" />

<!-- X (Twitter) -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="http://elvisjimenezinsurance.com" />
<meta property="twitter:title" content="Elvis Jimenez - Insurance Agent" />
<meta property="twitter:description" content="Elvis Jimenez - Agente de seguros especializado en Seguros Obamacare, Seguros de Gastos Finales, Seguros IUL y Seguros Complementarios (Visión/Dental). Obtén asesoría personalizada para proteger tu salud y tu futuro." />
<meta property="twitter:image" content="https://metatags.io/images/meta-tags.png" />

<!-- Meta Tags Generated with https://metatags.io -->
    <?php wp_head(); ?>
</head>
<body class="bg-[#133251]" >
<header class="  w-full z-50 " x-data="header">


<nav class="border-gray-200 " id="insurance-main-nav">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse ">

    <?php require INSURANCE_COMPONENTS_PATH . '/logotype.php'; ?>

    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  bg-transparent ">
        <li>
          <a href="/" class="block py-2 px-3 text-white  <?php if(is_page('')) echo "active-link"; ?> rounded-sm  md:p-0" aria-current="page">
            Inicio
          </a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Servicios <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">

            <?php
                wp_nav_menu([
                    'theme_location' => 'main_navigation',
                    'menu_class'     => 'dropdown-services',
                ]);
            ?>

            </div>
        </li>
        <li>
          <a href="/blog" class="block py-2 px-3  rounded-sm text-white hover:text-blue-600 <?php if(is_home()) echo "active-link"; ?>  md:border-0 md:p-0 ">Blog</a>
        </li>
        <!-- <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Acerca de Nosotros</a>
        </li> -->

        <li>
          <a href="#contacto" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contactanos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</header>

<!-- <div class="py-6"></div> -->