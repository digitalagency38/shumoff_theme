<?php
/*
Template Name: Калькулятор
*/

get_header();

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
            <div class="calc_block center_block">
    <h1 class="calc_block__h1">Калькулятор</h1>
    <div class="calc_block__items">
        <div class="calc_block__l-side">
            <div class="calc_model">
                <div class="calc_model__l-side">
                    <div class="calc_model__tit">Рассчитать по марке и модели</div>
                    <div class="calc_model__selects">
                        <div class="calc_model__selects--span">Выберите марку машины:</div>
                        <select name="" id="single">
                            <option value="Audi">Audi</option>
                            <option value="Audi2">Audi2</option>
                            <option value="Audi3">Audi3</option>
                        </select>
                    </div>
                    <div class="calc_model__selects">
                        <div class="calc_model__selects--span">Выберите модель:</div>
                        <select name="" id="single-model">
                            <option value="q7">q7</option>
                            <option value="q72">q72</option>
                            <option value="q73">q73</option>
                        </select>
                    </div>
                </div>
                <div class="calc_model__r-side">
                    <div class="calc_model__tit">Рассчитать по кузову</div>
                    <div class="calc_model__items">
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car1.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car1.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Хэтчбек">
                                <span>Хэтчбек</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car2.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car2.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Купе">
                                <span>Купе</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car3.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car3.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Седан">
                                <span>Седан</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car4.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car4.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Универсал">
                                <span>Универсал</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car5.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car5.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Кроссовер">
                                <span>Кроссовер</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car6.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car6.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Джип">
                                <span>Джип</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car7.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car7.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Пикап">
                                <span>Пикап</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="custom-radio">
                                <picture><source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/car8.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/car8.jpg" alt=""></picture>
                                <input type="radio" name="color" value="Микроавтобус">
                                <span>Микроавтобус</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calc_block__orange-info">
                Ваш автомобиль: <span class="calc_block__orange-info--car">Audi</span> <span class="calc_block__orange-info--model">Q7</span> Кроссовер, чтобы увидеть расчет, листайте вниз
            </div>
            <div class="calc_block__tabs">
                <div class="calc_block__tabs--tit">Выберите вариант шумоизоляции:</div>
                <div class="calc_block__tabs--top">
                    <div class="calc_block__tabs--tab isActive">Максимальный <br> эффект</div>
                    <div class="calc_block__tabs--tab">Отличный <br> эффект</div>
                    <div class="calc_block__tabs--tab">Хороший <br> эффект</div>
                    <div class="calc_block__tabs--tab">Практичный <br> эффект</div>
                </div>
                <div class="calc_block__tabs--info">
                    <div class="calc_block__tabs--text isActive">Максимальный эффект - для тех, кто хочет сделать свою машину максимально тихой. Комплект включает в себя самые эффективные материалы Шумофф. Каждый материал разрабатывался для определенных областей применения, и обладает уникальными свойствами.</div>
                    <div class="calc_block__tabs--text">Максимальный эффект - для тех, кто хочет сделать свою машину максимально тихой. Комплект включает в себя самые эффективные материалы Шумофф. Каждый материал разрабатывался для определенных областей применения, и обладает уникальными свойствами.</div>
                    <div class="calc_block__tabs--text">Максимальный эффект - для тех, кто хочет сделать свою машину максимально тихой. Комплект включает в себя самые эффективные материалы Шумофф. Каждый материал разрабатывался для определенных областей применения, и обладает уникальными свойствами.</div>
                    <div class="calc_block__tabs--text">Максимальный эффект - для тех, кто хочет сделать свою машину максимально тихой. Комплект включает в себя самые эффективные материалы Шумофф. Каждый материал разрабатывался для определенных областей применения, и обладает уникальными свойствами.</div>
                </div>
            </div>
            <div class="calc_block__warning">
                <div class="calc_block__warning--in">
                    Мы подобрали оптимальное количество материалов для шумоизоляции вашего автомобиля, но вы можете изменить количество вручную ниже
                </div>
            </div>
            <div class="calc_block__options">
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Внутрь дверей, 4 двери</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Тех. отверстия в дверях + пластиковые обшивки, 4 двери</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Пол салона</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Пол багажника</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Арки со стороны салона, 2 арки</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Крыша</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Крышка капота</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Крышка багажника</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Перегородка моторного отсека</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Пластиковые подкрылки, 4 арки</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
                <div class="calc_block__options--block">
                    <div class="calc_block__options--title">Металл арок, 4 арки</div>
                    <div class="calc_block__options--list">
                        <div class="calc_block__options--item" data-number="1.">
                            <div class="calc_block__options--name">Шумоff Black Jack (Блэк Джек)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="2.">
                            <div class="calc_block__options--name">Шумофф Комфорт 10</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                        <div class="calc_block__options--item" data-number="3.">
                            <div class="calc_block__options--name">Шумоff Specific в деталях (Специфик)</div>
                            <div class="calc_block__options--count"></div>
                        </div>
                    </div>
                    <div class="calc_block__options--total-price">
                        Цена комплекта: <span>5 060 ₽</span>
                    </div>
                    <div class="calc_block__options--total-weight">
                        Масса комплекта: <span>8.1 кг.</span>
                    </div>
                </div>
            </div>
            <div class="calc_block__total">
                <div class="calc_block__total--title">Итого:</div>
                <div class="calc_block__total--blocks">
                    <div class="calc_block__total--block">
                        <div class="calc_block__total--top">
                            <div class="calc_block__total--tit">Внутрь дверей, 4 двери</div>
                            <div class="calc_block__total--prc">6 260 ₽</div>
                        </div>
                        <div class="calc_block__total--text">
                            <div class="calc_block__total--l-side">
                                <ol class="calc_block__total--list">
                                    <li data-number="1.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="2.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="3.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                </ol>
                            </div>
                            <div class="calc_block__total--r-side">
                                <div class="calc_block__total--price">
                                    Цена комплекта:
                                    <span>5 060 ₽</span>
                                </div>
                                <div class="calc_block__total--price">
                                    Масса комплекта:
                                    <span>8.1 кг.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc_block__total--block isOpened">
                        <div class="calc_block__total--top">
                            <div class="calc_block__total--tit">Внутрь дверей, 4 двери</div>
                            <div class="calc_block__total--prc">6 260 ₽</div>
                        </div>
                        <div class="calc_block__total--text">
                            <div class="calc_block__total--l-side">
                                <ol class="calc_block__total--list">
                                    <li data-number="1.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="2.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="3.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                </ol>
                            </div>
                            <div class="calc_block__total--r-side">
                                <div class="calc_block__total--price">
                                    Цена комплекта:
                                    <span>5 060 ₽</span>
                                </div>
                                <div class="calc_block__total--price">
                                    Масса комплекта:
                                    <span>8.1 кг.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc_block__total--block">
                        <div class="calc_block__total--top">
                            <div class="calc_block__total--tit">Внутрь дверей, 4 двери</div>
                            <div class="calc_block__total--prc">6 260 ₽</div>
                        </div>
                        <div class="calc_block__total--text">
                            <div class="calc_block__total--l-side">
                                <ol class="calc_block__total--list">
                                    <li data-number="1.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="2.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="3.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                </ol>
                            </div>
                            <div class="calc_block__total--r-side">
                                <div class="calc_block__total--price">
                                    Цена комплекта:
                                    <span>5 060 ₽</span>
                                </div>
                                <div class="calc_block__total--price">
                                    Масса комплекта:
                                    <span>8.1 кг.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc_block__total--block">
                        <div class="calc_block__total--top">
                            <div class="calc_block__total--tit">Внутрь дверей, 4 двери</div>
                            <div class="calc_block__total--prc">6 260 ₽</div>
                        </div>
                        <div class="calc_block__total--text">
                            <div class="calc_block__total--l-side">
                                <ol class="calc_block__total--list">
                                    <li data-number="1.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="2.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="3.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                </ol>
                            </div>
                            <div class="calc_block__total--r-side">
                                <div class="calc_block__total--price">
                                    Цена комплекта:
                                    <span>5 060 ₽</span>
                                </div>
                                <div class="calc_block__total--price">
                                    Масса комплекта:
                                    <span>8.1 кг.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc_block__total--block">
                        <div class="calc_block__total--top">
                            <div class="calc_block__total--tit">Внутрь дверей, 4 двери</div>
                            <div class="calc_block__total--prc">6 260 ₽</div>
                        </div>
                        <div class="calc_block__total--text">
                            <div class="calc_block__total--l-side">
                                <ol class="calc_block__total--list">
                                    <li data-number="1.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="2.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                    <li data-number="3.">
                                        <div class="calc_block__total--name">Шумоff Black Jack (Блэк Джек)</div>
                                        <div class="calc_block__total--size">16 листов 370 х 270 мм</div>
                                        <div class="calc_block__total--summ">2 160 ₽</div>
                                    </li>
                                </ol>
                            </div>
                            <div class="calc_block__total--r-side">
                                <div class="calc_block__total--price">
                                    Цена комплекта:
                                    <span>5 060 ₽</span>
                                </div>
                                <div class="calc_block__total--price">
                                    Масса комплекта:
                                    <span>8.1 кг.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="calc_block__r-side">
            <div class="calc_block__status">
                <div class="calc_block__status--tit">Общая стоимость:</div>
                <div class="calc_block__list">
                    <div class="calc_block__list--item">
                        <div class="calc_block__list--left">Стоимость материалов:</div>
                        <div class="calc_block__list--right">69 695 ₽</div>
                    </div>
                    <div class="calc_block__list--item">
                        <div class="calc_block__list--left">Масса набора:</div>
                        <div class="calc_block__list--right">117.37 кг.</div>
                    </div>
                </div>
                <a href="#" class="button button__all-link calc_block__btn">
                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.4996 22.9999C17.8311 22.9999 18.1491 22.8682 18.3835 22.6338C18.6179 22.3994 18.7496 22.0815 18.7496 21.7499V19.2499C18.7496 18.9184 18.6179 18.6005 18.3835 18.3661C18.1491 18.1316 17.8311 17.9999 17.4996 17.9999C17.1681 17.9999 16.8502 18.1316 16.6157 18.3661C16.3813 18.6005 16.2496 18.9184 16.2496 19.2499V21.7499C16.2496 22.0815 16.3813 22.3994 16.6157 22.6338C16.8502 22.8682 17.1681 22.9999 17.4996 22.9999ZM12.4996 22.9999C12.8311 22.9999 13.1491 22.8682 13.3835 22.6338C13.6179 22.3994 13.7496 22.0815 13.7496 21.7499V19.2499C13.7496 18.9184 13.6179 18.6005 13.3835 18.3661C13.1491 18.1316 12.8311 17.9999 12.4996 17.9999C12.1681 17.9999 11.8502 18.1316 11.6157 18.3661C11.3813 18.6005 11.2496 18.9184 11.2496 19.2499V21.7499C11.2496 22.0815 11.3813 22.3994 11.6157 22.6338C11.8502 22.8682 12.1681 22.9999 12.4996 22.9999ZM23.7496 7.99994H22.0246L19.8621 3.68744C19.796 3.52876 19.6979 3.38541 19.574 3.26635C19.45 3.14729 19.3028 3.05509 19.1415 2.99549C18.9803 2.9359 18.8085 2.9102 18.6369 2.92C18.4653 2.9298 18.2975 2.97489 18.1441 3.05245C17.9907 3.13001 17.855 3.23838 17.7454 3.37078C17.6357 3.50318 17.5546 3.65676 17.507 3.82193C17.4594 3.98711 17.4464 4.16032 17.4688 4.33075C17.4912 4.50118 17.5485 4.66516 17.6371 4.81244L19.2246 7.99994H10.7746L12.3621 4.81244C12.4834 4.52108 12.4901 4.1946 12.3806 3.89855C12.2712 3.60251 12.0539 3.35881 11.7722 3.2164C11.4905 3.07399 11.1654 3.04339 10.8621 3.13077C10.5589 3.21814 10.2998 3.41701 10.1371 3.68744L7.97462 7.99994H6.24962C5.36611 8.01338 4.51571 8.33838 3.84843 8.91761C3.18115 9.49684 2.73984 10.2931 2.60233 11.166C2.46483 12.0388 2.63996 12.9322 3.09685 13.6885C3.55374 14.4448 4.26303 15.0155 5.09962 15.2999L6.02462 24.6249C6.1179 25.5532 6.5538 26.4133 7.24721 27.0373C7.94062 27.6614 8.84174 28.0046 9.77462 27.9999H20.2496C21.1825 28.0046 22.0836 27.6614 22.777 27.0373C23.4704 26.4133 23.9063 25.5532 23.9996 24.6249L24.9246 15.2999C25.763 15.0147 26.4734 14.4419 26.93 13.683C27.3866 12.9242 27.5598 12.0282 27.4191 11.1539C27.2783 10.2795 26.8327 9.48318 26.1611 8.90591C25.4895 8.32865 24.6352 8.00771 23.7496 7.99994ZM21.4871 24.3749C21.456 24.6843 21.3107 24.9711 21.0796 25.1791C20.8485 25.3871 20.5481 25.5015 20.2371 25.4999H9.76212C9.45116 25.5015 9.15079 25.3871 8.91965 25.1791C8.68851 24.9711 8.54321 24.6843 8.51212 24.3749L7.62462 15.4999H22.3746L21.4871 24.3749ZM23.7496 12.9999H6.24962C5.9181 12.9999 5.60016 12.8682 5.36574 12.6338C5.13132 12.3994 4.99962 12.0815 4.99962 11.7499C4.99962 11.4184 5.13132 11.1005 5.36574 10.8661C5.60016 10.6316 5.9181 10.4999 6.24962 10.4999H23.7496C24.0811 10.4999 24.3991 10.6316 24.6335 10.8661C24.8679 11.1005 24.9996 11.4184 24.9996 11.7499C24.9996 12.0815 24.8679 12.3994 24.6335 12.6338C24.3991 12.8682 24.0811 12.9999 23.7496 12.9999Z" fill="#F1752A"/>
                    </svg>
                    <span>Купить набор</span>
                </a>
                <a href="#" class="button button__all-line calc_block__button">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                    <span>Скачать расчёт в пдф</span>
                </a>
                <a href="#" class="button button__all-line calc_block__button">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                    <span>Отправить расчёт на e-mail</span>
                </a>
            </div>
        </div>
    </div>
</div>
        </main>


<?php
get_footer();
?>