<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!hnice_is_mailchimp_activated()) {
    return;
}

use Elementor\Group_Control_Border;
use Elementor\Controls_Manager;


class Hnice_Elementor_Mailchimp extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'hnice-mailchmip';
    }

    public function get_title()
    {
        return esc_html__('MailChimp Sign-Up Form', 'hnice');
    }

    public function get_categories()
    {
        return array('hnice-addons');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_script_depends()
    {
        return ['magnific-popup'];
    }

    public function get_style_depends()
    {
        return ['magnific-popup'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'section_config',
            [
                'label' => esc_html__('Config', 'hnice'),
            ]
        );

        $this->add_control(
            'mail_layout',
            [
                'label' => esc_html__('Layout', 'hnice'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Layout 1', 'hnice'),
                    '2' => esc_html__('Layout 2', 'hnice'),
                    '3' => esc_html__('Default', 'hnice'),
                ],
                'prefix_class' => 'form-mailchimp-style-',
            ]
        );

        $this->end_controls_section();

        //Form Group
        $this->start_controls_section(
            'form_group',
            [
                'label' => esc_html__('Form Group', 'hnice'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('tabs_form_style');

        $this->start_controls_tab(
            'tab_form_normal',
            [
                'label' => esc_html__('Normal', 'hnice'),
            ]
        );

        $this->add_control(
            'form_bacground',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .form' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_form_hover',
            [
                'label' => esc_html__('Hover', 'hnice'),
            ]
        );

        $this->add_control(
            'form_bacground_hover',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .form:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'form_border_hover',
            [
                'label' => esc_html__('Border Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .form:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(

            Group_Control_Border::get_type(),
            [
                'name' => 'border_formgroup',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .form-style .mc4wp-form .form',
                'separator' => 'before',
            ]
        );


        $this->add_responsive_control(
            'formgroup_border_radius',
            [
                'label' => esc_html__('Border Radius', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'form_padding',
            [
                'label' => esc_html__('Padding', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]

        );

        $this->add_control(
            'display_form_checkbox',
            [
                'label'        => esc_html__('Hidden form checkbox', 'hnice'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'prefix_class' => 'hidden-hnice-form-checkbox-'
            ]
        );

        $this->end_controls_section();

        //INPUT
        $this->start_controls_section(
            'mailchimp_style_input',
            [
                'label' => esc_html__('Input', 'hnice'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('tabs_input_style');

        $this->start_controls_tab(
            'tab_input_normal',
            [
                'label' => esc_html__('Normal', 'hnice'),
            ]
        );

        $this->add_control(
            'input_color',
            [
                'label' => esc_html__('Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_color_placeholder',
            [
                'label' => esc_html__('Color Placeholder', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_background',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_color_border',
            [
                'label' => esc_html__('Color Border', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_input_focus',
            [
                'label' => esc_html__('Focus', 'hnice'),
            ]
        );

        $this->add_control(
            'input_background_focus',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_color_placeholder_focus',
            [
                'label' => esc_html__('Color Placeholder', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_border_color_focus',
            [
                'label' => esc_html__('Border Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields input[type="email"]:focus' => 'border-color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(

            Group_Control_Border::get_type(),
            [
                'name' => 'border_input',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .mc4wp-form-fields input[type="email"]',
                'separator' => 'before',
            ]
        );


        $this->add_responsive_control(
            'input_border_radius',
            [
                'label' => esc_html__('Border Radius', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'input_margin',
            [
                'label' => esc_html__('Margin', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]

        );

        $this->add_control(
            'input_padding',
            [
                'label' => esc_html__('Padding', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]

        );

        $this->end_controls_section();

        //Button
        $this->start_controls_section(
            'mailchip_style_button',
            [
                'label' => esc_html__('Button', 'hnice'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'        => esc_html__('Alignment', 'hnice'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => esc_html__('Left', 'hnice'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'hnice'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__('Right', 'hnice'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
                'prefix_class' => '.mc4wp-form-fields',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => esc_html__('Normal', 'hnice'),
            ]
        );

        $this->add_control(
            'button_bacground',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:not(:hover)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border',
            [
                'label' => esc_html__('Border Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => esc_html__('Hover', 'hnice'),
            ]
        );

        $this->add_control(
            'button_bacground_hover',
            [
                'label' => esc_html__('Background Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_color_hover',
            [
                'label' => esc_html__('Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_hover',
            [
                'label' => esc_html__('Border Color', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_hover',
            [
                'label' => esc_html__('Icon Color hover', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_icon_hover',
            [
                'label' => esc_html__('Icon Border Color hover', 'hnice'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover span.icon:before' => 'border-top-color: {{VALUE}}; border-right-color: {{VALUE}}; border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]:hover span.icon:after' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_button',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mc4wp-form-fields button[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'hnice'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .form-style .mc4wp-form .mc4wp-form-fields button[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        echo '<div class="form-style">';
            mc4wp_show_form();
        echo '</div>';
    }
}

$widgets_manager->register(new Hnice_Elementor_Mailchimp());
