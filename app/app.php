<?php
require_once __DIR__.'/bootstrap.php';

if (ENV == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$app = new Silex\Application();
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => LOG_DIR.'sample.log'
));

try {
    $app['config'] = Symfony\Component\Yaml\Yaml::parse(file_get_contents(CONFIG_DIR.ENV.'.yml'));
} catch (Symfony\Component\Yaml\Exception\ParseException $exception) {
    $app['monolog']->addError($exception->getMessage());
}

$app->register(new Saxulum\DoctrineMongoDb\Provider\DoctrineMongoDbProvider(), array(
    'mongodb.options' => array(
        'server' => $app['config']['mongodb']['dsn'],
        'options' => array(
            'username' => $app['config']['mongodb']['username'],
            'password' => $app['config']['mongodb']['password'],
            'db' => $app['config']['mongodb']['db']
        )
    )
));

require_once CONFIG_DIR.'routes/all.php';

return $app;