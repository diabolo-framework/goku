<?php
define('X_FRAMEWORK_PATH', '*****THE PATH OF DIABOLO FRAMEWORK******');
return array(
  'document_root' => '*****THE PATH OF GOKU*****',
  'module_path' => array(),
  'service_path' => array(),
  'library_path' => array(),
  'modules' => require dirname(__FILE__).'/modules.php',
  'services' => require dirname(__FILE__).'/services.php',
  'params' => require dirname(__FILE__).'/params.php',
);