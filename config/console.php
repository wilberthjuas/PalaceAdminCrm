<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        //agregado reciente
        'ad' => [
            'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
    
            /*
             * Set the default provider to one of the providers defined in the
             * providers array.
             *
             * If this is commented out, the entry 'default' in the providers array is
             * used.
             *
             * See https://github.com/Adldap2/Adldap2/blob/master/docs/connecting.md
             * Setting a default connection
             *
             */
             // 'defaultProvider' => 'another_provider',
    
            /*
             * Adlapd2 can handle multiple providers to different Active Directory sources.
             * Each provider has it's own config.
             *
             * In the providers section it's possible to define multiple providers as listed as example below.
             * But it's enough to only define the "default" provider!
             */
            'providers' => [
                /*
                 * Always add a default provider!
                 *
                 * You can get the provider with:
                 * $provider = \Yii::$app->ad->getDefaultProvider();
                 * or with $provider = \Yii::$app->ad->getProvider('default');
                 */
                'default' => [ //Providername default
                    // Connect this provider on initialisation of the LdapWrapper Class automatically
                    'autoconnect' => false,
    
                    // The provider's schema. Default is \Adldap\Schemas\ActiveDirectory set in https://github.com/Adldap2/Adldap2/blob/master/src/Connections/Provider.php#L112
                    // You can make your own https://github.com/Adldap2/Adldap2/blob/master/docs/schema.md or use one from https://github.com/Adldap2/Adldap2/tree/master/src/Schemas
                    // Example to set it to OpenLDAP:
                    // 'schema' => new \Adldap\Schemas\OpenLDAP(),
    
                    // The config has to be defined as described in the Adldap2 documentation.
                    // https://github.com/Adldap2/Adldap2/blob/master/docs/configuration.md
                    'config' => [
                        // Your account suffix, for example: matthias.maderer@example.lan
                        'account_suffix'        => '.palace-resorts.local',
        
                        // You can use the host name or the IP address of your controllers.
                        'domain_controllers'    => ['prestamocds23.palace-resorts.local'],
        
                        // Your base DN. This is usually your account suffix.
                        'base_dn'               => 'dc=palace-resorts,dc=local',
        
                        // The account to use for querying / modifying users. This
                        // does not need to be an actual admin account.
                        'admin_username'        => 'username_ldap_access',
                        'admin_password'        => 'password_ldap_access!',
        
                                        // To enable SSL/TLS read the docs/SSL_TLS_AD.md and uncomment
                                        // the variables below
                                        'port' => 389,
                                        'use_ssl' => true,
                                        'use_tls' => true,                                
                        ]
                ],
    
                /*
                 * Another Provider
                 * You don't have to define another provider if you don't need it. It's just an example.
                 *
                 * You can get the provider with:
                 * or with $provider = \Yii::$app->ad->getProvider('another_provider');
                 */
                'another_provider' => [ //Providername another_provider
                    // Connect this provider on initialisation of the LdapWrapper Class automatically
                    'autoconnect' => false,
    
                    // The provider's schema. Default is \Adldap\Schemas\ActiveDirectory set in https://github.com/Adldap2/Adldap2/blob/master/src/Connections/Provider.php#L112
                    // You can make your own https://github.com/Adldap2/Adldap2/blob/master/docs/schema.md or use one from https://github.com/Adldap2/Adldap2/tree/master/src/Schemas
                    // Example to set it to OpenLDAP:
                    // 'schema' => new \Adldap\Schemas\OpenLDAP(),
    
                    // The config has to be defined as described in the Adldap2 documentation.
                    // https://github.com/Adldap2/Adldap2/blob/master/docs/configuration.md               
                    'config' => [
                    // Your account suffix, for example: matthias.maderer@test.lan
                    'account_suffix'        => '@test.lan',
    
                    // You can use the host name or the IP address of your controllers.
                    'domain_controllers'    => ['server1.test.lan', 'server2'],
    
                    // Your base DN. This is usually your account suffix.
                    'base_dn'               => 'dc=test,dc=lan',
    
                    // The account to use for querying / modifying users. This
                    // does not need to be an actual admin account.
                    'admin_username'        => 'username_ldap_access',
                    'admin_password'        => 'password_ldap_access',
    
                                    // To enable SSL/TLS read the docs/SSL_TLS_AD.md and uncomment
                                    // the variables below
                                    //'port' => 636,
                                    //'use_ssl' => true,
                                    //'use_tls' => true, 
                    ] // close config
                ], // close provider
            ], // close providers array
        ], //close ad
    ],
    'params' => $params,
    'controllerMap' => [
        //...
        'ldapcmd' => [
            'class' => 'Edvlerblog\Adldap2\commands\LdapController',
        ],
        //...
    ],
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
