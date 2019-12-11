<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsens installationsrutin, utan kan kopiera
 * denna fil direkt till "wp-config.php" och fylla i alla värden.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define( 'DB_NAME', 'simplehack' );

/** MySQL-databasens användarnamn */
define( 'DB_USER', 'root' );

/** MySQL-databasens lösenord */
define( 'DB_PASSWORD', '' );

/** MySQL-server */
define( 'DB_HOST', 'localhost' );

/** Teckenkodning för tabellerna i databasen. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'm:g0i-J-0+kX4x1<qO|d))4Gs251/occdi+>qyOf+7Q7`G_1&_KthP^0QZfP]|$W' );
define( 'SECURE_AUTH_KEY',  't14})s:3:gx s5%IgCH|vw`7HZ0mXG&S{wOgoG3B`!B;]W}Q=e%WZQXu^0mmC8]4' );
define( 'LOGGED_IN_KEY',    '%:n}po@F(_ f39=ZZyXn4M4UxlsK}yFY5/Bocf4d#:7JSXGI,{{vkvx@N;WD$$Nw' );
define( 'NONCE_KEY',        'Fu?2ia32jDtA<u-je/%VjQPxP >IE+k$@.oNP];E=-rH%FNWa!h+4O48XW[NsfI/' );
define( 'AUTH_SALT',        '1E,:&EB:g%C:nt+1Sr%3(UPcXSBKb3+ZDX!ucCTmIu4*cRu6`[Zc1D|<Uf>@o:uv' );
define( 'SECURE_AUTH_SALT', 'F$4]hd <FYU7Uff+@Fiz}xrdS1FI$bo&z0|~&Jfa[ro  O*71jCP3ZvLIz#Qs5hQ' );
define( 'LOGGED_IN_SALT',   'FxcrH`trH]D.U[YY4uPH@ySxK :_(XH{X,{{-:X6z1f^9|.l3.DsP`#%q.Me12qE' );
define( 'NONCE_SALT',       'u|VxW/GzE<$T^U.$W]TzGbh}`w6oD3m*<>/JU<Z4PWi1O&N@%1}+g<gxY0sn_=P~' );

/**#@-*/

/**
 * Tabellprefix för WordPress-databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Använd endast siffror, bokstäver och understreck!
 */
$table_prefix = 'wp_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det rekommenderas att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här och börja publicera! */

/** Absolut sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');