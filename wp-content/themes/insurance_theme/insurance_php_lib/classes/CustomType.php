<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;

class CustomType implements Action
{

    public function __construct(
        private string $type,
        private array $data
    ) {}

    private function add_custom_post_type()
    {

        $labels = [
            'name'                  => _x(ucfirst($this->type), 'Post Type General Name', SITE_NAME),
            'singular_name'         => _x(ucfirst($this->type), 'Post Type Singular Name', SITE_NAME),
            'menu_name'             => __(ucfirst($this->data['plural']), SITE_NAME),
            'name_admin_bar'        => __(ucfirst($this->data['plural']), SITE_NAME),
            'archives'              => __('Archive ' . $this->data['plural'], SITE_NAME),
            'attributes'            => __('Attributes ' . $this->type, SITE_NAME),
            'parent_item_colon'     => __(ucfirst($this->data['plural']) . ' padre:', SITE_NAME),
            'all_items'             => __('All', SITE_NAME),
            'add_new_item'          => __('Add new', SITE_NAME),
            'add_new'               => __('Add', SITE_NAME),
            'new_item'              => __('New', SITE_NAME),
            'edit_item'             => __('Edit', SITE_NAME),
            'update_item'           => __('Update', SITE_NAME),
            'view_item'             => __('See ' . $this->type, SITE_NAME),
            'view_items'            => __('See ' . $this->data['plural'], SITE_NAME),
            'search_items'          => __('Search ' . $this->type, SITE_NAME),
            'insert_into_item'      => __('Insert ' . $this->type, SITE_NAME),
            'uploaded_to_this_item' => __('Upload ' . $this->type, SITE_NAME),
            'items_list'            => __('List ' . $this->type, SITE_NAME),
            'items_list_navigation' => __('Navigation ' . $this->data['plural'], SITE_NAME),
            'filter_items_list'     => __('Filter ' . $this->data['plural'], SITE_NAME),
            'not_found'             => __('No found', 'sushi'),
            'not_found_in_trash'    => __('Not found in trash', SITE_NAME),
        ];

        $rewrite = [
            'slug'       => $data['slug'] ?? $this->type,
            'with_front' => true,
            'pages'      => true,
            'feeds'      => true,
        ];

        $supports = [
            'title',         // Post title
            'editor',        // Post content
            'excerpt',       // Allows short description
            'author',        // Allows showing and choosing author
            'thumbnail',     // Allows feature images
            'comments',      // Enables comments
            'trackbacks',    // Supports trackbacks
            'revisions',     // Shows autosaved version of the posts
            'custom-fields', // Supports by custom fields
        ];

        $args = [
            'label'                 => __(ucfirst($this->type), SITE_NAME),
            'description'           => __('Content of ' . $this->data['plural'], SITE_NAME),
            'labels'                => $labels,
            'supports'              => $supports,
            //'taxonomies'          => $data['taxonomies'] ?? [],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => $this->data['icon'],
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,

            'rest_base'             => $this->type . '-api',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ];

        register_post_type('cpt-' . $this->type, $args);

        flush_rewrite_rules();

    }

    #[\Override]
    public function run(): void
    {
        add_action('init', $this->add_custom_post_type(...));
    }
}
