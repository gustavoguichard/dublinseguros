<?php
/** 
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro é usado para criar o script  wp-config.php, durante
 * a instalação, mas não tem que usar essa funcionalidade se não quiser. 
 * Salve este ficheiro como "wp-config.php" e preencha os valores.
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'dublin');

/** O nome do utilizador de MySQL */
define('DB_USER', 'root');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'root');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost:8889');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves Únicas de Autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NXnHDzMLH|A+%V<jWi`kD5KzBDyTJ^vOj@pvX!7j_=0_B(xzzNASw<JvpNeRFiV+');
define('SECURE_AUTH_KEY',  '3?ueZ&n[<C^Ja=!*m!}Ls_<Ngu73YIRF(5In+#  i=}h$sW#~u;-cKfdO,V]d8og');
define('LOGGED_IN_KEY',    'AonrcC>x+ pO;`$.u_h0aVmwO$P[qhP UaoU?i.Ln;[gUhZoe Ru_,(ma3/g_PD=');
define('NONCE_KEY',        'l:cq_&LAJRlrc 7Y1(.g)venl;<!{?@yeX57D[FG-6tKPPjZl%N@Ab</GC*/YD#u');
define('AUTH_SALT',        '5bJQ17ehxbdOxMlZ,!$MF&ABPX<IjfR`Sr.k~Iqb:fuDW?a+O6 ALHu?9h,zM8NB');
define('SECURE_AUTH_SALT', 'gr4Wc+2LTF--*(*j6}#XFQ8PJ9c$!w5IXHTxU;._Zr5vm%r:~`+E1=Hd*kn(/TT!');
define('LOGGED_IN_SALT',   '@X:LJ5|7R7<?0l!Ezd;CBGAIP]y~TNld,3?6 |Pc/!C5uc^A9(P<wICj,0HCXv>L');
define('NONCE_SALT',       ')*{;L0}nJ~pL$TcJt0TI)K[*H7#XU$ ?36J-jA*G^PBGt~_d<$39i_@1c4J3Wrg{');

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_';

/**
 * Idioma de Localização do WordPress, Inglês por omissão.
 *
 * Mude isto para localizar o WordPress. Um ficheiro MO correspondendo ao idioma
 * escolhido deverá existir na directoria wp-content/languages. Instale por exemplo
 * pt_PT.mo em wp-content/languages e defina WPLANG como 'pt_PT' para activar o
 * suporte para a língua portuguesa.
 */
define ('WPLANG', 'pt_PT');

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 */
define('WP_DEBUG', false);

/* E é tudo. Pare de editar! Bom blogging!. */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Define as variáveis do WordPress e ficheiros a incluir. */
require_once(ABSPATH . 'wp-settings.php');
