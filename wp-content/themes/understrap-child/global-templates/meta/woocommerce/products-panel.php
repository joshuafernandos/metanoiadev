<div class="row products-list">
    <?php while ($products->have_posts()) :
        $products->the_post();
        $wc_product = wc_get_product(get_the_ID());
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()));
    ?>
        <div class="col-6 col-md-3 mb-4 equal">
            <a href="<?php echo get_the_permalink() ?>" class="product-item">
                <?php if ($wc_product->is_on_sale()) : ?>
                    <div class="sale-tag">
                        On Sale!
                    </div>
                <?php endif ?>
                <div class="thumbnail mb-2">
                    <img src="<?php echo !empty($thumbnail[0]) ? $thumbnail[0] : home_url() . '/wp-content/uploads/woocommerce-placeholder.png' ?>" alt="<?php echo get_the_title() ?> Image">
                </div>
                <div class="product-item-detail">
                    <div class="product-title">
                        <h6 class="product-heading">
                            <?php echo get_the_title() ?>
                        </h6>
                    </div>
                    <div class="product-price">
                        NZD <span class="regular-price <?php echo $wc_product->is_on_sale() ? 'has-sale' : '' ?>">$<?php echo $wc_product->get_regular_price(); ?></span>
                        <?php if ($wc_product->is_on_sale()) : ?>
                            <span class="sale-price">
                                $<?php echo $wc_product->get_sale_price(); ?>
                            </span>
                        <?php endif ?>
                    </div>
                </div>
            </a>
        </div>
    <?php endwhile ?>
    <?php wp_reset_postdata() ?>
</div>