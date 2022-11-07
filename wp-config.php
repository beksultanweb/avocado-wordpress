<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'avocado' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'avocado_admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'avocadobauyr' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'iKZYS5^SVQx`Sg),.f.h.i9kR&f`~|6S3H{Ju!kD 50JCr!+L-l]z=De{f=i<bii' );
define( 'SECURE_AUTH_KEY',  'ryS12F(gJ:xH!@W2-D8HH&L&MdW!nvi-d&%p:_Z)Bt~$6!:Z?4awUx0TSI4P!wnc' );
define( 'LOGGED_IN_KEY',    'yJfp;{S#,}keDqK@5TI,j1 &UGuHC(vBj]<rW/1e^qOnKX>sn*+C9&=NZ#_Dez,q' );
define( 'NONCE_KEY',        '#oA_+g#?4;lsU30~?Hg2? #xFP.3~;&Uu;S^%4@;4$p_Xbr~1_9{#eHB5HHH!3];' );
define( 'AUTH_SALT',        'V.[pu)2LA5Eb^PX&cUqG.GI}ih~6=$IdzwB*I<hE735xrbLI<4,]O8Fu2[x/Iwk}' );
define( 'SECURE_AUTH_SALT', 's 3_iX;gsG n&/#<w{#X`xY0n1sV(t_XB.^%h9uY< Tk!h,-<BnjYdNg}kd=^d7O' );
define( 'LOGGED_IN_SALT',   ';DEz^Ovu7[!u)YSpm$|tv2a pay.4ZM?f2ONfXF+%L1Khks>1RVO(w18j5-s/)kL' );
define( 'NONCE_SALT',       '#Ma=UmmwGal_qCA=wVu$9>`;U>J^assH0}X/:[3_OqE{jPb[~YY0.t=8:j3uwa]_' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
