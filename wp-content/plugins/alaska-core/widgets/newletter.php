<?php

/**
 * Widget Name: Alaska Core New Letter
 * Widget Description: Display the Form Login
 * Widget Text Domain: alaska-core
 *
 */
class AlaskaCore_WidgetNewsletter extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'AlaskaCore_Widget__Newsletter',
            'description' => __( 'Newsletter Widget Use MailChimp', 'alaska-core' ),
        );

        parent::__construct( 'AlaskaCore_Widget_Newsletter', 'Alaska Core - Newsletter', $widget_ops );
    }

    public function widget( $args, $instance )
    {
        $title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : __( 'Newsletter', 'alaska-core' );
        $intro_text = ( empty( $instance[ 'intro_text' ] ) || !isset( $instance[ 'intro_text' ] ) ) ? null : esc_attr( $instance[ 'intro_text' ] );
        $apikey = ( empty( $instance[ 'apikey' ] ) || !isset( $instance[ 'apikey' ] ) ) ? null : esc_attr( $instance[ 'apikey' ] );
        $listid = ( empty( $instance[ 'listid' ] ) || !isset( $instance[ 'listid' ] ) ) ? null : esc_attr( $instance[ 'listid' ] );
        $success_message = ( empty( $instance[ 'success_message' ] ) || !isset( $instance[ 'success_message' ] ) ) ? esc_html__( 'Success', 'alaska-core' ) : esc_attr( $instance[ 'success_message' ] );
        $url = admin_url( 'admin-ajax.php' ) . '?action=alaska_subcrible_submit';
        //$url   = plugin_dir_url('alaska-core') . '/inc/sendmail.php'; // Replace url to php action
        extract( $args );
        echo $args[ 'before_widget' ];
        ?>
        <div class="newsletter-widget ts-subscribe">
            <div class="ts-sidebar-widget">
                <?php echo $before_title . $title . $after_title; ?>
            </div>
            <div class="frm-wrap-1 newsletter-form-wrap">
                <form method="post" action="<?php echo esc_url( $url ); ?>" name="news_letter" class="form-newsletter">
                    <?php if ( $intro_text != '' ) : ?>
                        <p><?php echo esc_attr( $intro_text ); ?></p>
                    <?php endif ?>
                    <div class="frm-wrap">
                        <input type="email" name="email"
                               placeholder="<?php echo __( 'Your email address*', 'alaska-core' ); ?>"/>
                        <input type="hidden" name="api_key" value="<?php echo esc_attr( $apikey ); ?>"/>
                        <input type="hidden" name="list_id" value="<?php echo esc_attr( $listid ); ?>"/>
                        <input type="hidden" name="success_message"
                               value="<?php echo esc_attr( $success_message ); ?>"/>
                        <button class="submit-button ts-alaska-subscribe" name="submit_button" type="submit"/>
                        <?php echo __( 'SUBSCIRBE', 'alaska-core' ); ?></button>
                        <i class="fa fa-envelope-o"></i>
                        <div class="ts-alaska-message"></div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        echo $args[ 'after_widget' ];
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance[ 'title' ] = isset( $new_instance[ 'title' ] ) ? esc_attr( $new_instance[ 'title' ] ) : 'Newsletter';
        $instance[ 'intro_text' ] = ( empty( $new_instance[ 'intro_text' ] ) || !isset( $new_instance[ 'intro_text' ] ) ) ? null : esc_attr( $new_instance[ 'intro_text' ] );
        $instance[ 'apikey' ] = ( empty( $new_instance[ 'apikey' ] ) || !isset( $new_instance[ 'apikey' ] ) ) ? null : esc_attr( $new_instance[ 'apikey' ] );
        $instance[ 'listid' ] = ( empty( $new_instance[ 'listid' ] ) || !isset( $new_instance[ 'listid' ] ) ) ? null : esc_attr( $new_instance[ 'listid' ] );
        $instance[ 'success_message' ] = ( empty( $new_instance[ 'success_message' ] ) || !isset( $new_instance[ 'success_message' ] ) ) ? null : esc_attr( $new_instance[ 'success_message' ] );

        return $instance;
    }

    public function form( $instance )
    {
        $title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : __( 'Newsletter', 'alaska-core' );
        $intro_text = ( empty( $instance[ 'intro_text' ] ) || !isset( $instance[ 'intro_text' ] ) ) ? null : esc_attr( $instance[ 'intro_text' ] );
        $apikey = ( empty( $instance[ 'apikey' ] ) || !isset( $instance[ 'apikey' ] ) ) ? null : esc_attr( $instance[ 'apikey' ] );
        $listid = ( empty( $instance[ 'listid' ] ) || !isset( $instance[ 'listid' ] ) ) ? null : esc_attr( $instance[ 'listid' ] );
        $success_message = ( empty( $instance[ 'success_message' ] ) || !isset( $instance[ 'success_message' ] ) ) ? null : esc_attr( $instance[ 'success_message' ] );
        $api_key_url = "https://admin.mailchimp.com/account/api";
        $red_api_url = "https://polkaspots.zendesk.com/hc/en-us/articles/201070513-Where-can-I-find-my-MailChimp-API-key-and-List-ID";
        ?>
        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'alaska-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>

        <p class="ts-newsletter-intro-text">
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'intro_text' ) ); ?>"><?php _e( 'Intro Text:', 'alaska-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'intro_text' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'intro_text' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $intro_text ); ?>"/>
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'apikey' ) ); ?>"><?php _e( 'API Mailchimp:', 'alaska-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'apikey' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'apikey' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $apikey ); ?>"/>
            <a href="<?php echo esc_url( $api_key_url ); ?>" target="_blank">Get your API key here.</a>
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'listid' ) ); ?>"><?php _e( 'ListID Mailchimp:', 'alaska-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'listid' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'listid' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $listid ); ?>"/>
            <a href="<?php echo esc_url( $red_api_url ); ?>" target="_blank">You can read : Taking your API key
                here.</a>
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'success_message' ) ); ?>"><?php _e( 'Success Message:', 'alaska-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'success_message' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'success_message' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $success_message ); ?>"/>
        </p>
        <?php
    }
}


function AlaskaCore_init_WidgetNewsletter()
{
    register_widget( 'AlaskaCore_WidgetNewsletter' );
}

add_action( 'widgets_init', 'AlaskaCore_init_WidgetNewsletter' );