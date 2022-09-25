<?php
/*
Template Name: Портфолио
*/

get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'portfolio'
);

$portfolio = get_posts( $args );

?>

<main class="content">
    <div class="breadcrums center_block">
        <div class="breadcrums__item">
            <div class="breadcrums__in">
                <a href="/">Главная</a>
                <div class="breadcrums__splash"></div>
                <a href="#">Подкатегория</a>
                <div class="breadcrums__splash"></div>
                <span>Данная страница</span>
            </div>
        </div>
    </div>
    <div class="main_work center_block">
        <h1 class="main_work__h1">Посмотрите наши работы</h1>
        <div class="main_work__blocks">
        <?php foreach( $portfolio as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
                <div class="main_work__slid">
                    <div class="main_work__images">
                        <div class="main_work__date"><?= get_the_date(); ?></div>
                        <?
                            $image = get_field('image');
                            $size = 'large';
                            $alt = $image['alt'];
                            $thumb = $image['sizes'][ $size ];

                            if( $image ):
                        ?>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="main_work__info">
                        <a href="#" class="main_work__tit"><? the_title(); ?></a>
                        <div class="main_work__text"><?= get_field('description') ?></div>
                        <a href="<? the_permalink(); ?>" class="main_work__more button button__line">Подробнее</a>
                    </div>
                </div>
                <?php }; ?>
            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
        </div>
        <? if (count($portfolio) > 6) { ?>
            <div class="main_work__all button button__all-line">
                <svg>
                    <rect x="0" y="0" fill="none" width="100%" height="100%" />
                </svg>
                <span>Загрузить ещё</span>
            </div>
        <? }; ?>
    </div>
</main>

<?php
get_footer();
?>