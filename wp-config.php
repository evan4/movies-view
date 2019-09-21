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
define( 'DB_NAME', 'wpmovie' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mycms' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'mycms' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'OthODnbfh/- CLx?cldOz9w!!Bapc)3YDOL9Xzo Zkal&{;nTJ[sT88,?rcWC_}o' );
define( 'SECURE_AUTH_KEY',  'e6(ok6Ef3`O: %*g:O_+~1Alo>5;yDwz=8~Kg?)z?<H&]DvzqJ]bs/}>bsW2;Dp#' );
define( 'LOGGED_IN_KEY',    '>>0ni~<^97^<{,EVV{%-Mi$zL6pmJW7Opi^Z#nbnvyYK~7_oTRnxdpmmP![|4/m&' );
define( 'NONCE_KEY',        'S4b3e8Gq.9u%/@NK9Q4#2<eC*f{)5XJ1w]`uQ96<({/X.SyP~!`|7AC/e4`6iAXB' );
define( 'AUTH_SALT',        's!Szt/ D9mT}hd#hxD}_0#],9%g;Pzt[2&R u6Zx-6(VL{)oSefF`T$8JxrTM-`x' );
define( 'SECURE_AUTH_SALT', 'oR]rHhYXjz,G?^)Zjx<GFXn>UQ*&HMc9Cy/;squL[B0xMo[H>f1jpD@xb0<urpKb' );
define( 'LOGGED_IN_SALT',   '$M3>.FP)eAajl-%?h.;`xv30uj6dKOlkqX YwES><>Xf`|*Z[^FT+tq4H:h%e2Zi' );
define( 'NONCE_SALT',       'EmMKb0YzPv^>GhWDFP:C,z&YU.8s%#JuY<.f7A2/3,jy<C1!7J[p!#O#;Ji40g&5' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
