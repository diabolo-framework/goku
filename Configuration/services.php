<?php
return array(
'XSession' => array(
    'class' => '\\X\\Service\\XSession\\Service',
    'enable' => true,
    'delay' => false,
    'params' => array(
        'autoStart' => true,
        'holders' => array('cookie', 'get', 'post', 'request'),
        'cookie' => array(
            'lifetime'=>3600,
            'path'=>'/',
            'domain'=>'',
            'secure'=> false,
            'httponly'=>false
        ),
        'storage' => null,
    ),
),
'XAction' => array(
    'class' => '\\X\\Service\\XAction\\Service',
    'enable' => true,
    'delay' => true,
    'params' => array(),
),
'Database' => array(
    'class' => \X\Service\Database\Service::class,
    'enable' => true,
    'delay' => true,
    'params' => array(
        'databases' => array(
            'goku' => array(
                'driver' => \X\Service\Database\Driver\Mysql::class,
                'host' => '***** DATABASE HOST*****',
                'username' => '***** DATABASE USER *****',
                'password' => '***** DATABASE PASSWORD *****',
                'charset' => 'UTF8',
                'dbname' => '***** DATABASE NAME *****',
            ),
        ),
    ),
),
'XMail'=>array (
    'enable' => true,
    'class' => 'X\\Service\\XMail\\Service',
    'delay' => true,
    'params' => array(
        'handlers' => array(
            'emailVerification' => array(
                # email handler config
                'handler' => 'smtp',
                'host' => '********smtp.server.host********',
                'port' => '**** SMTP PORT *****',
                'from' => '*****EMAILI FROM *****',
                'from_name' => '***** FROM NAME *****',
                'auth_required' => true,
                'username' => '***** SMTP USRRNAME*****',
                'password' => '***** SMTP PASSWORD*****',
            ),
        ),
    ),
),
);