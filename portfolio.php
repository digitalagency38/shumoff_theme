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

function url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];
    
    return $url;  
};

?>

<main class="content" id="portfolio">
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
    <div class="main_work center_block">
        <h1 class="main_work__h1 wow fadeInUp">Посмотрите наши работы</h1>
        <div class="main_work__filter">
        <div class="main_work__filter--select wow fadeInUp">
            <span>Выберите марку машины:</span>
            <select v-model="selectedBrand">
                <option v-for="brand in brands" :key="brand.index" :value="brand.name">{{ brand.name }}</option>
            </select>
        </div>
        <div class="main_work__filter--select wow fadeInUp">
            <span>Выберите модель:</span>
            <select name="" id="single-model" v-model="selectedModel">
                <option v-for="model in uniqueModels" :key="model.index" :value="model.name">{{ model.name }}</option>
            </select>
        </div>
        <div class="main_work__filter--refresh button button__line" @click="clearFilter">Сбросить</div>
    </div>
        <div class="main_work__blocks" :style="`--blocksShowed: ${mainWork.vievedItems};`">
        <?php foreach( $portfolio as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
                <div class="main_work__slid wow zoomInUp" data-vendor="<?= get_field('parametry')['marka']; ?>" data-model="<?= get_field('parametry')['model']; ?>" v-if="('<?= get_field('parametry')['marka']; ?>' == selectedBrand && '<?= get_field('parametry')['model']; ?>' == selectedModel) || ('<?= get_field('parametry')['marka']; ?>' == selectedBrand && selectedModel == undefined) || ('<?= get_field('parametry')['marka']; ?>' == selectedBrand && selectedModel == 'Все') || (selectedBrand == 'Все' && selectedModel == 'Все')">
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
                        <a href="<? the_permalink(); ?>" class="main_work__tit"><? the_title(); ?></a>
                        <div class="main_work__text"><?= get_field('description') ?></div>
                        <a href="<? the_permalink(); ?>" class="main_work__more button button__line">Подробнее</a>
                    </div>
                </div>
                <?php }; ?>
            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
        </div>
        <div class="main_work__all button button__all-line" @click="mainWork.showMore.apply(mainWork)" v-if="mainWork.vievedItems < mainWork.itemsCount">
            <svg>
                <rect x="0" y="0" fill="none" width="100%" height="100%" />
            </svg>
            <span>Загрузить ещё</span>
        </div>
    </div>
</main>

<?php
get_footer();
?>
