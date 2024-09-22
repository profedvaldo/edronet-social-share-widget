<?php
/*
Plugin Name: Social Share Widget by Edronet
Description: A widget to share the current page URL on common social media platforms including Telegram and WhatsApp.
Version: 1.0
Author: Edvaldo Rodrigues
Author URI: https://edronet.com
License: MIT
License URI: https://opensource.org/licenses/MIT
*/

class Social_Share_Widget extends WP_Widget {
    
    // Construtor do widget
    function __construct() {
        parent::__construct(
            'social_share_widget', 
            __('Social Share Widget', 'text_domain'), 
            array('description' => __('A widget to share the current page URL on social media.', 'text_domain'))
        );
    }

    // Exibe o conteúdo do widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        echo '<div class="social-share">';
        echo '<p>Compartilhe:</p>';
        $this->display_share_links();
        echo '</div>';

        echo $args['after_widget'];
    }

    // Exibe os links de compartilhamento
    private function display_share_links() {
        $url = get_permalink(); // Obtém a URL da página atual
        ?>

        <a href="https://www.facebook.com/sharer.php?u=<?php echo $url; ?>" target="_blank">
            <img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="Facebook">
        </a>
        <a href="https://twitter.com/share?url=<?php echo $url; ?>" target="_blank">
            <img src="<?php echo plugins_url('images/twitter.png', __FILE__); ?>" alt="Twitter">
        </a>
        <a href="https://api.whatsapp.com/send?text=<?php echo $url; ?>" target="_blank">
            <img src="<?php echo plugins_url('images/whatsapp.png', __FILE__); ?>" alt="WhatsApp">
        </a>
        <a href="https://t.me/share/url?url=<?php echo $url; ?>" target="_blank">
            <img src="<?php echo plugins_url('images/telegram.png', __FILE__); ?>" alt="Telegram">
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>" target="_blank">
            <img src="<?php echo plugins_url('images/linkedin.png', __FILE__); ?>" alt="LinkedIn">
        </a>

        <?php
    }

    // Função de configuração do widget (opcional)
    public function form($instance) {
        // Deixe em branco por enquanto
    }

    // Atualiza as configurações do widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        return $instance;
    }
}

// Registra o widget
function register_social_share_widget() {
    register_widget('Social_Share_Widget');
}
add_action('widgets_init', 'register_social_share_widget');

// Carrega os ícones de redes sociais
function social_share_widget_styles() {
    wp_enqueue_style('social-share-widget-style', plugins_url('style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'social_share_widget_styles');
