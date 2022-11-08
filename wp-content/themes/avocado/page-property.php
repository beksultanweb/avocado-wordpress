<?php
/*
Template Name: Недвижимость
*/
?>

<?php
    get_header();
?>
<section class="property-photos">
    <div class="container">
        <div class="property-photos__info">
            <h1 class="property-photos__title">Новый комплекс в районе Кестель</h1>
            <div class="property-photos__price">от € 105,000</div>
        </div>
        <div class="property-photos__content">
            <div class="property-photos__body">
                <img class="property-photos__main-photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                <div class="property-photos__nav">
                    <div id="prev"></div>
                    <div class="property-slider">
                        <div class="property-photos-line">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                            <img class="property-photos__photo" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="property">
                        </div>
                    </div>
                    <div id="next"></div>
                </div>
            </div>
            <div class="form">
                <div class="interested">Интересует данный объект недвижимости?</div>
                <div class="call-to-action">Оставьте заявку и наш менеджер свяжется с Вами</div>
                <form action="">
                    <input type="text" name="name" placeholder="Ваше имя">
                    <input type="phone" name="phone" placeholder="Ваш телефон">
                    <input type="email" name="email" placeholder="Ваш e-mail">
                    <button class="submit">Отправить заявку</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="property-location">
    <div class="container">
        <div class="property-location__content">
            <div class="property-location__body">
                <div class="property-location__info">
                    <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-locat.png" alt=""></div>
                    <div class="property-location__text">
                        <div class="property-location__subtitle">Местоположение</div>
                        <div class="property-location__title">Alanya-Kestel</div>
                    </div>
                </div>
                <div class="property-location__info">
                    <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-resid.png" alt=""></div>
                    <div class="property-location__text">
                        <div class="property-location__subtitle">Тип недвижимости</div>
                        <div class="property-location__title">Alanya-Kestel</div>
                    </div>
                </div>
                <div class="property-location__info">
                    <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-date.png" alt=""></div>
                    <div class="property-location__text">
                        <div class="property-location__subtitle">Год постройки</div>
                        <div class="property-location__title">Alanya-Kestel</div>
                    </div>
                </div>
                <div class="property-location__info">
                    <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-house.png" alt=""></div>
                    <div class="property-location__text">
                        <div class="property-location__subtitle">Этажность</div>
                        <div class="property-location__title">Alanya-Kestel</div>
                    </div>
                </div>
            </div>
            <div class="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aefc890128f42428aa1fde3cf28f7af6e95ed778ae058c9df15d3a04e02326320&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>
<section class="property-info">
    <div class="container">
        <h2 class="property-info__title">Информация о недвижимости</h2>
        <div class="property-info__content">
            <div class="grey">
                Джакузи<br>
                Стальная дверь<br>
                Открытая парковка<br>
                Спорт-зал<br>
                Лифт<br>
                Охранник<br>
                Душевая кабина<br>
                Барбекю<br>
                В комплексе<br>
                Генератор<br>
                Спутникое ТВ<br>
                Кабельное ТВ<br>
                Детская площадка<br>
                Открытый бассейн<br>
                Окна ПВХ<br>
                Двойной стеклопакет<br>
                Балкон<br>
                Точечные светильники<br>
                Кухня американского типа<br>
                Сауна<br>
                Спорт-зал<br>
                Горячая вода<br>
                Места для пешей прогулки и отдыха<br>
                Беседка<br>
                Парная<br>
                Интернет<br>
                Видеодомофон<br>
                Бильярд и настольный теннис<br>
                Кафе-Бар
            </div>
            <div>
                <div class="property-info__text">
                Новый инвестиционно-привлекательный комплекс в районе Кестель 
                находится всего в 750 метрах от Средиземного моря, на берегу горной 
                реки Димчай. Комплекс состоит из одного 3-этажного блока с 24 квартирами. 
                В непосредственной близости от дома находятся магазины, аптеки, частные 
                колледжи, русская школа "Классика М" и прочая инфраструктура района.
                <br><br>
                Комплекс будет иметь отельную инфраструктуру: открытый бассейн, детская 
                площадка, джакузи, ресепшен, тренажерный зал, сауна, бильярдный стол и 
                настольный теннис, кафетерий, открытая парковка, беседка для отдыха, сад, 
                круглосуточное видеонаблюдение и т.д.
                <br><br>
                В комплексе доступны квартиры 1+1 площадью 44 м2 и дуплексы 2+1 
                площадью 90 м2. Все квартиры будут сданы в чистовой отделке, 
                с покрашенными стенами, входными и межкомнатными дверями, 
                кухонными гарнитуром и санузлами под ключ.
                <br><br>
                Застройщик предлагает гибкие условия оплаты в виде без % рассрочки 
                с первоначальными взносом в 40% и ежемесячными взносом в 5%. Также, 
                при оплате 100% суммы, предлагается скидка в 7%. Завершение проекта 
                запланировано на апрель 2023 года.
                <br><br>
                Данный проект отлично подходит для инвестиции в турецкую недвижимость 
                с целью перепродажи или сдачи в аренду, а также для семейного отдыха 
                в солнечной Алании!
                </div>
                <button class="property-info__btn">Перезвоните мне</button>
            </div>
        </div>
    </div>
</section>
<section class="property-same">
    <div class="container">
        <h2 class="property-info__title">Похожие объекты</h2>
        <div class="property-same__content">
        <?php
            $posts = get_posts( array(
                'numberposts' => -1,
                'category_name' => 'same_deals',
                'orderBy' => 'date',
                'order' => 'ASC',
                'post_type' => 'post',
                'suppress_filters' => true,
            ));
            foreach( $posts as $post ) {
                setup_postdata($post)
                ?>
                    <div class="tabs__item">
                        <img class="tabs__img" src="<?php the_field('hot_img'); ?>" alt="property">
                        <div class="tabs__title"><?php the_title(); ?></div>
                        <div class="tabs__info">
                            <div class="tabs__graphics">
                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/building.svg" alt="building">
                                <div class="tabs__subtitle"><?php the_field('hot_rooms'); ?></div>
                            </div>
                            <div class="tabs__graphics">
                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/square.svg" alt="square">
                                <div class="tabs__subtitle"><?php the_field('hot_square'); ?> кв.м.</div>
                            </div>
                        </div>
                        <button class="tabs__btn"><?php the_field('hot_price'); ?> EUR</button>
                    </div>
                <?php
            }
            wp_reset_postdata();
        ?>
        </div>
    </div>
</section>
<?php
    get_footer();
?>