<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($related_products) :
    $class = 'hnice-theme-swiper hnice-swiper-wrapper swiper ';
    $items = wc_get_loop_prop('columns');
    $number = apply_filters('related-products-number', 4) < $items ? $items : apply_filters('related-products-number', 4);
    $settings = hnice_get_settings_product_caroseul();
    $settings['prevEl'] = '.related-swiper-button-prev';
    $settings['nextEl'] = '.related-swiper-button-next';
    $settings['paginationEl'] = '.related-pagination';
    $show_dots = (in_array($settings['navigation'], ['dots', 'both']));
    $show_arrows = (in_array($settings['navigation'], ['arrows', 'both']));
    wc_set_loop_prop('enable_carousel', true);
    ?>

    <section class="related products elementor-element">

        <?php
        $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'hnice'));

        if ($heading) :
            ?>
            <h2><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>
        <div class="woocommerce <?php echo esc_attr($class); ?>" data-settings="<?php echo esc_attr(wp_json_encode($settings)) ?>">
            <?php woocommerce_product_loop_start(); ?>

            <?php foreach ($related_products as $related_product) : ?>

                <?php
                $post_object = get_post($related_product->get_id());

                setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

                wc_get_template_part('content', 'product');
                ?>

            <?php endforeach; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php if ($show_dots) : ?>
                <div class="swiper-pagination swiper-pagination  related-swiper-pagination"></div>
            <?php endif; ?>
            <?php if ($show_arrows) : ?>
                <div class="elementor-swiper-button elementor-swiper-button-prev related-swiper-button-prev">
                    <i aria-hidden="true" class="hnice-icon-left-arrow"></i>
                    <span class="elementor-screen-only"><?php echo esc_html__('Previous', 'hnice'); ?></span>
                </div>
                <div class="elementor-swiper-button elementor-swiper-button-next related-swiper-button-next">
                    <i aria-hidden="true" class="hnice-icon-right-arrow"></i>
                    <span class="elementor-screen-only"><?php echo esc_html__('Next', 'hnice'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php
endif;

wp_reset_postdata();
