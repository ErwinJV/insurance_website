<?php

add_action('after_setup_theme', function () {
    add_theme_support('custom-logo', [
        'flex-width'  => true,
        'flex-height' => true,

    ]);
});
