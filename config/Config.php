<?php

define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/LIVIAN/');             #raiz del proyecto
define('DEFAULT_APP_FOLDER', 'app');                                            #carpeta donde se alojan los modulos de la aplicacion
define('DEFAULT_MODULE', 'system');                                             #modulo por defecto, actua como NAMESPACE
define('DEFAULT_CONTROLLER', 'init');                                           #controlador por defecto
define('DEFAULT_METHOD', 'index');                                              #metodo por defecto

define('APP_KEY', 'cnxtpFXNKHrdxCClokAZEW');                                       #llave para AES
define('APP_PASS_KEY', 'x#$$%%RDCNZbnbXOkojf&dzvxd5q#arrDbPK1spU75Jm|N79Ii12||}'); #llave para concatenar al md5 pass: renewerp
define('APP_COPY', '© Todos los derechos reservados Perú - 2017');


/*==================BASE DE DATOS==============================*/
define('DB_ENTORNO', 'D');                                                   #D=DESARROLLO, P=PRODUCCION
define('DB_MOTOR', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PASS', '');

define('DB_USER', 'root');
define('DB_NAME', 'erp_base');

define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8');
define('DB_COLLATION', 'utf8_unicode_ci');

