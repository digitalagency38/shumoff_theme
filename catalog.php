<?php
/*
Template Name: Категории товаров
*/

get_header();

$categories = get_terms( 'product_cat');

$seo_block = get_field('seo_block');

?>

<main class="content">
    <div class="breadcrums center_block wow fadeInUp">
        <div class="breadcrums__item">
            <div class="breadcrums__in">
                <?php
                    if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="catalog_block center_block">
        <h1 class="catalog_block__h1 wow fadeInUp">Категории товаров</h1>
        <div class="burger-body__cat-block">
            <div class="header__cat--blocks">
                <? foreach ( $categories as $category ) { ?>
                    <? if ($category->name != 'Misc'): ?>
                        <a href="<?= esc_url( get_term_link( $category ) ); ?>" class="header__cat--block wow fadeInUp">
                        <?
                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_image( $thumbnail_id, 'medium', false, array( "class" => "img-responsive" ) );

                            if ($image) {
                        ?>
                            <div class="header__cat--img">
                                <?= $image ?>
                            </div>
                            <? }; ?>
                            <div class="header__cat--info">
                                <div class="header__cat--title"><?= $category->name ?> <sup><?= $category->count ?></sup></div>
                                <div class="header__cat--price"><?= get_field('price_from', $category); ?></div>
                            </div>
                        </a>
                    <? endif; ?>
                <? }; ?>
            </div>
        </div>
    </div>
    <? if (!empty($seo_block)) { ?>
        <div class="seo_block center_block">
            <div class="seo_block__in">
                <div class="seo_block__l-side">
                    <?
                        $image = $seo_block['image'];
                        $size = 'large';
                        $alt = $image['alt'];
                        $thumb = $image['sizes'][ $size ];

                        if( $image ):
                    ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    <?php endif; ?>
                </div>
                <div class="seo_block__r-side">
                    <div class="seo_block__title"><?= $seo_block['title']; ?></div>
                    <div class="seo_block__text"><?= $seo_block['text']; ?></div>
                </div>
            </div>
        </div>
    <? }; ?>
</main>

<?php
get_footer();
?>