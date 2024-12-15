<?php
/*
Plugin Name: Homepage Popup
Description: Displays a popup only on the homepage
Version: 1.1
Author: Your Name
*/

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

class Homepage_Popup
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_popup_scripts']);
        add_action('wp_footer', [$this, 'render_popup']);
        add_action('init', [$this, 'handle_popup_cookies']);
    }

    public function enqueue_popup_scripts()
    {
        if (is_front_page()) {
            wp_enqueue_style(
                'homepage-popup-style',
                plugin_dir_url(__FILE__) . 'popup-style.css',
                [],
                '1.1',
                'all'
            );
            wp_enqueue_script(
                'homepage-popup-script',
                plugin_dir_url(__FILE__) . 'popup-script.js',
                ['jquery'],
                '1.1',
                true
            );
        }
    }

    public function render_popup()
    {
        if (is_front_page()) {
            $popup_title = esc_html__('Let op: wij versturen tijdelijk geen pakketjes tussen 12/12/24 en 01/01/25.');
            $popup_content = esc_html__('Heb je geen haast om je producten ontvangen? Wees welkom om je bestelling te plaatsen en je items komen 2 januari meteen jouw kant op. Liefs, team de Wevershoek');
?>
            <div id="homepage-popup" class="popup-overlay">
                <div class="popup-content">
                    <span class="popup-close">&times;</span>
                    <h2><?php echo $popup_title; ?></h2>
                    <p><?php echo $popup_content; ?></p>
                </div>
            </div>
<?php
        }
    }

    public function handle_popup_cookies()
    {
        if (is_front_page() && !isset($_COOKIE['homepage_popup_session'])) {
            $expiration = time() + (7 * 24 * 60 * 60);
            $secure = is_ssl();
            setcookie(
                'homepage_popup_session',
                'shown',
                [
                    'expires' => $expiration,
                    'path' => '/',
                    'secure' => $secure,
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]
            );
        }
    }
}

// Instantiate the plugin
function homepage_popup_init()
{
    new Homepage_Popup();
}
add_action('plugins_loaded', 'homepage_popup_init');
