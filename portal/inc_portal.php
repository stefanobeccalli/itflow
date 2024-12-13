<?php
/*
 * Client Portal
 * Includes for all pages (except login)
 */

require_once '../config.php';

require_once '../get_settings.php';

require_once '../functions.php';

require_once 'check_login.php';

require_once 'portal_functions.php';

/* Set Language */
if(isset($default_language) && !empty($default_language) && file_exists($_SERVER['DOCUMENT_ROOT'].'/config/language/'.$default_language.'/portal.php'))
{   
    require_once '../config/language/'.$default_language.'/portal.php';
}

require_once "portal_header.php";


