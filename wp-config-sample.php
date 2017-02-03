<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'database_name_here');

/** Имя пользователя MySQL */
define('DB_USER', 'username_here');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'password_here');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'впишите сюда уникальную фразу');
define('SECURE_AUTH_KEY',  'впишите сюда уникальную фразу');
define('LOGGED_IN_KEY',    'впишите сюда уникальную фразу');
define('NONCE_KEY',        'впишите сюда уникальную фразу');
define('AUTH_SALT',        'впишите сюда уникальную фразу');
define('SECURE_AUTH_SALT', 'впишите сюда уникальную фразу');
define('LOGGED_IN_SALT',   'впишите сюда уникальную фразу');
define('NONCE_SALT',       'впишите сюда уникальную фразу');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');


/** Hostenko menu
*/
add_action("admin_bar_menu", "customize_menu");
function customize_menu(){
global $wp_admin_bar;
  $wp_admin_bar->add_menu(array(
   "id" => "hostenko_menu",
   "title" => "Hostenko",
   "href" => "https://hostenko.com",
   "meta" => array("target" => "blank")
));
$wp_admin_bar->add_menu(array(
   "id" => "hostenko_menu_child",
    "title" => "Личный кабинет",
    "parent" => "hostenko_menu",
    "href" => "https://hostenko.com/cabinet",
	"meta" => array("target" => "blank")
));
$wp_admin_bar->add_menu(array(
   "id" => "hostenko_menu_child2",
    "title" => "WordPress темы",
    "parent" => "hostenko_menu",
    "href" => "https://wpcafe.org/tags/besplatnie-temi/",
	"meta" => array("target" => "blank")
));
}
/** Hostenko widget
*/
function hostenko_widgets() {
	wp_add_dashboard_widget(
                 'Hostenko',
                 'Бесплатные темы WordPress',
                 'hostenko_widget_function'
        );	
}
add_action( 'wp_dashboard_setup', 'hostenko_widgets' );

function hostenko_widget_function() {
echo '<a href="https://wpcafe.org/tags/besplatnie-temi/">Бесплатные темы</a> WordPress на нашем обучающем сайте WPcafe.org<br>
<center><a href="https://wpcafe.org/tags/besplatnie-temi/"><img src="https://hostenko.com/pics/wordpresso.png"></a></center>';
}
