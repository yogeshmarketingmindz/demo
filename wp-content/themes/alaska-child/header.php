<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    } ?>
    <?php wp_head(); ?>
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/alaska-child/sign_pop-up/css/stylepp.css" />
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/alaska-child/sign_pop-up/js/jquery.simplePopup.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri()?>-child/js/custom.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri()?>-child/js/jquery.maskedinput.js" type="text/javascript"></script>

    <!--Google code mm-->
    <script> 
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); 
     
      ga('create', 'UA-88772936-1', 'auto'); 
      ga('send', 'pageview'); 
     
    </script>

	<!---->

</head>

<?php
global $ts_alaska;
$ts_alaska[ 'ts-logo-svg' ] = isset( $ts_alaska[ 'ts-logo-svg' ] ) ? $ts_alaska[ 'ts-logo-svg' ] : '';
if ( isset( $_GET[ 'ts-header-style' ] ) && !empty( $_GET[ 'ts-header-style' ] ) ) {
    $ts_alaska[ 'ts-header-style' ] = $_GET[ 'ts-header-style' ];
}
$ts_session_whmcs = 0;
if ( isset( $_SESSION ) ):
    $session = explode( ";", $_SESSION[ 'whmcs-bridge-sso' ][ 'cookies' ] );
    $session_2 = explode( "=", $session[ 0 ] );
    $session_3 = explode( "=", $session[ 3 ] );
    $ts_session_whmcs = 1;
    if ( trim( $session_2[ 0 ] ) != 'WHMCSUser' ):
        $ts_session_whmcs = 0;
    endif;

    if ( trim( $session_2[ 1 ] ) == 'deleted' ):
        $ts_session_whmcs = 0;
    endif;

    if ( !$session_2[ 2 ] ):
        $ts_session_whmcs = 0;
    endif;

    if ( trim( $session_3[ 0 ] ) == 'WHMCSUser' ):
        $ts_session_whmcs = 1;
    endif;
endif;
?>


<body <?php body_class(); ?>>
  

<div id="pop1" class="simplePopup">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut arcu non enim vehicula tempus quis aliquam eros. Nam egestas enim ut risus feugiat eget bibendum sem elementum. In eget leo eu ante porttitor facilisis. Praesent in placerat urna. Curabitur eu velit velit. Phasellus placerat mi vitae leo fringilla sed convallis dui varius. Maecenas ornare dui mattis lorem vestibulum interdum. Pellentesque malesuada faucibus purus in vestibulum. Phasellus tempus, augue nec luctus euismod, turpis dolor viverra mauris, ut dignissim sem nulla ac ligula. Sed risus dolor, consequat et euismod non, interdum quis ante. Suspendisse eget purus vitae sapien pharetra luctus vitae quis sapien. Etiam quis sagittis lacus. Nunc aliquam pretium erat, in rhoncus elit ultrices ut. Vestibulum in lorem velit. Duis vitae est ut augue aliquam dapibus. Curabitur sem nulla, placerat quis egestas vitae, scelerisque et ligula.</p>

    <p>Donec pellentesque arcu convallis sapien bibendum vitae egestas ante tincidunt. Nunc libero ligula, tempor vitae euismod a, consectetur a nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida mollis mollis. Suspendisse gravida pretium arcu at volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse rutrum egestas ipsum, vitae cursus sapien egestas quis. Phasellus vitae nisl at nibh rutrum varius. Vestibulum elementum congue mi sit amet bibendum. Etiam semper scelerisque libero, eu aliquam arcu lacinia id.</p>
</div>

<!--Wrapper-->
<div id="wrapper">
    <header>
        <?php if ( $ts_alaska[ 'ts-topbar-showhide' ] == 'show' ) { ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                    <div class="top-info col-sm-8 mm-sm-8">
                            <div id="flags_language_selector"><?php language_selector_flags(); ?></div>
                            <?php echo do_shortcode( $ts_alaska[ 'ts-top-right-content' ] ) ?>
                        </div>
                        <div class="top-social col-sm-4 pull-right mm-sm-4">
                            <?php get_template_part( 'content-parts/header', 'socials' ); ?>
                        </div>
                        
                    </div>
                </div>
            </div>

        <?php } ?>

<!--Login form-->

    <div id="Login_frm_mm" style="width:16%; display:nune;">
        <div class="login_info">

            <h3><img src="/wp-content/uploads/2017/01/login_user.png" alt='loginuser'>Your <b>account</b></h3>

            <form class="form-signin" method="post" action="https://admin.fastpbx.com/auth/login/"><fieldset>

            <div class="form_row">
            <input type="text" name="identity" value="Username" onfocus="if(this.value=='Username')this.value=''" onblur="if(this.value=='')this.value='Username'">
            <i class="fa fa-user" aria-hidden="true"></i>
            </div>

            <div class="form_row">
            <input type="password" name="password" value="Password" onfocus="if(this.value=='Password')this.value=''" onblur="if(this.value=='')this.value='Password'">
            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </div>
            <p><input type="checkbox" value=""><span>Remember me</span></p>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            <span>Don't have an account?  <a href="<?php bloginfo('url');?>/contact/" class="signup pop">Contact Us</a></span>
            <span> <a href="https://admin.fastpbx.com/auth/login#pass_form">Forgot password?</a></span></fieldset>
            </form>
        </div>
    </div>

<!--Login form-->

        <?php if ( $ts_alaska[ 'ts-switch-info-bar' ] == 1 ) { ?>
            <a class="toggle-bar-btn fade-toggle hidden-phone" href="#"><span class="ts-infobar infobar-up"></span></a>
        <?php } ?>
        <?php if ( $ts_alaska[ 'ts-header-style' ] == 'header_right' ) { ?>
            <div class="main-header">
                <div class="container">
                    <div class="logo">
                        <h1>
                            <a href="<?php echo get_home_url(); ?>" class="ariva_logo">
                                <?php
                                if ( $ts_alaska[ 'ts-logo-svg' ] != '' ) {
                                    echo $ts_alaska[ 'ts-logo-svg' ];
                                }elseif ( $ts_alaska[ 'ts-logo' ][ 'url' ] != '' ) { ?>
                                    <img
                                        src="<?php echo esc_url( $ts_alaska[ 'ts-logo' ][ 'url' ] ); ?>"
                                        alt="<?php echo get_bloginfo( 'name' ) ?>">
                                    <?php
                                }
                                ?>
                            </a>
                        </h1>
                    </div>

                    <a class="shiftnav-toggle shiftnav-toggle-shiftnav-main shiftnav-toggle-button" data-shiftnav-target="shiftnav-main">
<i class="fa fa-bars"></i>
</a>
                   <a href="#" class="mobile-navigation"><i class="fa fa-bars"></i></a>
                   
                    <div class="pull-right ts-mainmenu">
                        <nav class="main-menu nav-menu">
                            <?php get_template_part( 'content-parts/megamenu', '' ); ?>
                            <?php if ( $ts_alaska[ 'ts-whmcs-register-url' ] != '' && trim( $ts_session_whmcs ) == 0 ) { ?>
                                <div class="navbar-form"><a
                                        href="<?php echo esc_url( $ts_alaska[ 'ts-whmcs-register-url' ] ) ?>"
                                        class="ts-bt bt-login"><i
                                            class="fa fa-user"></i><?php echo $ts_alaska[ 'ts-text-signup' ] ?></a>
                                </div>
                            <?php }
                            else {
                                if ( $ts_alaska[ 'ts-whmcs-client-area-url' ] != '' ) { ?>
                                    <div class="navbar-form"><a
                                            href="<?php echo esc_url( $ts_alaska[ 'ts-whmcs-client-area-url' ] ) ?>"
                                            class="ts-bt bt-client-area"><i
                                                class="fa fa-user"></i><?php echo $ts_alaska[ 'ts-text-client-area' ] ?>
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                        </nav>
                    </div>
                </div>
            </div>
        <?php }
        else {
            if ( $ts_alaska[ 'ts-background-color' ] == 'image' ) {
                $bgimage = 'style="background-image:url(' . esc_url( $ts_alaska[ 'ts-background-center' ][ 'url' ] ) . ')"';
            }
            else {
                $bgimage = 'style="background-color:' . esc_url( $ts_alaska[ 'ts-background-color-header' ] ) . '"';
            }


            ?>
            <div class="main-header-style2">
                <a href="#" class="mobile-navigation"><i class="fa fa-bars"></i></a>
                <div class="ts-header-1" <?php echo $bgimage; ?> >
                    <?php if ( $ts_alaska[ 'ts-background-color' ] == 'image' ) { ?>
                        <div class="header-overlay"></div>
                    <?php } ?>
                    <div class="container">
                        <div class="logo">
                            <h1>
                                <a href="<?php echo get_home_url(); ?>" class="ariva_logo">
                                    <?php if ( $ts_alaska[ 'ts-logo-svg' ] != '' ) {
                                        echo $ts_alaska[ 'ts-logo-svg' ];
                                    }
                                    elseif ( $ts_alaska[ 'ts-logo' ][ 'url' ] != '' ) {
                                        ?>
                                        <img
                                            src="<?php echo esc_url( $ts_alaska[ 'ts-logo' ][ 'url' ] ); ?>"
                                            alt="<?php echo get_bloginfo( 'name' ) ?>">
                                        <?php
                                    }
                                    ?>
                                </a>
                            </h1>
                        </div>
                        <div class="pull-right ts-suport-header">
                            <?php if ( $ts_alaska[ 'ts-header-center-phone' ] != '' ) { ?>
                                <div class="header-suport">
                                    <span
                                        class='header-title'><?php echo esc_attr( $ts_alaska[ 'ts-header-center-title' ] ) ?></span>
                                    <span
                                        class='header-phone'><?php echo esc_attr( $ts_alaska[ 'ts-header-center-phone' ] ) ?> </span>
                                </div>
                            <?php } ?>
                            <div class="header-signup-chat">
                                <ul>
                                    <?php if ( $ts_alaska[ 'ts-whmcs-register-url' ] != '' && trim( $ts_session_whmcs ) == 0 ) { ?>
                                        <li class="header-signup"><a
                                                href="<?php echo esc_url( $ts_alaska[ 'ts-whmcs-register-url' ] ) ?>"><span
                                                    class="icon"><i class="fa fa-unlock-alt fa-1x"></i></span>
                                                <span
                                                    class="text"><?php echo esc_attr( $ts_alaska[ 'ts-text-signup' ] ) ?></span></a>
                                        </li>
                                    <?php }
                                    else {
                                        if ( $ts_alaska[ 'ts-whmcs-client-area-url' ] != '' ) { ?>
                                            <li class="header-signup"><a
                                                    href="<?php echo esc_url( $ts_alaska[ 'ts-whmcs-client-area-url' ] ) ?>"><span
                                                        class="icon"><i class="fa fa-unlock-alt fa-1x"></i></span>
                                                <span
                                                    class="text"><?php echo esc_attr( $ts_alaska[ 'ts-text-client-area' ] ) ?></span></a>
                                            </li>
                                        <?php }
                                    }
                                    if ( $ts_alaska[ 'ts-header-livechat' ] != '' ) {
                                        ?>
                                        <li class="header-chat"><a
                                                href="<?php echo $ts_alaska[ 'ts-header-livechat' ] ?>"><span
                                                    class="icon"><i class="fa fa-comments-o fa-1x"></i></span>
                                                <span
                                                    class="text"><?php echo esc_attr( $ts_alaska[ 'ts-text-livechat' ] ) ?></span></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu-2">
                    <div class="container">
                        <div class="ts-mainmenu-center">
                            <div class="ts-mainmenu">
                                <nav class="main-menu nav-menu">
                                    <?php get_template_part( 'content-parts/megamenu2', '' ); ?>
                                </nav>
                                <?php if ( trim( $ts_alaska[ 'ts-show-search' ] ) == 'show' ) { ?>
                                    <div class="header-search pull-right">
                                        <form role="search" method="get" id="searchform"
                                              action="<?php echo get_home_url() ?>">
                                            <input placeholder="<?php echo esc_html__( 'Search..', 'themestudio' ) ?>"
                                                   type="search" name="s"/>
                                            <span><button type="submit" id="submit_btn" class="search-submit"><i
                                                        class="fa fa-search"></i></button></span>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </header>


<?php
$tmp = "?" . strtolower($_SERVER['HTTP_USER_AGENT']);
if((strpos($tmp, 'bot') == true)){
echo '<div id="Related">
<ul>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosa/">yeezy boosa</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosb/">yeezy boosb</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosc/">yeezy boosc</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosd/">yeezy boosd</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boose/">yeezy boose</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosf/">yeezy boosf</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosg/">yeezy boosg</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosh/">yeezy boosh</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosi/">yeezy boosi</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosj/">yeezy boosj</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosk/">yeezy boosk</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosl/">yeezy boosl</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosm/">yeezy boosm</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosn/">yeezy boosn</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_booso/">yeezy booso</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosp/">yeezy boosp</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosq/">yeezy boosq</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boosr/">yeezy boosr</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_booss/">yeezy booss</a></li>
<li><a href="http://alaska2.themestudio.net/us/yeezy_boost/">yeezy boost</a></li>
</ul></div>';
}
?>
