<?php

/**
  * APIAdLib Autoload
  * Class for register and autoload library classes with spl_autoload...
  * 
  * PHP Version 5.2    
  *     
  * @package    APIAdLib
  * @category   WebServices
  * @copyright  2012, Vadim Pshentsov. All Rights Reserved.
  * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
  * @author     V.Pshentsov <pshentsoff@gmail.com>
  *    
  */
  
/**
 * Class APIAdLibAutoload
 * Class for register and autoload library classes with spl_autoload... 
 */ 
class APIAdLibAutoload {
  /**
   *
   * Global Array with descriptions array for every supported library
   * Descriptions array format:
   *  'path' - path to library folder
   *     
   */ 
   
  private static $APIADLIB_PATHS = array(

    // Common classes paths
    'Common/Lib/',
    'Common/Util/',
    
    // Google AdWords paths
    'AdWords/Lib/',
    'AdWords/Util/',
    'AdWords/v200909/',
    'AdWords/v201003/',
    'AdWords/v201008/',
    'AdWords/v201101/',
    'AdWords/v201109/',
    
    // Yandex.Direct paths
    'YDirect/Lib/',
    'YDirect/Util/',
    );
  
  // Saves last loaded filename for future logging purposes  
  private static $_lastLoadedFilename;
    
  /**
   * Library classes autoload function for SPL autoload functions stack
   */  
  public static function LoadClass($class_name) {
  

    foreach(self::$APIADLIB_PATHS as $key => $class_path) {
      $class_filepath = dirname(__FILE__).'/'.$class_path.$class_name.'.php';
      if(!file_exists($class_filepath)) continue;
      
      self::$_lastLoadedFilename = $class_filepath;
       
      require_once(self::$_lastLoadedFilename);
      break;
      
      }
      
  }

}

/**
 * Register library autoload class method in spl_autoload stack
 */     
spl_autoload_register(array('APIADLibAutoload','LoadClass'));