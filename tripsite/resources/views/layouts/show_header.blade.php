<div class="main">
    <div class="container">
        <header class="header">
            <div class="header-top">
                <div class="header-adress">
                    <button class="hamburger hamburger--collapse" type="button" style="display:none;">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                    <div class="select-city" style="display:none;">
                        <i class="icon-city"></i>
                        <p>Выберите город</p>
                        <ul class="dropdown-city">
                            <li>Алматы</li>
                            <li>Астана</li>
                            <li>Павлодар</li>
                            <li>Шымкент</li>
                        </ul>
                    </div>
                </div>
                <div class="header-buttons">
                    <button class="btn btn-feedback" id="gotofeedback">Обратная связь</button>
                    <!-- <button class="btn btn-help">Помощь</button>-->
                    <a class="header-email" href="mailto:info@cent.kz">info@cent.kz</a>
                </div>
            </div>
            <div class="header-bottom">
                <a class="logo" href="/index"><img src={{asset("/img/logo8.png")}}></a>
                <ul class="menu" style="display:none;">
                    <li class="menu-item"><a href="#"><i class="icon-basket"></i>
                            <p>Корзина</p>
                        </a></li>
                    <li class="menu-item"><a href="#"><i class="icon-hearth"></i>
                            <p>Избранное</p>
                        </a></li>
                    <li class="menu-item"><a href="#"><i class="icon-user"></i>
                            <p>Личный кабинет</p>
                        </a></li>
                    <li class="menu-item"><a href="#"><i class="icon-settings"></i>
                            <p>Настройки</p>
                        </a></li>
                </ul>
            </div>
            <div class="menu-bottom">

                <ul class="bottom-menu">
                </ul>
                <div class="header-search" style="display:none;">
                    <input required="" min="1" type="text" class="search-input" id="search" name="search">
                    <label><i class="icon-search"></i>Поиск...</label>
                    <button type="submit" class="search-btn">Найти</button>
                </div>
            </div>
            <div class="burger-content" style="display:none;">
                <div class="close-burger">×</div>
                <ul>
                    <li><a href="#">Меню 1</a></li>
                    <li><a href="#">Меню 2</a></li>
                    <li><a href="#">Меню 3</a></li>
                    <li><a href="#">Меню 4</a></li>
                    <li><a href="#">Меню 5</a></li>
                    <li><a href="#">Помощь</a></li>
                    <li><a href="#">Обратная связь</a></li>
                </ul>
            </div>
        </header>
    </div>
</div>
