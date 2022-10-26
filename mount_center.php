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
                    <a href="#" class="main_product__btn button button__all-line">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%" />
                        </svg>
                        <span>Перейти в каталог</span>
                    </a>
                </div>
            </div>
            <div class="main_product__bottom js_sl7">
                <div class="main_product__block">
                    <div class="main_product__img">
                        <picture>
                            <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr1.webp"
                                type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr1.jpg"
                                alt=""></picture>
                    </div>
                    <div class="main_product__info">
                        <a href="#" class="main_product__tit">Шумофф П4В</a>
                        <div class="main_product__price">320 ₽ / лист</div>
                        <a href="#" class="main_product__cart button button__all-line2">
                            <svg сlass="ln">
                                <rect x="0" y="0" fill="none" width="100%" height="100%" />
                            </svg>
                            <span>
                                <svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
                                        fill="#111111" />
                                </svg>
                                Добавить в корзину
                            </span>
                        </a>
                    </div>
                </div>
                <div class="main_product__block">
                    <div class="main_product__img">
                        <picture>
                            <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr2.webp"
                                type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr2.jpg"
                                alt=""></picture>
                    </div>
                    <div class="main_product__info">
                        <a href="#" class="main_product__tit">Шумофф Комфорт 6</a>
                        <div class="main_product__price">910 ₽ / лист</div>
                        <a href="#" class="main_product__cart button button__all-line2">
                            <svg сlass="ln">
                                <rect x="0" y="0" fill="none" width="100%" height="100%" />
                            </svg>
                            <span>
                                <svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
                                        fill="#111111" />
                                </svg>
                                Добавить в корзину
                            </span>
                        </a>
                    </div>
                </div>
                <div class="main_product__block">
                    <div class="main_product__img">
                        <picture>
                            <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr3.webp"
                                type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr3.jpg"
                                alt=""></picture>
                    </div>
                    <div class="main_product__info">
                        <a href="#" class="main_product__tit">Шумoff Practik BlockOut</a>
                        <div class="main_product__price">572 ₽ / лист</div>
                        <a href="#" class="main_product__cart button button__all-line2">
                            <svg сlass="ln">
                                <rect x="0" y="0" fill="none" width="100%" height="100%" />
                            </svg>
                            <span>
                                <svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
                                        fill="#111111" />
                                </svg>
                                Добавить в корзину
                            </span>
                        </a>
                    </div>
                </div>
                <div class="main_product__block">
                    <div class="main_product__img">
                        <picture>
                            <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr1.webp"
                                type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr1.jpg"
                                alt=""></picture>
                    </div>
                    <div class="main_product__info">
                        <a href="#" class="main_product__tit">Шумофф Комфорт 10</a>
                        <div class="main_product__price">1200 ₽ / лист</div>
                        <a href="#" class="main_product__cart button button__all-line2">
                            <svg сlass="ln">
                                <rect x="0" y="0" fill="none" width="100%" height="100%" />
                            </svg>
                            <span>
                                <svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
                                        fill="#111111" />
                                </svg>
                                Добавить в корзину
                            </span>
                        </a>
                    </div>
                </div>
                <div class="main_product__block">
                    <div class="main_product__img">
                        <picture>
                            <source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr2.webp"
                                type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/sr2.jpg"
                                alt=""></picture>
                    </div>
                    <div class="main_product__info">
                        <a href="#" class="main_product__tit">Шумофф Комфорт 6</a>
                        <div class="main_product__price">910 ₽ / лист</div>
                        <a href="#" class="main_product__cart button button__all-line2">
                            <svg сlass="ln">
                                <rect x="0" y="0" fill="none" width="100%" height="100%" />
                            </svg>
                            <span>
                                <svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
                                        fill="#111111" />
                                </svg>
                                Добавить в корзину
                            </span>
                        </a>
                    </div>
                </div>
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