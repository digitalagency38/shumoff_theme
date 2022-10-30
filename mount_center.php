<?php
/*
Template Name: Установочный центр
*/

get_header();
$first_form_block = get_field('first_form_block');
$prices = get_field('prices');
$form_shortcode = get_field('form_shortcode');
$questions = get_field('questions');
$portfolio = get_field('portfolio');
$text_block = get_field('text_block');
$seo_block = get_field('seo_block');
$contacts = get_field('contacts');

$site_phone = get_option('site_phone');
$site_address = get_option('site_address');
$site_worktime = get_option('site_worktime');
$site_email = get_option('site_email');
?>

<main class="content">
    <div class="breadcrums center_block">
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
    <div class="page_service">
        <? if (!empty($first_form_block)) { ?>
            <div class="page_service__first center_block">
                <?
                    $image = $first_form_block['image'];
                    $size = 'large';
                    $alt = $image['alt'];
                    $thumb = $image['sizes'][ $size ];

                ?>
                <div class="page_service__first--item"
                    style="background: url('<?php echo esc_url($thumb); ?>') 50% / cover no-repeat;">
                    <div class="page_service__first--l-side">
                        <div class="page_service__first--title"><?= $first_form_block['title']; ?></div>
                        <div class="page_service__first--text"><?= $first_form_block['text']; ?></div>
                    </div>
                    <div class="page_service__first--r-side">
                        <div class="page_service__first--form">
                            <div class="page_service__first--tit">Оставьте заявку</div>
                            <?= do_shortcode($first_form_block['form_shortcode']); ?>
                            <!-- <form action="">
                                <input type="text" placeholder="Ваше имя">
                                <input type="tel" placeholder="Телефон">
                                <button type="submit" href="#" class="page_service__first--btn button button__all-line">
                                    <svg>
                                        <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                    </svg>
                                    <span>Отправить заявку</span>
                                </button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        <? }; ?>
        <? if (!empty($prices)) { ?>
            <div class="page_service__info center_block">
                <div class="page_service__info--l-side">
                    <div class="page_service__info--title"><?= $prices['title'] ?></div>
                    <div class="page_service__info--list">
                        <?foreach ($prices['list'] as $price):?>
                            <div class="page_service__info--block">
                                <div class="page_service__info--left"><?= $price['name']; ?></div>
                                <div class="page_service__info--right"><?= $price['price']; ?></div>
                            </div>
                        <?endforeach;?>

                    </div>
                </div>
                <div class="page_service__info--r-side">
                    <?
                        $image = $prices['image'];
                        $size = 'large';
                        $alt = $image['alt'];
                        $thumb = $image['sizes'][ $size ];

                        if( $image ):
                    ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        <? }; ?>
        <? if (!empty($form_shortcode)) { ?>
            <div class="page_service__form center_block">
                <div class="page_service__form--item">
                    <div class="page_service__form--title">Оставьте заявку</div>
                    <?= do_shortcode($form_shortcode); ?>
                </div>
            </div>
        <? }; ?>
        <? if (!empty($questions)) { ?>
            <div class="tabs_blockss center_block">
                <div class="review__title"><?= $questions['title']; ?></div>
                <div class="review">
                    <div class="review__tabs">
                        <ul>
                            <?foreach($questions['list'] as $key=>$title):?>
                                <li class="review__btn<?if ($key == '0'):?> isActive<?endif;?>" id="review__block-<?= $key; ?>"><?= $title['title']; ?></li>
                            <?endforeach;?>
                        </ul>
                    </div>
                    <div class="review__blocks">
                        <?foreach($questions['list'] as $key=>$text):?>
                            <div class="review__block review__block-<?= $key; ?><?if ($key == '0'):?> isActive<?endif;?>">
                                <?= $text['text']; ?>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        <? }; ?>
    </div>
    
    <? if (!empty($portfolio)) { ?>
        <div class="work_slider center_block">
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
                            <?php endif; ?>
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
    <div class="exp_block center_block">
        <div class="exp_block__title">Наш опыт</div>
        <div class="exp_block__slider js_sl8">
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp1.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp1.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">27 работ</div>
            </a>
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp2.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp2.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">10 работ</div>
            </a>
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp3.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp3.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">10 работ</div>
            </a>
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp4.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp4.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">10 работ</div>
            </a>
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp5.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp5.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">10 работ</div>
            </a>
            <a href="#" class="exp_block__block">
                <div class="exp_block__img">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp6.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/exp6.png" alt=""></picture>
                </div>
                <div class="exp_block__tit button button__link">10 работ</div>
            </a>
        </div>
        <a href="#" class="exp_block__show button button__all-line">
            <svg>
                <rect x="0" y="0" fill="none" width="100%" height="100%" />
            </svg>
            <span>Показать всё</span>
        </a>
    </div>
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
                    <div class="more_block__title"><?= $text_block['title']; ?></div>
                    <div class="more_block__text"><?= $text_block['text']; ?></div>
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
            <div class="main_product__top wow fadeInUp">
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
            <div class="main_product__bottom js_sl7 wow fadeInUp">
                <?= do_shortcode('[products]'); ?>
            </div>
        </div>
    </div>
    <? if (!empty($contacts)) { ?>
        <div class="map_block center_block">
            <div class="map_block__in">
                <div class="map_block__l-side">
                    <div class="mapBlock" id="map" style="height: 100%;"></div>
                </div>
                <div class="map_block__r-side">
                    <div class="map_block__title"><?= $contacts['title']; ?></div>
                    <?if (!empty($site_address)):?>
                        <div class="map_block__info">
                            <span>Адрес</span>
                            <?= $site_address; ?>
                        </div>
                    <?endif;?>
                    <?if (!empty($site_phone)):?>
                        <div class="map_block__info">
                            <span>Телефон</span>
                            <a href="tel:<?= $site_phone; ?>"><?= $site_phone; ?></a>
                        </div>
                    <?endif;?>
                    <?if (!empty($site_worktime)):?>
                        <div class="map_block__info">
                            <span>Время работы</span>
                            <?= $site_worktime; ?>
                        </div>
                    <?endif;?>
                    <?if (!empty($site_email)):?>
                        <div class="map_block__info">
                            <span>Почта</span>
                            <a href="mailto:<?= $site_email; ?>"><?= $site_email; ?></a>
                        </div>
                    <?endif;?>
                    <a href="<?= $contacts['link']; ?>" class="map_block__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span>Контакты</span>
                    </a>
                </div>
            </div>
        </div>
    <? }; ?>
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