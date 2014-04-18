<div class="span3 well-g">
    <ul class="nav nav-list side-menu">

        <li class="nav-header">Статьи</li>
        <li><a href="/adm/?view=article_all"><i class="icon-list-alt"></i> Список статей</a></li>
        <li><a href="/adm/?view=article_add"><i class="icon-pencil"></i> Добавить статью</a></li>
        <li class="divider"></li>
        <li><a href="/adm/?view=category_all"><i class="icon-tasks"></i> Категории</a></li>
        <li class="divider"></li>

        <li class="nav-header">Новости</li>
        <li><a href="/adm/?view=news_all"><i class="icon-list-alt"></i> Посмотреть все</a></li>
        <li><a href="/adm/?view=news_add"><i class="icon-pencil"></i> Добавить новость</a></li>
        <li><a href="/adm/?view=news_all&sort=trash"><i class="icon-trash"></i> Корзина</a></li>
        <li class="divider"></li>

        <li class="nav-header">Статические страницы</li>
        <li><a href="/adm/?view=static_all"><i class="icon-list-alt"></i> Посмотреть все</a></li>
        <li><a href="/adm/?view=static_add"><i class="icon-pencil"></i> Добавить страницу</a></li>
        <li><a href="/adm/?view=static_all&sort=trash"><i class="icon-trash"></i> Корзина</a></li>
        <li class="divider"></li>

        <li class="nav-header">Администрирование</li>
        <li><a href="/adm/?view=users"><i class="icon-user"></i>Пользователи</a></li>
        <?php
        if ($_SESSION['role'] == 1) {
            echo '<li><a href="/adm/?view=config_edit"><i class="icon-cog"></i>Настройки сайта</a></li>';
        }
        ?>
    </ul>
</div>