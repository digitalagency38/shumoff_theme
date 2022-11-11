<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auvint
 */

get_header();
$mainSlider = get_field('main_slider');
$categories = get_terms( 'product_cat');
$tiles = get_field('tiles');
$portfolio = get_field('portfolio');
$text_block = get_field('text_block');
$reviews = get_field('reviews');
$seo_block = get_field('seo_block');

?>

<main class="content" v-if="isLoaded">
    <? if (!empty($mainSlider)) { ?>
        <div class="first_slider">
            <div class="block_runner">
                <div class="block_runner_in" id="marquee">
                    <span style="min-width: 100vw; max-width: 100vw; display: block; text-align: center;" v-for="svg in 3">
                        <svg width="70%" viewBox="0 0 1292 354" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 18.3246H55.1753V234.906H129.598V18.3246H184.59V234.906H258.279V18.3246H313.088V276.379H0V18.3246Z"
                                fill="white" />
                            <path
                                d="M415.74 254.756L468.349 84.6105H524.991L445.252 305.268C443.541 310.113 441.219 315.311 438.286 320.865C435.476 326.418 431.626 331.676 426.738 336.639C421.972 341.72 415.923 345.855 408.591 349.045C401.381 352.235 392.521 353.831 382.011 353.831C377.001 353.831 372.907 353.535 369.73 352.944C366.552 352.354 362.764 351.527 358.365 350.463V313.067C359.709 313.067 361.114 313.067 362.581 313.067C364.047 313.185 365.453 313.244 366.797 313.244C373.762 313.244 379.445 312.476 383.844 310.94C388.244 309.404 391.788 307.041 394.476 303.85C397.165 300.778 399.303 296.761 400.892 291.798L415.74 254.756ZM393.743 84.6105L436.82 223.563L444.336 277.62L408.407 281.341L337.101 84.6105H393.743Z"
                                fill="white" />
                            <path
                                d="M666.687 217.714L718.746 84.6105H761.823L684.467 276.379H648.906L571.917 84.6105H614.994L666.687 217.714ZM602.346 84.6105V276.379H549.554V84.6105H602.346ZM732.31 276.379V84.6105H785.103V276.379H732.31Z"
                                fill="white" />
                            <path
                                d="M822.864 182.444V178.722C822.864 164.662 824.941 151.724 829.096 139.908C833.251 127.974 839.301 117.635 847.244 108.892C855.187 100.148 864.963 93.3541 876.573 88.5097C888.182 83.5471 901.503 81.0658 916.534 81.0658C931.565 81.0658 944.946 83.5471 956.678 88.5097C968.409 93.3541 978.247 100.148 986.19 108.892C994.256 117.635 1000.37 127.974 1004.52 139.908C1008.68 151.724 1010.75 164.662 1010.75 178.722V182.444C1010.75 196.387 1008.68 209.325 1004.52 221.259C1000.37 233.074 994.256 243.413 986.19 252.275C978.247 261.018 968.471 267.812 956.861 272.657C945.252 277.501 931.932 279.924 916.9 279.924C901.869 279.924 888.488 277.501 876.756 272.657C865.147 267.812 855.309 261.018 847.244 252.275C839.301 243.413 833.251 233.074 829.096 221.259C824.941 209.325 822.864 196.387 822.864 182.444ZM875.656 178.722V182.444C875.656 190.479 876.39 197.982 877.856 204.953C879.322 211.924 881.644 218.069 884.822 223.386C888.121 228.584 892.398 232.661 897.653 235.615C902.908 238.569 909.324 240.046 916.9 240.046C924.233 240.046 930.526 238.569 935.781 235.615C941.036 232.661 945.252 228.584 948.429 223.386C951.606 218.069 953.928 211.924 955.395 204.953C956.983 197.982 957.778 190.479 957.778 182.444V178.722C957.778 170.924 956.983 163.598 955.395 156.745C953.928 149.774 951.545 143.63 948.246 138.313C945.069 132.878 940.852 128.624 935.598 125.552C930.343 122.48 923.988 120.944 916.534 120.944C909.079 120.944 902.725 122.48 897.47 125.552C892.337 128.624 888.121 132.878 884.822 138.313C881.644 143.63 879.322 149.774 877.856 156.745C876.39 163.598 875.656 170.924 875.656 178.722Z"
                                fill="white" />
                            <path
                                d="M1110.47 276.379H1057.31V67.5959C1057.31 53.0626 1060.25 40.8334 1066.11 30.9083C1072.1 20.8649 1080.47 13.3029 1091.22 8.22217C1102.1 3.02328 1114.99 0.423828 1129.9 0.423828C1134.79 0.423828 1139.5 0.778298 1144.02 1.48724C1148.54 2.07802 1152.94 2.84604 1157.22 3.79129L1156.67 42.2513C1154.34 41.6605 1151.9 41.247 1149.33 41.0107C1146.77 40.7743 1143.77 40.6562 1140.35 40.6562C1134 40.6562 1128.56 41.7196 1124.04 43.8464C1119.64 45.8551 1116.28 48.8681 1113.96 52.8854C1111.63 56.9027 1110.47 61.8062 1110.47 67.5959V276.379ZM1150.07 84.6105V120.766H1027.8V84.6105H1150.07Z"
                                fill="white" />
                            <path
                                d="M1245.02 276.379H1191.86V67.5959C1191.86 53.0626 1194.79 40.8334 1200.66 30.9083C1206.65 20.8649 1215.02 13.3029 1225.77 8.22217C1236.65 3.02328 1249.54 0.423828 1264.45 0.423828C1269.34 0.423828 1274.04 0.778298 1278.56 1.48724C1283.09 2.07802 1287.49 2.84604 1291.76 3.79129L1291.21 42.2513C1288.89 41.6605 1286.45 41.247 1283.88 41.0107C1281.31 40.7743 1278.32 40.6562 1274.9 40.6562C1268.54 40.6562 1263.11 41.7196 1258.58 43.8464C1254.18 45.8551 1250.82 48.8681 1248.5 52.8854C1246.18 56.9027 1245.02 61.8062 1245.02 67.5959V276.379ZM1284.61 84.6105V120.766H1162.35V84.6105H1284.61Z"
                                fill="white" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="first_slider__in center_block">
                <div class="first_slider__sl js_sl6">
                    <? foreach ($mainSlider as $item) { ?>
                        <div class="first_slider__block">
                            <div class="first_slider__l-side">
                                <div class="first_slider__title">
                                    <?= $item['title'] ?>
                                </div>
                                <div class="first_slider__text"><?= $item['tekst'] ?></div>
                                <a href="<?= $item['link'] ?>" class="first_slider__btn button button__all-line">
                                    <svg>
                                        <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                    </svg>
                                    <span><?= $item['link_text'] ?></span>
                                </a>
                            </div>
                            <div class="first_slider__r-side">
                                <?
                                    $image = $item['image'];
                                    $size = 'large';
                                    $alt = $image['alt'];
                                    $thumb = $image['sizes'][ $size ];

                                    if( $image ):
                                ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                <?endif; ?>
                            </div>
                        </div>
                    <? }; ?>
                </div>
                <div class="first_slider__arrows">
                    <div class="first_slider__arrow--left button button__all-arrow">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="first_slider__inf">
                        <div class="slides-numbers" style="display: block;">
                            <span class="active">0{{firstBlock.index}}</span>
                        </div>
                        <div class="slider-progress">
                            <div class="progress isInProgress"></div>
                        </div>
                    </div>
                    <div class="first_slider__arrow--right button button__all-arrow">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    <? }; ?>
    <div class="cat_block center_block">
        <? if ( $categories ) { ?>
            <!-- <div class="cat_block__block big_block wow fadeInUp"> -->
            <div class="cat_block__block big_block">
                <div class="cat_block__icon"><img src="<?= get_template_directory_uri();?>/src/dist/img/cat1.svg" alt=""></div>
                <div class="cat_block__top">
                    <? if (!empty($tiles)) { ?>
                        <div class="cat_block__items">
                            <div class="cat_block__title"><?= $tiles['catalog_title'] ?></div>
                            <span><?= $tiles['catalog_text'] ?></span>
                        </div>
                    <? }; ?>
                    <nav class="cat_block__menu">
                        <ul>
                            <? foreach ( $categories as $category ) { ?>
                                <li><a href="<?= esc_url( get_term_link( $category ) ); ?>"><?= $category->name; ?> <sup><?= $category->count; ?></sup></a></li>
                            <? }; ?>
                        </ul>
                    </nav>
                    <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="cat_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span><?= $tiles['catalog_link_text'] ?></span>
                    </a>
                </div>
            </div>
        <? }; ?>
        <div class="cat_block__item">
            <? if ($tiles['calc_link']) { ?>
                <!-- <div class="cat_block__block wow fadeInUp"> -->
                <div class="cat_block__block">
                    <div class="cat_block__icon"><img src="<?= get_template_directory_uri();?>/src/dist/img/cat2.svg" alt=""></div>
                    <div class="cat_block__title">Калькулятор</div>
                    <div class="cat_block__text">Рассчитайте стоимость шумоизоляции для вашего автомобиля</div>
                    <a href="<?= $tiles['calc_link'] ?>" class="cat_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span>Подробнее</span>
                    </a>
                </div>
            <? }; ?>
            <? if ($tiles['center_link']) { ?>
                <!-- <div class="cat_block__block wow fadeInUp"> -->
                <div class="cat_block__block">
                    <div class="cat_block__icon"><img src="<?= get_template_directory_uri();?>/src/dist/img/cat3.svg" alt=""></div>
                    <div class="cat_block__title">Установочный центр</div>
                    <div class="cat_block__text">Установка шумозоляции в авторизованном центре в Иркутске</div>
                    <a href="<?= $tiles['center_link'] ?>" class="cat_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span>Подробнее</span>
                    </a>
                </div>
            <? }; ?>
        </div>
    </div>
    <? if (!empty($portfolio)) { ?>
        <div class="work_slider center_block">
            <!-- <div class="work_slider__top wow fadeInUp"> -->
            <div class="work_slider__top">
                <div class="work_slider__title"><?= $portfolio['title']; ?></div>
                <div class="work_slider__buttons">
                    <div class="button button__all-arrow work_prev">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="button button__all-arrow work_next">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <a href="<?= $portfolio['link']; ?>" class="work_slider__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span><?= $portfolio['link_text']; ?></span>
                    </a>
                </div>
            </div>
            <!-- <div class="work_slider__slider js_sl4 wow fadeInUp"> -->
            <div class="work_slider__slider js_sl4">
                <?php foreach( $portfolio['items'] as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <div class="work_slider__slid">
                        <div class="work_slider__images">
                            <div class="work_slider__date"><?= get_the_date(); ?></div>
                            <?
                                $image = get_field('image');
                                $size = 'large';
                                $alt = $image['alt'];
                                $thumb = $image['sizes'][ $size ];

                                if( $image ):
                            ?>
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            <?endif; ?>
                        </div>
                        <div class="work_slider__info">
                            <a href="#" class="work_slider__tit"><? the_title(); ?></a>
                            <div class="work_slider__text"><?= get_field('description') ?></div>
                            <a href="<? the_permalink(); ?>" class="work_slider__more button button__line">Подробнее</a>
                        </div>
                    </div>
                <?php }; ?>
                <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
            </div>
        </div>
    <? }; ?>
    <? if (!empty($text_block)) { ?>
        <div class="more_block">
            <div class="more_block__in center_block">
                    <?
                        $image = $text_block['image'];
                        $size = 'large';
                        $alt = $image['alt'];
                        $thumb = $image['sizes'][ $size ];
                    ?>
                <div class="more_block__item" style="background: url('<?php echo esc_url($thumb); ?>') 50% / cover no-repeat;">
                    <!-- <div class="more_block__title wow fadeInUp"></div> -->
                    <div class="more_block__title"><?= $text_block['title']; ?></div>
                    <!-- <div class="more_block__text wow fadeInUp"></div> -->
                    <div class="more_block__text"><?= $text_block['text']; ?></div>
                    <!-- <a href="" class="more_block__btn button button__all-line wow fadeInUp"> -->
                    <a href="<?= $text_block['link']; ?>" class="more_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span><?= $text_block['link_text']; ?></span>
                    </a>
                </div>
            </div>
        </div>
    <? }; ?>
    
    <div class="main_product">
        <div class="main_product__in center_block">
            <!-- <div class="main_product__top wow fadeInUp"> -->
            <div class="main_product__top">
                <div class="main_product__title">Товары нашего магазина</div>
                <div class="main_product__buttons">
                    <div class="button button__all-arrow prod_prev">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="button button__all-arrow prod_next">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="main_product__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span>Перейти в каталог</span>
                    </a>
                </div>
            </div>
            <!-- <div class="main_product__bottom js_sl7 wow fadeInUp"> -->
            <div class="main_product__bottom js_sl7">
                <?= do_shortcode('[products]'); ?>
            </div>
        </div>
    </div>
    <? if (!empty($reviews)) { ?>
        <div class="rev_block center_block">
            <!-- <div class="rev_block__top wow fadeInUp"> -->
            <div class="rev_block__top">
                <!-- <div class="rev_block__title wow fadeInUp"></div> -->
                <div class="rev_block__title"><?= $reviews['title']; ?></div>
                <!-- <div class="button button__all-arrow rev_prev wow fadeInUp"> -->
                <div class="button button__all-arrow rev_prev">
                    <svg class="ln">
                        <rect x="0" y="0" fill="none" width="100%" height="100%" />
                    </svg>
                    <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
                            fill="#333333" />
                    </svg>
                </div>
                <!-- <div class="button button__all-arrow rev_next wow fadeInUp"> -->
                <div class="button button__all-arrow rev_next">
                    <svg class="ln">
                        <rect x="0" y="0" fill="none" width="100%" height="100%" />
                    </svg>
                    <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
                            fill="#333333" />
                    </svg>
                </div>
            </div>
            <!-- <div class="rev_block__slider js_sl3 wow fadeInUp"> -->
            <div class="rev_block__slider js_sl3">
                <?php foreach( $reviews['spisok'] as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <div class="rev_block__block">
                        <div class="rev_block__block--top">
                            <div class="rev_block__block--img">
                                <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
                            </div>
                            <div class="rev_block__block--info">
                                <div class="rev_block__block--name"><? the_title(); ?></div>
                                <div class="rev_block__block--date"><?= get_the_date(); ?></div>
                            </div>
                        </div>
                        <div class="rev_block__block--txt"><?= get_the_content(); ?></div>
                        <div class="rev_block__block--bottom">
                            <div class="rev_block__block--l-side">
                                <span>Источник:</span>
                                <a href="<?= get_field('source_link'); ?>">
                                    <?
                                        $image = get_field('source');
                                        $size = 'thumbnail';
                                        $alt = $image['alt'];
                                        $thumb = $image['sizes'][ $size ];

                                        if( $image ):
                                    ?>
                                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                    <?endif; ?>
                                </a>
                            </div>
                            <div class="rev_block__block--r-side">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.202 1.05662C10.6021 0.526842 11.3979 0.526843 11.798 1.05662L15.2601 5.64079C15.3798 5.79923 15.5439 5.91846 15.7315 5.98329L21.1612 7.85937C21.7887 8.07619 22.0346 8.83301 21.6544 9.37724L18.3644 14.0865C18.2507 14.2493 18.188 14.4422 18.1843 14.6407L18.0779 20.3843C18.0657 21.0481 17.4219 21.5159 16.7868 21.3224L11.2913 19.6487C11.1014 19.5909 10.8986 19.5909 10.7087 19.6487L5.21323 21.3224C4.57815 21.5159 3.93435 21.0481 3.92205 20.3843L3.81565 14.6407C3.81198 14.4422 3.74929 14.2493 3.63559 14.0865L0.345632 9.37724C-0.0345753 8.83301 0.211334 8.07618 0.838819 7.85937L6.26848 5.98329C6.45613 5.91846 6.62024 5.79923 6.73989 5.64079L10.202 1.05662Z"
                                        fill="#F1752A" />
                                </svg>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.202 1.05662C10.6021 0.526842 11.3979 0.526843 11.798 1.05662L15.2601 5.64079C15.3798 5.79923 15.5439 5.91846 15.7315 5.98329L21.1612 7.85937C21.7887 8.07619 22.0346 8.83301 21.6544 9.37724L18.3644 14.0865C18.2507 14.2493 18.188 14.4422 18.1843 14.6407L18.0779 20.3843C18.0657 21.0481 17.4219 21.5159 16.7868 21.3224L11.2913 19.6487C11.1014 19.5909 10.8986 19.5909 10.7087 19.6487L5.21323 21.3224C4.57815 21.5159 3.93435 21.0481 3.92205 20.3843L3.81565 14.6407C3.81198 14.4422 3.74929 14.2493 3.63559 14.0865L0.345632 9.37724C-0.0345753 8.83301 0.211334 8.07618 0.838819 7.85937L6.26848 5.98329C6.45613 5.91846 6.62024 5.79923 6.73989 5.64079L10.202 1.05662Z"
                                        fill="#F1752A" />
                                </svg>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.202 1.05662C10.6021 0.526842 11.3979 0.526843 11.798 1.05662L15.2601 5.64079C15.3798 5.79923 15.5439 5.91846 15.7315 5.98329L21.1612 7.85937C21.7887 8.07619 22.0346 8.83301 21.6544 9.37724L18.3644 14.0865C18.2507 14.2493 18.188 14.4422 18.1843 14.6407L18.0779 20.3843C18.0657 21.0481 17.4219 21.5159 16.7868 21.3224L11.2913 19.6487C11.1014 19.5909 10.8986 19.5909 10.7087 19.6487L5.21323 21.3224C4.57815 21.5159 3.93435 21.0481 3.92205 20.3843L3.81565 14.6407C3.81198 14.4422 3.74929 14.2493 3.63559 14.0865L0.345632 9.37724C-0.0345753 8.83301 0.211334 8.07618 0.838819 7.85937L6.26848 5.98329C6.45613 5.91846 6.62024 5.79923 6.73989 5.64079L10.202 1.05662Z"
                                        fill="#F1752A" />
                                </svg>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.202 1.05662C10.6021 0.526842 11.3979 0.526843 11.798 1.05662L15.2601 5.64079C15.3798 5.79923 15.5439 5.91846 15.7315 5.98329L21.1612 7.85937C21.7887 8.07619 22.0346 8.83301 21.6544 9.37724L18.3644 14.0865C18.2507 14.2493 18.188 14.4422 18.1843 14.6407L18.0779 20.3843C18.0657 21.0481 17.4219 21.5159 16.7868 21.3224L11.2913 19.6487C11.1014 19.5909 10.8986 19.5909 10.7087 19.6487L5.21323 21.3224C4.57815 21.5159 3.93435 21.0481 3.92205 20.3843L3.81565 14.6407C3.81198 14.4422 3.74929 14.2493 3.63559 14.0865L0.345632 9.37724C-0.0345753 8.83301 0.211334 8.07618 0.838819 7.85937L6.26848 5.98329C6.45613 5.91846 6.62024 5.79923 6.73989 5.64079L10.202 1.05662Z"
                                        fill="#F1752A" />
                                </svg>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.202 1.05662C10.6021 0.526842 11.3979 0.526843 11.798 1.05662L15.2601 5.64079C15.3798 5.79923 15.5439 5.91846 15.7315 5.98329L21.1612 7.85937C21.7887 8.07619 22.0346 8.83301 21.6544 9.37724L18.3644 14.0865C18.2507 14.2493 18.188 14.4422 18.1843 14.6407L18.0779 20.3843C18.0657 21.0481 17.4219 21.5159 16.7868 21.3224L11.2913 19.6487C11.1014 19.5909 10.8986 19.5909 10.7087 19.6487L5.21323 21.3224C4.57815 21.5159 3.93435 21.0481 3.92205 20.3843L3.81565 14.6407C3.81198 14.4422 3.74929 14.2493 3.63559 14.0865L0.345632 9.37724C-0.0345753 8.83301 0.211334 8.07618 0.838819 7.85937L6.26848 5.98329C6.45613 5.91846 6.62024 5.79923 6.73989 5.64079L10.202 1.05662Z"
                                        fill="#F1752A" />
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
                <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
            </div>
        </div>
    <? }; ?>
    <? if (!empty($seo_block)) { ?>
        <div class="about_block center_block">
            <!-- <div class="about_block__top wow fadeInUp"> -->
            <div class="about_block__top">
                <div class="about_block__l-side">
                    <div class="about_block__slider js_sl2">
                        <? foreach($seo_block['galereya'] as $item) { ?>
                            <div class="about_block__img">
                                <?
                                    $image = $item['image'];
                                    $size = 'large';
                                    $alt = $image['alt'];
                                    $thumb = $image['sizes'][ $size ];

                                    if( $image ):
                                ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                <?endif; ?>
                            </div>
                        <? }; ?>
                    </div>
                    <div class="js_sl1_prev button button__all-arrow">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.39272 11.9997L12.9339 3.99968V0.799683L0.933899 11.9997L12.9339 23.1997V19.9997L4.39272 11.9997Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="js_sl1_next button button__all-arrow">
                        <svg class="ln">
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.60725 11.9997L0.0660706 3.99968V0.799683L12.0661 11.9997L0.0660706 23.1997V19.9997L8.60725 11.9997Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
                <div class="about_block__r-side">
                    <!-- <div class="about_block__title wow fadeInUp"></div> -->
                    <div class="about_block__title"><?= $seo_block['title']; ?></div>
                    <!-- <div class="about_block__text wow fadeInUp"> -->
                    <div class="about_block__text">
                        <?= $seo_block['text']; ?>
                    </div>
                    <!-- <a href="" class="about_block__btn button button__all-line wow fadeInUp"> -->
                    <a href="<?= $seo_block['link']; ?>" class="about_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
                        </svg>
                        <span><?= $seo_block['link_text']; ?></span>
                    </a>
                </div>
            </div>
            <!-- <div class="about_block__bottom slider-nav wow fadeInUp"> -->
            <div class="about_block__bottom slider-nav">
                <? foreach($seo_block['galereya'] as $item) { ?>
                    <div class="about_block__blockss">
                        <?
                            $image = $item['image'];
                            $size = 'medium';
                            $alt = $image['alt'];
                            $thumb = $image['sizes'][ $size ];

                            if( $image ):
                        ?>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                        <?endif; ?>
                    </div>
                <? }; ?>
            </div>
        </div>
    <? }; ?>
    <div class="map_block center_block">
        <div class="map_block__in">
            <!-- <div class="map_block__l-side wow fadeInUp"> -->
            <div class="map_block__l-side">
                <div class="mapBlock" id="map" style="height: 100%;"></div>
            </div>
            <div class="map_block__r-side">
                <!-- <div class="map_block__title wow fadeInUp">Контакты</div> -->
                <div class="map_block__title">Контакты</div>
                <!-- <div class="map_block__info wow fadeInUp"> -->
                <div class="map_block__info">
                    <span>Адрес</span>
                    г. Иваново, ул. Лежневская, д. 111
                </div>
                <!-- <div class="map_block__info wow fadeInUp"> -->
                <div class="map_block__info">
                    <span>Телефон</span>
                    <a href="tel:74932581403">+7 (4932) 58-14-03</a>
                </div>
                <!-- <div class="map_block__info wow fadeInUp"> -->
                <div class="map_block__info">
                    <span>Время работы</span>
                    Пн - Пт: 09:00 - 19:00 <br> Сб - Вс: 09:00 - 15:00
                </div>
                <!-- <div class="map_block__info wow fadeInUp"> -->
                <div class="map_block__info">
                    <span>Почта</span>
                    <a href="mailto:pro@shumoff.biz">pro@shumoff.biz</a>
                </div>
                <!-- <a href="#" class="map_block__btn button button__all-line wow fadeInUp"> -->
                <a href="#" class="map_block__btn button button__all-line">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%" />
                    </svg>
                    <span>Контакты</span>
                </a>
            </div>
        </div>
    </div>
</main>


<?php
    get_footer();
?>