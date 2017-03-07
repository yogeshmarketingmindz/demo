<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}


add_action( 'vc_before_init', 'alaska_core_VC_MAP_Services' );
function alaska_core_VC_MAP_Services()
{
    global $ts_vc_anim_effects_in, $elegant_icons;
    vc_map(
        array(
            'name'     => esc_html__( 'Alaska Core Pricing Table - v2.0 (NEW)', 'alaska-core' ),
            'base'     => 'alaska_core_services', // shortcode
            'class'    => '',
            'category' => esc_html__( 'ALASKA Blocks', 'alaska-core' ),
            'params'   => array(
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'holder'      => 'div',
                    'admin_label' => true,
                    'heading'     => esc_html__( 'Num of plan', 'alaska-core' ),
                    'param_name'  => 'num_of_plans',
                    'value'       => array(
                        esc_html__( '1 Plan', 'alaska-core' )  => '1',
                        esc_html__( '2 Plans', 'alaska-core' ) => '2',
                        esc_html__( '3 Plans', 'alaska-core' ) => '3',
                        esc_html__( '4 Plans', 'alaska-core' ) => '4',
                    ),
                    'std'         => '4',
                ),
                array(
                    'type'        => 'attach_image',
                    'class'       => '',
                    'heading'     => esc_html__( 'Active Pricing Table Image', 'alaska-core' ),
                    'param_name'  => 'active_img_id',
                    'description' => esc_html__( 'Select image from media library.', 'alaska-core' ),
                ),
                /*Plan 1*/
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Title Plan 1', 'alaska-core' ),
                    'param_name' => 'title_plan_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Price Plan 1', 'alaska-core' ),
                    'param_name' => 'price_plan_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Timeout Plan 1', 'alaska-core' ),
                    'param_name' => 'timeout_plan_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => __( 'Icon', 'alaska-core' ),
                    'param_name' => 'plan_1_icon',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'VAT prompt', 'alaska-core' ),
                    'param_name' => 'vat_prompt_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Description', 'alaska-core' ),
                    'param_name' => 'description_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                array(
                    'type'       => 'vc_link',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => esc_html__( 'Button Link', 'alaska-core' ),
                    'param_name' => 'btn_link_1',
                    'group'      => esc_html__( 'Plan 1', 'alaska-core' ),
                ),
                /*Plan 2*/
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Title Plan 2', 'alaska-core' ),
                    'param_name' => 'title_plan_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Price Plan 2', 'alaska-core' ),
                    'param_name' => 'price_plan_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Timeout Plan 2', 'alaska-core' ),
                    'param_name' => 'timeout_plan_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => __( 'Icon', 'alaska-core' ),
                    'param_name' => 'plan_2_icon',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'VAT prompt', 'alaska-core' ),
                    'param_name' => 'vat_prompt_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Description', 'alaska-core' ),
                    'param_name' => 'description_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'vc_link',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => esc_html__( 'Button Link', 'alaska-core' ),
                    'param_name' => 'btn_link_2',
                    'group'      => esc_html__( 'Plan 2', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '2', '3', '4' ),
                    ),
                ),
                /*Plan 3*/
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Title Plan 3', 'alaska-core' ),
                    'param_name' => 'title_plan_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Price Plan 3', 'alaska-core' ),
                    'param_name' => 'price_plan_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Timeout Plan 3', 'alaska-core' ),
                    'param_name' => 'timeout_plan_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => __( 'Icon', 'alaska-core' ),
                    'param_name' => 'plan_3_icon',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'VAT prompt', 'alaska-core' ),
                    'param_name' => 'vat_prompt_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Description', 'alaska-core' ),
                    'param_name' => 'description_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                array(
                    'type'       => 'vc_link',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => esc_html__( 'Button Link', 'alaska-core' ),
                    'param_name' => 'btn_link_3',
                    'group'      => esc_html__( 'Plan 3', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '3', '4' ),
                    ),
                ),
                /*Plan 4*/
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Title Plan 4', 'alaska-core' ),
                    'param_name' => 'title_plan_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Price Plan 4', 'alaska-core' ),
                    'param_name' => 'price_plan_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Timeout Plan 4', 'alaska-core' ),
                    'param_name' => 'timeout_plan_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => __( 'Icon', 'alaska-core' ),
                    'param_name' => 'plan_4_icon',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'VAT prompt', 'alaska-core' ),
                    'param_name' => 'vat_prompt_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Description', 'alaska-core' ),
                    'param_name' => 'description_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),
                array(
                    'type'       => 'vc_link',
                    'holder'     => 'div',
                    'class'      => '',
                    'heading'    => esc_html__( 'Button Link', 'alaska-core' ),
                    'param_name' => 'btn_link_4',
                    'group'      => esc_html__( 'Plan 4', 'alaska-core' ),
                    'dependency' => array(
                        'element' => 'num_of_plans',
                        'value'   => array( '4' ),
                    ),
                ),

                array(
                    'type'        => 'param_group',
                    'heading'     => esc_html__( 'List Service', 'alaska-core' ),
                    'param_name'  => 'list_service_group',
                    'description' => esc_html__( 'Enter values for plans.', 'alaska-core' ),
                    'value'       => urlencode(
                        json_encode(
                            array(
                                array( 'service_name' => esc_html__( 'LINUX WEB HOSTING INCLUDES', 'alaska-core' ), ),
                            )
                        )
                    ),
                    'params'      => array(
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'holder'      => 'div',
                            'admin_label' => true,
                            'heading'     => esc_html__( 'Service name', 'alaska-core' ),
                            'param_name'  => 'service_name',
                            'description' => esc_html__( 'Enter service name.', 'alaska-core' ),
                        ),
                        array(
                            'type'        => 'param_group',
                            'heading'     => esc_html__( 'List items', 'alaska-core' ),
                            'param_name'  => 'list_items_group',
                            'description' => esc_html__( 'Enter values for items.', 'alaska-core' ),
                            'value'       => urlencode(
                                json_encode(
                                    array()
                                )
                            ),
                            'params'      => array(
                                array(
                                    'type'        => 'textfield',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item name', 'alaska-core' ),
                                    'param_name'  => 'item_name',
                                    'description' => esc_html__( 'Enter item name.', 'alaska-core' ),
                                ),
                                array(
                                    'type'        => 'dropdown',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item Type', 'alaska-core' ),
                                    'param_name'  => 'type_of_item',
                                    'value'       => array(
                                        esc_html__( 'Custom', 'alaska-core' ) => 'txt',
                                        esc_html__( 'Yes/No', 'alaska-core' ) => 'yn',
                                    ),
                                    'std'         => 'txt',
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 1', 'alaska-core' ),
                                    'param_name'  => 'plan_1_item',
                                    'description' => esc_html__( 'Enter your value.', 'alaska-core' ),
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'txt' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'dropdown',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 1', 'alaska-core' ),
                                    'param_name'  => 'plan_1_item_yn',
                                    'value'       => array(
                                        esc_html__( 'Yes', 'alaska-core' ) => '1',
                                        esc_html__( 'No', 'alaska-core' )  => '0',
                                    ),
                                    'std'         => 'txt',
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'yn' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 2', 'alaska-core' ),
                                    'param_name'  => 'plan_2_item',
                                    'description' => esc_html__( 'Enter item for plan 2.', 'alaska-core' ),
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'txt' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'dropdown',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 2', 'alaska-core' ),
                                    'param_name'  => 'plan_2_item_yn',
                                    'value'       => array(
                                        esc_html__( 'Yes', 'alaska-core' ) => '1',
                                        esc_html__( 'No', 'alaska-core' )  => '0',
                                    ),
                                    'std'         => 'txt',
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'yn' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 3', 'alaska-core' ),
                                    'param_name'  => 'plan_3_item',
                                    'description' => esc_html__( 'Enter item for plan 3.', 'alaska-core' ),
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'txt' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'dropdown',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 3', 'alaska-core' ),
                                    'param_name'  => 'plan_3_item_yn',
                                    'value'       => array(
                                        esc_html__( 'Yes', 'alaska-core' ) => '1',
                                        esc_html__( 'No', 'alaska-core' )  => '0',
                                    ),
                                    'std'         => 'txt',
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'yn' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 4', 'alaska-core' ),
                                    'param_name'  => 'plan_4_item',
                                    'description' => esc_html__( 'Enter item for plan 4.', 'alaska-core' ),
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'txt' ),
                                    ),
                                ),
                                array(
                                    'type'        => 'dropdown',
                                    'class'       => '',
                                    'holder'      => 'div',
                                    'admin_label' => true,
                                    'heading'     => esc_html__( 'Item for plan 4', 'alaska-core' ),
                                    'param_name'  => 'plan_4_item_yn',
                                    'value'       => array(
                                        esc_html__( 'Yes', 'alaska-core' ) => '1',
                                        esc_html__( 'No', 'alaska-core' )  => '0',
                                    ),
                                    'std'         => 'txt',
                                    'dependency'  => array(
                                        'element' => 'type_of_item',
                                        'value'   => array( 'yn' ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__( 'Animation Delay', 'alaska-core' ),
                    'param_name'  => 'animation_delay',
                    'std'         => '0.4',
                    'description' => esc_html__( 'Delay unit is second.', 'alaska-core' ),
                    'dependency'  => array(
                        'element'   => 'css_animation',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => esc_html__( 'Css', 'alaska-core' ),
                    'param_name' => 'css',
                    'group'      => esc_html__( 'Design options', 'alaska-core' ),
                ),
            ),
        )
    );
}

function alaska_core_services( $atts, $content = null )
{

    $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'alaska_core_services', $atts ) : $atts;

    extract(
        shortcode_atts(
            array(
                'num_of_plans'       => '1',
                'active_img_id'      => '',
                /*Plan 1*/
                'title_plan_1'       => '',
                'plan_1_icon'        => '',
                'price_plan_1'       => '',
                'vat_prompt_1'       => '',
                'timeout_plan_1'     => '',
                'description_1'      => '',
                'btn_link_1'         => '',
                /*Plan 2*/
                'title_plan_2'       => '',
                'plan_2_icon'        => '',
                'price_plan_2'       => '',
                'vat_prompt_2'       => '',
                'timeout_plan_2'     => '',
                'description_2'      => '',
                'btn_link_2'         => '',
                /*Plan 3*/
                'title_plan_3'       => '',
                'plan_3_icon'        => '',
                'price_plan_3'       => '',
                'timeout_plan_3'     => '',
                'vat_prompt_3'       => '',
                'description_3'      => '',
                'btn_link_3'         => '',
                /*Plan 4*/
                'title_plan_4'       => '',
                'plan_4_icon'        => '',
                'price_plan_4'       => '',
                'vat_prompt_4'       => '',
                'description_4'      => '',
                'timeout_plan_4'     => '',
                'btn_link_4'         => '',
                /*-----*/
                'list_service_group' => '',
                'css'                => '',
            ), $atts
        )
    );

    $link_default = array(
        'url'    => '#',
        'title'  => '',
        'target' => '',
    );


        $choose_column = $num_of_plans + 1;
    if ( isset( $active_img_id ) && is_numeric( $active_img_id ) ) {
        //$img_pricing = wp_get_attachment_image_src( $img_pricing, 'img216x460' );
        $img_pricing = alaska_core_resize_image( $active_img_id, null, 216, 460, true, true, false );
    }

    $html = '';

    $html .= '<div class="ts-pricingtable-5">';
    $html .= '<table>';
    $html .= '<tr class="section-info">';
    $html .= '<td class="ts-pricing-img"><figure><img alt="" width="' . esc_attr( $img_pricing[ 'width' ] ) . '" height="' . esc_attr( $img_pricing[ 'height' ] ) . '" src="' . esc_url( $img_pricing[ 'url' ] ) . '"></figure></td>';
    if ( $num_of_plans >= 1 ) {
        if ( function_exists( 'vc_build_link' ) ):
            $btn_link_1 = vc_build_link( $btn_link_1 );
        else:
            $btn_link_1 = $link_default;
        endif;
        $html .= '<td>';
        $html .= '<div class="ts-pricing-item">';
        $html .= '<span class="price-icon"><i class="' . esc_attr( $plan_1_icon ) . '"></i></span>';
        $html .= '<h2 class="price-title">' . esc_attr( $title_plan_1 ) . '</h2>';
        $html .= '<div class="price-unit-vat">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_1 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_1 ) . '</span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_1 ) . '</p>';
        $html .= '</div>';//.price-unit-vat
        $html .= '<div class="desc">' . esc_attr( $description_1 ) . '</div>';
        $html .= '<a href="' . esc_url( $btn_link_1[ 'url' ] ) . '" target="' . $btn_link_1[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_1[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-pricing-item
        $html .= '</td>';
    }
    if ( $num_of_plans >= 2 ) {
        if ( function_exists( 'vc_build_link' ) ):
            $btn_link_2 = vc_build_link( $btn_link_2 );
        else:
            $btn_link_2 = $link_default;
        endif;
        $html .= '<td>';
        $html .= '<div class="ts-pricing-item">';
        $html .= '<span class="price-icon"><i class="' . esc_attr( $plan_2_icon ) . '"></i></span>';
        $html .= '<h2 class="price-title">' . esc_attr( $title_plan_2 ) . '</h2>';
        $html .= '<div class="price-unit-vat">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_2 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_2 ) . '</span></span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_2 ) . '</p>';
        $html .= '</div>';//.price-unit-vat
        $html .= '<div class="desc">' . esc_attr( $description_2 ) . '</div>';
        $html .= '<a href="' . esc_url( $btn_link_2[ 'url' ] ) . '" target="' . $btn_link_2[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_2[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-pricing-item
        $html .= '</td>';
    }
    if ( $num_of_plans >= 3 ) {
        if ( function_exists( 'vc_build_link' ) ):
            $btn_link_3 = vc_build_link( $btn_link_3 );
        else:
            $btn_link_3 = $link_default;
        endif;
        $html .= '<td>';
        $html .= '<div class="ts-pricing-item">';
        $html .= '<span class="price-icon"><i class="' . esc_attr( $plan_3_icon ) . '"></i></span>';
        $html .= '<h2 class="price-title">' . esc_attr( $title_plan_3 ) . '</h2>';
        $html .= '<div class="price-unit-vat">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_3 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_3 ) . '</span></span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_3 ) . '</p>';
        $html .= '</div>';//.price-unit-vat
        $html .= '<div class="desc">' . esc_attr( $description_3 ) . '</div>';
        $html .= '<a href="' . esc_url( $btn_link_3[ 'url' ] ) . '" target="' . $btn_link_3[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_3[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-pricing-item
        $html .= '</td>';
    }
    if ( $num_of_plans >= 4 ) {
        if ( function_exists( 'vc_build_link' ) ):
            $btn_link_4 = vc_build_link( $btn_link_4 );
        else:
            $btn_link_4 = $link_default;
        endif;
        $html .= '<td>';
        $html .= '<div class="ts-pricing-item">';
        $html .= '<span class="price-icon"><i class="' . esc_attr( $plan_4_icon ) . '"></i></span>';
        $html .= '<h2 class="price-title">' . esc_attr( $title_plan_4 ) . '</h2>';
        $html .= '<div class="price-unit-vat">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_4 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_4 ) . '</span></span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_4 ) . '</p>';
        $html .= '</div>';//.price-unit-vat
        $html .= '<div class="desc">' . esc_attr( $description_4 ) . '</div>';
        $html .= '<a href="' . esc_url( $btn_link_4[ 'url' ] ) . '" target="' . $btn_link_4[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_4[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-pricing-item
        $html .= '</td>';
    }
    $html .= '</tr>';//.section-info

    $list_service_group = vc_param_group_parse_atts( $atts[ 'list_service_group' ] );
    foreach ( $list_service_group as $service ) {
        $html .= '<tr class="hidden-xs">';
        $html .= '<td colspan="' . esc_attr( $choose_column ) . '" class="title-feature">' . $service[ 'service_name' ] . '</td>';
        $html .= '</tr>';
        $list_items_group = vc_param_group_parse_atts( $service[ 'list_items_group' ] );
        foreach ( $list_items_group as $item ) {
            $html .= '<tr class="hidden-xs list-feature">';
            $html .= '<td><span class="inner-td">' . $item[ 'item_name' ] . '</span></td>';
            for ( $i = 1; $i <= $num_of_plans; $i++ ) {
                if ( $item[ 'type_of_item' ] == 'txt' ) {
                    $html .= '<td><span class="inner-td">' . $item[ 'plan_' . $i . '_item' ] . '</span></td>';
                }
                else {
                    if ( $item[ 'plan_' . $i . '_item_yn' ] == 1 ) {
                        $class_pricing = ' ts-icon-check';
                        $item_icon = '<i class="fa fa-check"></i>';
                    }
                    else {
                        $class_pricing = ' ts-icon-close';
                        $item_icon = '<i class="fa fa-close"></i>';
                    }
                    $html .= '<td><span class="inner-td ' . esc_attr( $class_pricing ) . '">' . $item_icon . '</span></td>';
                }

            }
            $html .= '</tr>';
        }
    }
    $html .= '<tr class="pricing-footer hidden-xs">';
    $html .= '<td></td>';
    if ( $num_of_plans >= 1 ) {
        $html .= '<td>';
        $html .= '<div class="ts-footer-price">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_1 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_1 ) . '</span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_1 ) . '</p>';
        $html .= '<a href="' . esc_url( $btn_link_1[ 'url' ] ) . '" target="' . $btn_link_1[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_1[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-footer-price
        $html .= '</td>';
    }

    if ( $num_of_plans >= 2 ) {
        $html .= '<td>';
        $html .= '<div class="ts-footer-price">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_2 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_2 ) . '</span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_2 ) . '</p>';
        $html .= '<a href="' . esc_url( $btn_link_2[ 'url' ] ) . '" target="' . $btn_link_2[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_2[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-footer-price
        $html .= '</td>';
    }

    if ( $num_of_plans >= 3 ) {
        $html .= '<td>';
        $html .= '<div class="ts-footer-price">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_3 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_3 ) . '</span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_3 ) . '</p>';
        $html .= '<a href="' . esc_url( $btn_link_3[ 'url' ] ) . '" target="' . $btn_link_3[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_3[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-footer-price
        $html .= '</td>';
    }

    if ( $num_of_plans >= 4 ) {
        $html .= '<td>';
        $html .= '<div class="ts-footer-price">';
        $html .= '<div class="price-unit">';
        $html .= '<span class="price">' . esc_attr( $price_plan_4 ) . '</span>';
        $html .= '<span class="unit"> /' . esc_attr( $timeout_plan_4 ) . '</span>';
        $html .= '</div>';//.price-unit
        $html .= '<p>' . apply_filters( 'the_title', $vat_prompt_4 ) . '</p>';
        $html .= '<a href="' . esc_url( $btn_link_4[ 'url' ] ) . '" target="' . $btn_link_4[ 'target' ] . '" class="ts-bt-pricing">' . esc_attr( $btn_link_4[ 'title' ] ) . '</a>';
        $html .= '</div>';//.ts-footer-price
        $html .= '</td>';
    }


    $html .= '</tr>';
    $html .= '</table>';
    $html .= '</div><!--end .ts-pricingtable-5-->';

    return $html;
}

add_shortcode( 'alaska_core_services', 'alaska_core_services' );