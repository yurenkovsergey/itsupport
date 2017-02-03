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
define('DB_NAME', 'kfdhr_193557');

/** Имя пользователя MySQL */
define('DB_USER', 'azdshsn_193557');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'B53k684019drF56');

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
define('AUTH_KEY',         'K1THVPB8MX&G*4<A!..%6!!!ST>JK5U@<MH5ASN>A3RG?V,951I@95<:JA9P@2*7I');
define('SECURE_AUTH_KEY',  '3R%VO0TXPQ&:..2%A1I@P53BK:FW0A0R..F%_LVS0PIM.._YFZ,/:VWCVTPN//%MO');
define('LOGGED_IN_KEY',    '.BCGFL>DWE,KVZ7W,N*PFG0T0/C/AM.WX2LJQINDHYR9.A_:F82PXPZPT0@>SZT,<');
define('NONCE_KEY',        '0KGX9CIB,,HW3JFMB_23C5&ZE..LZWWJ??JUY2G838FZJQQ:.N,GGXF:L70T8U*0V');
define('AUTH_SALT',        'N..V*.1ID4NOND%F4HI,/PYR7..3HTX5<2,,//6!TO*C4VPHCPPRL/BQV7X.&35?2');
define('SECURE_AUTH_SALT', '&BZKM:H5>P:<<_MG9_%<BB_.ZVF@CCAL5QH9&WTN>3<<T@..M1Z9@T*%99P.?Q>:2');
define('LOGGED_IN_SALT',   '4EFL..126J!HX:JB3R994%99PDT<8REUA<%NWOJWM7U&0A,H,,%>D>_YC&4PZON4Q');
define('NONCE_SALT',       'J!.//<TE0_X1:OXQ@94/BU%<F??&R534/O%S:.0OH?Q3?Y5_X>O8X5P.2WU:6*TRH');

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
