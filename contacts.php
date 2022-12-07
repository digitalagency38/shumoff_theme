<?php
/*
Template Name: Контакты
*/

get_header();

$site_phone = get_option('site_phone');
$site_address = get_option('site_address');
$site_worktime = get_option('site_worktime');
$site_email = get_option('site_email');
$site_name = get_option('site_name');
$site_inn = get_option('site_inn');
$site_kpp = get_option('site_kpp');
$site_ogrn = get_option('site_ogrn');

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
    <div class="contacts center_block">
        <div class="contacts__in">
            <div class="contacts__l-side wow zoomIn">
                <div class="mapBlock" id="map2" style="height: 600px;"></div>
            </div>
            <div class="contacts__r-side wow fadeInUp">
                <div class="contacts__title">Контакты</div>
                <?if ($site_address):?>
                    <div class="contacts__info">
                        <span>Адрес</span>
                        <?= $site_address; ?>
                    </div>
                <?endif;?>
                <?if ($site_phone):?>
                    <div class="contacts__info">
                        <span>Телефон</span>
                        <a href="tel:<?= $site_phone; ?>"><?= $site_phone; ?></a>
                    </div>
                <?endif;?>
                <?if ($site_worktime):?>
                    <div class="contacts__info">
                        <span>Время работы</span>
                        <?= $site_worktime; ?>
                    </div>
                <?endif;?>
                <?if ($site_email):?>
                    <div class="contacts__info">
                        <span>Почта</span>
                        <a href="mailto:<?= $site_email; ?>"><?= $site_email; ?></a>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
    <div class="rekv_block center_block">
        <div class="rekv_block__title">Реквизиты</div>
        <div class="rekv_block__blocks wow zoomIn">
            <?if ($site_name):?>
                <div class="rekv_block__block">
                    <span>Название:</span>
                    <?= $site_name; ?>
                </div>
            <?endif;?>
            <?if ($site_inn):?>
                <div class="rekv_block__block">
                    <span>ИНН:</span>
                    <?= $site_inn; ?>
                </div>
            <?endif;?>
            <?if ($site_kpp):?>
                <div class="rekv_block__block">
                    <span>КПП:</span>
                    <?= $site_kpp; ?>
                </div>
            <?endif;?>
            <?if ($site_ogrn):?>
                <div class="rekv_block__block">
                    <span>ОГРН:</span>
                    <?= $site_ogrn; ?>
                </div>
            <?endif;?>
        </div>
    </div>
</main>


<?php
get_footer();
?>