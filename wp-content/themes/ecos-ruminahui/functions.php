<?php
/**
 * Funciones principales del tema Ecos de Rumiñahui.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente.
}

if ( ! function_exists( 'ecos_ruminahui_theme_setup' ) ) {
    /**
     * Configuración general del tema.
     */
    function ecos_ruminahui_theme_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'primary' => __( 'Menú principal', 'ecos-ruminahui' ),
            )
        );
    }
}
add_action( 'after_setup_theme', 'ecos_ruminahui_theme_setup' );

if ( ! function_exists( 'ecos_ruminahui_enqueue_assets' ) ) {
    /**
     * Carga de hojas de estilo y scripts.
     */
    function ecos_ruminahui_enqueue_assets() {
        $theme      = wp_get_theme();
        $theme_uri  = get_template_directory_uri();
        $theme_path = get_template_directory();
        $version    = $theme->get( 'Version' );

        wp_enqueue_style(
            'ecos-ruminahui-google-fonts',
            'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i',
            array(),
            null
        );

        $styles = array(
            'ecos-ruminahui-aos'            => 'vendor/aos/aos.css',
            'ecos-ruminahui-bootstrap'      => 'vendor/bootstrap/css/bootstrap.min.css',
            'ecos-ruminahui-bootstrap-icons'=> 'vendor/bootstrap-icons/bootstrap-icons.css',
            'ecos-ruminahui-boxicons'       => 'vendor/boxicons/css/boxicons.min.css',
            'ecos-ruminahui-glightbox'      => 'vendor/glightbox/css/glightbox.min.css',
            'ecos-ruminahui-remixicon'      => 'vendor/remixicon/remixicon.css',
            'ecos-ruminahui-swiper'         => 'vendor/swiper/swiper-bundle.min.css',
        );

        foreach ( $styles as $handle => $relative_path ) {
            $file_path = $theme_path . '/assets/' . $relative_path;
            $file_uri  = $theme_uri . '/assets/' . $relative_path;
            $file_ver  = file_exists( $file_path ) ? filemtime( $file_path ) : $version;

            wp_enqueue_style( $handle, $file_uri, array(), $file_ver );
        }

        wp_enqueue_style(
            'ecos-ruminahui-fontawesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css',
            array(),
            '5.15.3'
        );

        wp_enqueue_style( 'ecos-ruminahui-theme-style', $theme_uri . '/assets/css/style.css', array( 'ecos-ruminahui-bootstrap' ), file_exists( $theme_path . '/assets/css/style.css' ) ? filemtime( $theme_path . '/assets/css/style.css' ) : $version );
        wp_enqueue_style( 'ecos-ruminahui-style', get_stylesheet_uri(), array( 'ecos-ruminahui-theme-style' ), filemtime( $theme_path . '/style.css' ) );

        wp_enqueue_script( 'jquery' );

        $scripts = array(
            'ecos-ruminahui-purecounter' => 'vendor/purecounter/purecounter_vanilla.js',
            'ecos-ruminahui-aos'         => 'vendor/aos/aos.js',
            'ecos-ruminahui-bootstrap'   => 'vendor/bootstrap/js/bootstrap.bundle.min.js',
            'ecos-ruminahui-glightbox'   => 'vendor/glightbox/js/glightbox.min.js',
            'ecos-ruminahui-isotope'     => 'vendor/isotope-layout/isotope.pkgd.min.js',
            'ecos-ruminahui-swiper'      => 'vendor/swiper/swiper-bundle.min.js',
            'ecos-ruminahui-php-email'   => 'vendor/php-email-form/validate.js',
            'ecos-ruminahui-main'        => 'js/main.js',
        );

        foreach ( $scripts as $handle => $relative_path ) {
            $file_path = $theme_path . '/assets/' . $relative_path;
            $file_uri  = $theme_uri . '/assets/' . $relative_path;
            $deps      = array( 'jquery' );

            if ( 'ecos-ruminahui-purecounter' === $handle ) {
                $deps = array();
            }

            $file_ver = file_exists( $file_path ) ? filemtime( $file_path ) : $version;
            wp_enqueue_script( $handle, $file_uri, $deps, $file_ver, true );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'ecos_ruminahui_enqueue_assets' );

if ( ! class_exists( 'Ecos_Ruminahui_Walker' ) ) {
    /**
     * Walker personalizado para replicar la estructura del menú de la landing page.
     */
    class Ecos_Ruminahui_Walker extends Walker_Nav_Menu {
        public function start_lvl( &$output, $depth = 0, $args = null ) {
            $indent = str_repeat( "\t", $depth );
            $output .= "\n$indent<ul>\n";
        }

        public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
            $has_children = in_array( 'menu-item-has-children', $classes, true );

            $classes[] = 'menu-item-' . $item->ID;
            if ( $has_children ) {
                $classes[] = 'dropdown';
            }

            $class_names = join( ' ', array_map( 'sanitize_html_class', array_filter( $classes ) ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $output .= $indent . '<li' . $class_names . '>';

            $atts           = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target ) ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
            $atts['href']   = ! empty( $item->url ) ? $item->url : '';

            if ( $has_children ) {
                $atts['class'] = 'dropdown-toggle';
            }

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters( 'the_title', $item->title, $item->ID );
            $title = esc_html( $title );

            $item_output  = '<a' . $attributes . '>';
            $item_output .= '<span>' . $title . '</span>';

            if ( $has_children ) {
                $item_output .= ' <i class="bi bi-chevron-down toggle-dropdown"></i>';
            }

            $item_output .= '</a>';

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
}

if ( ! function_exists( 'ecos_ruminahui_menu_fallback' ) ) {
    /**
     * Marcado de respaldo para el menú principal cuando no existe un menú asignado.
     */
    function ecos_ruminahui_menu_fallback() {
        echo '<ul>';
        echo '<li><a class="nav-link scrollto active" href="#hero">' . esc_html__( 'Inicio', 'ecos-ruminahui' ) . '</a></li>';
        echo '<li class="dropdown"><a href="#"><span>' . esc_html__( '¿Quiénes somos?', 'ecos-ruminahui' ) . '</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>';
        echo '<ul>';
        echo '<li class="dropdown"><a href="#about"><span>' . esc_html__( 'Rumiñahui FM 88.9', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '<li class="dropdown"><a href="#"><span>' . esc_html__( 'Normativa', 'ecos-ruminahui' ) . '</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>';
        echo '<ul>';
        echo '<li><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/deontologico_etica_2024.pdf' ) . '" target="_blank">' . esc_html__( 'Código Deontológico y de Ética', 'ecos-ruminahui' ) . '</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '</ul>';
        echo '</li>';
        echo '<li><a class="nav-link scrollto" href="#programacion">' . esc_html__( 'Programación', 'ecos-ruminahui' ) . '</a></li>';
        echo '<li class="dropdown"><a href="#quienes"><span>' . esc_html__( 'Transparencia', 'ecos-ruminahui' ) . '</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>';
        echo '<ul>';
        echo '<li class="dropdown"><a><span>' . esc_html__( 'Rendición de Cuentas', 'ecos-ruminahui' ) . '</span></a>';
        echo '<ul>';
        echo '<li class="dropdown"><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/INFORME_RENDICION_CUENTAS_2023_ECOS.pdf' ) . '" target="_blank">2023</a>';
        echo '<ul>';
        echo '<li class="dropdown"><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/MediosComunicacion_14534.pdf' ) . '" target="_blank"><span>' . esc_html__( 'Informe anual', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '<li class="dropdown"><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/correo_CPCCS_ecos.pdf' ) . '" target="_blank"><span>' . esc_html__( 'Certificado CPCCS', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="dropdown"><a><span>2024</span></a>';
        echo '<ul>';
        echo '<li class="dropdown"><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/radio_2024.pdf' ) . '" target="_blank"><span>' . esc_html__( 'Informe anual', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '<li class="dropdown"><a href="https://www.ruminahui-aseo.gob.ec/rendicion-de-cuentas-periodo-2024/" target="_blank"><span>' . esc_html__( 'Documentos', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '</ul>';
        echo '</li>';
        echo '</ul>';
        echo '</li>';
        echo '<li><a href="' . esc_url( get_template_directory_uri() . '/assets/docs/inscripcion_titulo.pdf' ) . '" target="_blank"><span>' . esc_html__( 'Inscripción título habilitante', 'ecos-ruminahui' ) . '</span></a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li><a class="nav-link scrollto" href="' . esc_url( get_template_directory_uri() . '/assets/docs/tarifario_com.pdf' ) . '" target="_blank">' . esc_html__( 'Tarifario', 'ecos-ruminahui' ) . '</a></li>';
        echo '<li><a class="nav-link scrollto" href="#contact">' . esc_html__( 'Contáctenos', 'ecos-ruminahui' ) . '</a></li>';
        echo '</ul>';
    }
}

if ( ! function_exists( 'ecos_ruminahui_handle_contact_form' ) ) {
    /**
     * Procesa el formulario de contacto enviado desde la landing page.
     */
    function ecos_ruminahui_handle_contact_form() {
        if ( ! isset( $_POST['ecos_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ecos_contact_nonce'] ) ), 'ecos_contact_form' ) ) {
            wp_safe_redirect( add_query_arg( 'contact_status', 'error', wp_get_referer() ?: home_url( '/' ) ) );
            exit;
        }

        $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
        $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
        $subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
        $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

        if ( empty( $name ) || empty( $email ) || empty( $subject ) || empty( $message ) ) {
            wp_safe_redirect( add_query_arg( 'contact_status', 'error', wp_get_referer() ?: home_url( '/' ) ) );
            exit;
        }

        $to      = get_option( 'admin_email' );
        $headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
        $body    = sprintf(
            "%s\n\n%s",
            sprintf( /* translators: 1: Nombre del remitente, 2: Email del remitente */ __( 'Mensaje enviado por %1$s <%2$s>', 'ecos-ruminahui' ), $name, $email ),
            $message
        );

        $sent = wp_mail( $to, $subject, $body, $headers );

        $status   = $sent ? 'success' : 'error';
        $redirect = wp_get_referer() ?: home_url( '/' );

        wp_safe_redirect( add_query_arg( 'contact_status', $status, $redirect ) );
        exit;
    }
}

add_action( 'admin_post_nopriv_ecos_ruminahui_contact', 'ecos_ruminahui_handle_contact_form' );
add_action( 'admin_post_ecos_ruminahui_contact', 'ecos_ruminahui_handle_contact_form' );

