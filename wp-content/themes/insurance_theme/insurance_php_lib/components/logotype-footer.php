
   <?php
       if (has_custom_logo()) {
           $custom_logo_id = get_theme_mod('custom_logo');
           $logo_data      = wp_get_attachment_image_src($custom_logo_id, 'full');
           $logo_url       = $logo_data[0];
       ?>

      <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(SITE_NAME); ?>" class="w-full sm:w-[280px] lg:w-[420px] ">

    <?php
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
    }
    ?>