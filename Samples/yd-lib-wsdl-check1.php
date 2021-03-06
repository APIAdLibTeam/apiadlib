<?php

/**
  *
  * APIAdLib samples
  *  
  *   
  * PHP Version 5.2    
  *   
  * NOTE: 
  *  - Sample doesn't perform any changes with Ad system's data
  *  - Sample tested in Yandex.Direct, in sandbox and real account too. 
  *    - then just convert it:
  *          
  *
  * @package    APIAdLib
  * @subpackage Samples 
  * @category   WebServices
  * @copyright  2012, Vadim Pshentsov. All Rights Reserved.
  * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
  * @author     V.Pshentsov <pshentsoff@gmail.com>
  */  

error_reporting(E_ALL & ~E_STRICT);

define('_APIADLIB_PATHTO', '/..'); // path to apiadlib dir
define('_APIADLIB_AUTHINI_PATHTO', '../../../ini/'); // path to ini files

require_once dirname(__FILE__) . _APIADLIB_PATHTO . '/apiadlib.autoload.php';

echo __FILE__."<br />";

$wsdlurl = NULL;
$soap_params = array(
        'trace'=> 1,
    );

/**
 * Create Yandex.Direct user instance
 *  
 */  
$auth_file = _APIADLIB_AUTHINI_PATHTO.'auth_ydirect.ini';
echo $auth_file."<br />";
$user = new YDirectUser($auth_file);


/**
 * Initializing SOAP client object
 *  
 */ 
$client = new YDirectSoapClient($wsdlurl, $soap_params, $user, 'APIAdLib', 'API');
