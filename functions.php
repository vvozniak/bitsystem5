<?php
/**
 * Theme setup.
 */
function tailpress_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'tailpress_setup' );
/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
    $theme = wp_get_theme();
    wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
    wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );
/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
    if ( wp_get_environment_type() === 'production' ) {
        return get_stylesheet_directory_uri() . '/' . $path;
    }
    return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}
/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
    if ( isset( $args->li_class ) ) {
        $classes[] = $args->li_class;
    }
    if ( isset( $args->{"li_class_$depth"} ) ) {
        $classes[] = $args->{"li_class_$depth"};
    }
    return $classes;
}
function get_template_part_with_args($template, $args = array()){
    $template_path = locate_template($template. '.php');
    if($template_path){
        extract($args);
        include $template_path;
    }
}
add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );
function enqueue_all_assets() {
    // Ścieżka do katalogów CSS i JS
    $css_dir = get_template_directory() . '/css/';
    $js_dir  = get_template_directory() . '/js/';
    // URL do katalogów CSS i JS
    $css_url = get_template_directory_uri() . '/css/';
    $js_url  = get_template_directory_uri() . '/js/';
    // Załącz wszystkie pliki CSS
    if (is_dir($css_dir)) {
        foreach (glob($css_dir . '*.css') as $file) {
            $filename = basename($file);
            wp_enqueue_style($filename, $css_url . $filename, array(), filemtime($file));
        }
    }
    // Załącz wszystkie pliki JS
    if (is_dir($js_dir)) {
        foreach (glob($js_dir . '*.js') as $file) {
            $filename = basename($file);
            if($filename!=="moje-opcje-dodatkowe.js"){
                wp_enqueue_script($filename, $js_url . $filename, array('jquery'), filemtime($file), true);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_all_assets');


function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');
function create_pakiety_post_type() {
    register_post_type('pakiety',
        array(
            'labels'      => array(
                'name'          => __('Pakiety', 'textdomain'),
                'singular_name' => __('Pakiet', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => false,
            'supports'    => array('title', 'editor'),
            'menu_icon'   => 'dashicons-cart',
            'rewrite'     => array('slug' => 'pakiety'), // Ustawienie własnego sluga
        )
    );
}
add_action('init', 'create_pakiety_post_type');
wp_enqueue_script( 'tailpress', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );


// Obsługa wysyłki formularza kontaktowego
function handle_send_contact_form() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name    = sanitize_text_field($_POST["name"] ?? '');
        $email   = sanitize_email($_POST["email"] ?? '');
        $subject = sanitize_text_field($_POST["subject"] ?? '');
        $message = sanitize_textarea_field($_POST["message"] ?? '');

        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            wp_die("❌ Wszystkie pola są wymagane.");
        }

        if (!is_email($email)) {
            wp_die("❌ Nieprawidłowy adres e-mail.");
        }

        $to = "wiktor.krys1@gmail.com";
        $mail_subject = "Nowa wiadomość z formularza kontaktowego: " . $subject;

        $mail_body = "Imię i nazwisko: $name\n";
        $mail_body .= "Adres e-mail: $email\n\n";
        $mail_body .= "Treść wiadomości:\n$message\n";
        $mail_body .= "\nWysłano dnia: " . date("Y-m-d H:i:s");

        $headers = ['Reply-To: ' . $email];

        // Wysyłka maila
        wp_mail($to, $mail_subject, $mail_body, $headers);

        // Przekierowanie po wysyłce (np. z powrotem z komunikatem)
        echo "<p style='text-align:center; font-size:18px; margin-top:40px;'>
✅ Dziękujemy! Twoja wiadomość została wysłana.
</p>";
exit;

    }
}
add_action('admin_post_send_contact_form', 'handle_send_contact_form');
add_action('admin_post_nopriv_send_contact_form', 'handle_send_contact_form');



// ============================
// Custom Post Type: Realizacje
// ============================
function cpt_realizacje_init() {
    $labels = [
        'name'               => 'Realizacje',
        'singular_name'      => 'Realizacja',
        'menu_name'          => 'Realizacje',
        'name_admin_bar'     => 'Realizacja',
        'add_new'            => 'Dodaj nową',
        'add_new_item'       => 'Dodaj nową realizację',
        'edit_item'          => 'Edytuj realizację',
        'new_item'           => 'Nowa realizacja',
        'view_item'          => 'Zobacz realizację',
        'search_items'       => 'Szukaj realizacji',
        'not_found'          => 'Nie znaleziono realizacji',
        'not_found_in_trash' => 'Brak realizacji w koszu',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true, // automatycznie tworzy /realizacje/
        'rewrite'            => ['slug' => 'realizacje'],
        'show_in_rest'       => true, // 🔹 umożliwia użycie Gutenberga
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    ];

    register_post_type('realizacje', $args);
}
add_action('init', 'cpt_realizacje_init');

// ============================
// Custom Post Type: Loga Klientów
// ============================
function cpt_loga_klientow_init() {
    $labels = [
        'name'               => 'Loga klientów',
        'singular_name'      => 'Logo klienta',
        'menu_name'          => 'Loga klientów',
        'name_admin_bar'     => 'Logo klienta',
        'add_new'            => 'Dodaj nowe',
        'add_new_item'       => 'Dodaj nowe logo',
        'edit_item'          => 'Edytuj logo',
        'new_item'           => 'Nowe logo',
        'view_item'          => 'Zobacz logo',
        'search_items'       => 'Szukaj logo',
        'not_found'          => 'Nie znaleziono logo',
        'not_found_in_trash' => 'Brak logo w koszu',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'show_in_rest'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => ['title', 'thumbnail'],
    ];

    register_post_type('loga_klientow', $args);
}
add_action('init', 'cpt_loga_klientow_init');

?>