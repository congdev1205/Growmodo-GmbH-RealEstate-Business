<?php
/**
 * Estatein Theme Functions
 */

// --- Theme Setup ---
function estatein_setup() {
    // Enable auto title tags (SEO)
    add_theme_support('title-tag');

    // Enable featured images (for property listings, blog posts)
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup for search forms, comments, galleries, etc.
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    // Register nav menu locations
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'estatein'),
        'footer'  => __('Footer Menu', 'estatein'),
    ));
}
add_action('after_setup_theme', 'estatein_setup');

// --- Register Property Custom Post Type ---
function estatein_register_property_cpt() {
    $labels = array(
        'name'          => __('Properties', 'estatein'),
        'singular_name' => __('Property', 'estatein'),
        'add_new_item'  => __('Add New Property', 'estatein'),
        'edit_item'     => __('Edit Property', 'estatein'),
        'new_item'      => __('New Property', 'estatein'),
        'view_item'     => __('View Property', 'estatein'),
        'search_items'  => __('Search Properties', 'estatein'),
        'not_found'     => __('No properties found', 'estatein'),
        'menu_name'     => __('Properties', 'estatein'),
    );

    register_post_type('property', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'properties'),
        'menu_icon'    => 'dashicons-admin-home',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, // needed for ACF fields + block editor
    ));
}
add_action('init', 'estatein_register_property_cpt');

// --- Register Testimonial Custom Post Type ---
function estatein_register_testimonial_cpt() {
    $labels = array(
        'name'          => __('Testimonials', 'estatein'),
        'singular_name' => __('Testimonial', 'estatein'),
        'add_new_item'  => __('Add New Testimonial', 'estatein'),
        'edit_item'     => __('Edit Testimonial', 'estatein'),
        'new_item'      => __('New Testimonial', 'estatein'),
        'view_item'     => __('View Testimonial', 'estatein'),
        'search_items'  => __('Search Testimonials', 'estatein'),
        'not_found'     => __('No testimonials found', 'estatein'),
        'menu_name'     => __('Testimonials', 'estatein'),
    );

    register_post_type('testimonial', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => false,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array('title', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'estatein_register_testimonial_cpt');

// --- Register FAQ Custom Post Type ---
function estatein_register_faq_cpt() {
    $labels = array(
        'name'          => __('FAQs', 'estatein'),
        'singular_name' => __('FAQ', 'estatein'),
        'add_new_item'  => __('Add New FAQ', 'estatein'),
        'edit_item'     => __('Edit FAQ', 'estatein'),
        'new_item'      => __('New FAQ', 'estatein'),
        'view_item'     => __('View FAQ', 'estatein'),
        'search_items'  => __('Search FAQs', 'estatein'),
        'not_found'     => __('No FAQs found', 'estatein'),
        'menu_name'     => __('FAQs', 'estatein'),
    );

    register_post_type('estatein_faq', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => array('slug' => 'faq'),
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => array('title', 'editor'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'estatein_register_faq_cpt');

// --- Register Team Member Custom Post Type ---
function estatein_register_team_cpt() {
    $labels = array(
        'name'          => __('Team Members', 'estatein'),
        'singular_name' => __('Team Member', 'estatein'),
        'add_new_item'  => __('Add New Team Member', 'estatein'),
        'edit_item'     => __('Edit Team Member', 'estatein'),
        'new_item'      => __('New Team Member', 'estatein'),
        'view_item'     => __('View Team Member', 'estatein'),
        'search_items'  => __('Search Team Members', 'estatein'),
        'not_found'     => __('No team members found', 'estatein'),
        'menu_name'     => __('Team', 'estatein'),
    );

    register_post_type('team_member', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => false,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array('title', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'estatein_register_team_cpt');

// --- Register Client Custom Post Type ---
function estatein_register_client_cpt() {
    $labels = array(
        'name'          => __('Clients', 'estatein'),
        'singular_name' => __('Client', 'estatein'),
        'add_new_item'  => __('Add New Client', 'estatein'),
        'edit_item'     => __('Edit Client', 'estatein'),
        'new_item'      => __('New Client', 'estatein'),
        'view_item'     => __('View Client', 'estatein'),
        'search_items'  => __('Search Clients', 'estatein'),
        'not_found'     => __('No clients found', 'estatein'),
        'menu_name'     => __('Clients', 'estatein'),
    );

    register_post_type('estatein_client', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => false,
        'menu_icon'    => 'dashicons-building',
        'supports'     => array('title', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'estatein_register_client_cpt');

// --- ACF Fields: Property Details ---
function estatein_register_property_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_property_details',
        'title' => 'Property Details',
        'fields' => array(
            array(
                'key' => 'field_property_bedrooms',
                'label' => 'Bedrooms',
                'name' => 'bedrooms',
                'type' => 'number',
            ),
            array(
                'key' => 'field_property_bathrooms',
                'label' => 'Bathrooms',
                'name' => 'bathrooms',
                'type' => 'text',
                'instructions' => 'Use a plain number, e.g. 2 or 2.5',
            ),
            array(
                'key' => 'field_property_type',
                'label' => 'Property Type',
                'name' => 'property_type',
                'type' => 'select',
                'choices' => array(
                    'Villa' => 'Villa',
                    'Apartment' => 'Apartment',
                    'Townhouse' => 'Townhouse',
                    'Condo' => 'Condo',
                ),
                'default_value' => 'Villa',
            ),
            array(
                'key' => 'field_property_price',
                'label' => 'Price (USD)',
                'name' => 'price',
                'type' => 'number',
            ),
            array(
                'key' => 'field_property_short_description',
                'label' => 'Short Description',
                'name' => 'short_description',
                'type' => 'textarea',
                'instructions' => 'Shown on the property card. Keep it to 1-2 sentences.',
                'rows' => 3,
            ),
            array(
                'key' => 'field_property_tag_label',
                'label' => 'Tag Label',
                'name' => 'tag_label',
                'type' => 'text',
                'instructions' => 'Small badge shown over the image on the Properties page, e.g. "Coastal Escapes - Where Waves Beckon". Leave blank to hide.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'property',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'estatein_register_property_fields');

// --- ACF Fields: Testimonial Details ---
function estatein_register_testimonial_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_testimonial_details',
        'title' => 'Testimonial Details',
        'fields' => array(
            array(
                'key' => 'field_testimonial_rating',
                'label' => 'Star Rating',
                'name' => 'rating',
                'type' => 'select',
                'choices' => array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'),
                'default_value' => 5,
            ),
            array(
                'key' => 'field_testimonial_headline',
                'label' => 'Headline',
                'name' => 'headline',
                'type' => 'text',
                'instructions' => 'Short title, e.g. "Exceptional Service!"',
            ),
            array(
                'key' => 'field_testimonial_quote',
                'label' => 'Quote',
                'name' => 'quote',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_testimonial_location',
                'label' => 'Client Location',
                'name' => 'location',
                'type' => 'text',
                'instructions' => 'e.g. "USA, California"',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'estatein_register_testimonial_fields');

// --- ACF Fields: FAQ Card Summary ---
function estatein_register_faq_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_faq_details',
        'title' => 'FAQ Card Summary',
        'fields' => array(
            array(
                'key' => 'field_faq_short_answer',
                'label' => 'Short Answer',
                'name' => 'short_answer',
                'type' => 'textarea',
                'instructions' => 'The 1-sentence teaser shown on the homepage card. Put the full answer in the main content editor above.',
                'rows' => 2,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'estatein_faq',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'estatein_register_faq_fields');

// --- ACF Fields: Team Member Details ---
function estatein_register_team_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_team_details',
        'title' => 'Team Member Details',
        'fields' => array(
            array(
                'key' => 'field_team_role',
                'label' => 'Role / Title',
                'name' => 'role',
                'type' => 'text',
                'instructions' => 'e.g. "Founder", "Chief Real Estate Officer"',
            ),
            array(
                'key' => 'field_team_social_url',
                'label' => 'Social / Twitter URL',
                'name' => 'social_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team_member',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'estatein_register_team_fields');

// --- ACF Fields: Client Details ---
function estatein_register_client_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_client_details',
        'title' => 'Client Details',
        'fields' => array(
            array(
                'key' => 'field_client_since_year',
                'label' => 'Client Since',
                'name' => 'since_year',
                'type' => 'text',
                'instructions' => 'e.g. "Since 2019"',
            ),
            array(
                'key' => 'field_client_domain',
                'label' => 'Domain',
                'name' => 'domain',
                'type' => 'text',
                'instructions' => 'e.g. "Commercial Real Estate"',
            ),
            array(
                'key' => 'field_client_category',
                'label' => 'Category',
                'name' => 'category',
                'type' => 'text',
                'instructions' => 'e.g. "Luxury Home Development"',
            ),
            array(
                'key' => 'field_client_quote',
                'label' => 'What They Said',
                'name' => 'quote',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_client_website_url',
                'label' => 'Website URL',
                'name' => 'website_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'estatein_client',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'estatein_register_client_fields');

// --- Enqueue Styles & Scripts ---
function estatein_enqueue_assets() {
    // Google Font: Urbanist
    wp_enqueue_style(
        'estatein-google-font',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Design tokens — must load first, everything else depends on it
    wp_enqueue_style(
        'estatein-tokens',
        get_template_directory_uri() . '/assets/css/tokens.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/tokens.css')
    );

    // Main stylesheet
    wp_enqueue_style(
        'estatein-style',
        get_stylesheet_uri(),
        array('estatein-tokens'),
        filemtime(get_template_directory() . '/style.css')
    );

    // Header styles (announcement bar, nav, shared background pattern)
    wp_enqueue_style(
        'estatein-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array('estatein-tokens', 'estatein-style'),
        filemtime(get_template_directory() . '/assets/css/header.css')
    );

    // Hero + all homepage sections
    wp_enqueue_style(
        'estatein-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        array('estatein-tokens', 'estatein-style'),
        filemtime(get_template_directory() . '/assets/css/hero.css')
    );

    // About Us page — only loaded on that page template
    if ( is_page_template('page-about.php') ) {
        wp_enqueue_style(
            'estatein-about',
            get_template_directory_uri() . '/assets/css/about.css',
            array('estatein-tokens', 'estatein-style', 'estatein-hero'),
            filemtime(get_template_directory() . '/assets/css/about.css')
        );
    }

    // Properties page — only loaded on that page template
    if ( is_page_template('page-properties.php') ) {
        wp_enqueue_style(
            'estatein-properties',
            get_template_directory_uri() . '/assets/css/properties.css',
            array('estatein-tokens', 'estatein-style', 'estatein-hero'),
            filemtime(get_template_directory() . '/assets/css/properties.css')
        );
    }

    // Main JS file (mobile nav toggle, etc.)
    wp_enqueue_script(
        'estatein-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'estatein_enqueue_assets');


// --- Register Footer Widget Area ---
function estatein_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'estatein'),
        'id'            => 'footer-widgets',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'estatein_widgets_init');

// --- Handle "Let's Make it Happen" lead form submission (Properties page) ---
function estatein_handle_lead_form() {
    $redirect = wp_get_referer() ? wp_get_referer() : home_url('/');

    if ( ! isset($_POST['estatein_lead_nonce']) || ! wp_verify_nonce($_POST['estatein_lead_nonce'], 'estatein_lead_form') ) {
        wp_safe_redirect(add_query_arg('lead_status', 'error', $redirect));
        exit;
    }

    $first_name = sanitize_text_field($_POST['first_name'] ?? '');
    $last_name  = sanitize_text_field($_POST['last_name'] ?? '');
    $email      = sanitize_email($_POST['email'] ?? '');
    $phone      = sanitize_text_field($_POST['phone'] ?? '');
    $location   = sanitize_text_field($_POST['preferred_location'] ?? '');
    $prop_type  = sanitize_text_field($_POST['property_type'] ?? '');
    $bathrooms  = sanitize_text_field($_POST['bathrooms'] ?? '');
    $bedrooms   = sanitize_text_field($_POST['bedrooms'] ?? '');
    $budget     = sanitize_text_field($_POST['budget'] ?? '');
    $contact    = sanitize_text_field($_POST['contact_method'] ?? '');
    $message    = sanitize_textarea_field($_POST['message'] ?? '');

    if ( empty($first_name) || empty($email) || ! is_email($email) ) {
        wp_safe_redirect(add_query_arg('lead_status', 'error', $redirect));
        exit;
    }

    $to      = get_option('admin_email');
    $subject = sprintf('New Property Inquiry from %s %s', $first_name, $last_name);
    $body    = "A new inquiry was submitted on the Properties page:\n\n"
        . "Name: {$first_name} {$last_name}\n"
        . "Email: {$email}\n"
        . "Phone: {$phone}\n"
        . "Preferred Location: {$location}\n"
        . "Property Type: {$prop_type}\n"
        . "Bathrooms: {$bathrooms}\n"
        . "Bedrooms: {$bedrooms}\n"
        . "Budget: {$budget}\n"
        . "Preferred Contact Method: {$contact}\n"
        . "Message: {$message}\n";

    $headers = array();
    if ( $email ) {
        $headers[] = 'Reply-To: ' . $email;
    }

    wp_mail($to, $subject, $body, $headers);

    wp_safe_redirect(add_query_arg('lead_status', 'success', $redirect));
    exit;
}
add_action('admin_post_estatein_lead_form', 'estatein_handle_lead_form');
add_action('admin_post_nopriv_estatein_lead_form', 'estatein_handle_lead_form');