<?php

require_once __DIR__.'/../../../../app/bootstrap.php.cache';

$parser = new Symfony\Component\Yaml\Parser;
$data = $parser->parse(file_get_contents(__DIR__.'/../../../../app/config/parameters.yml'));
$params = $data['parameters'];

return array(
    'paths' => array(
        'migrations' => __DIR__ . '/data/migrations',
    ),
    'environments' => array(
        'default_environment' => 'dev',
        'dev' => array(
            'adapter' => str_replace('pdo_', '', $params['troub.driver']),
            'host' => $params['troub.host'],
            'port' => $params['troub.port'],
            'name' => $params['troub.name'],
            'user' => $params['troub.user'],
            'pass' => $params['troub.password'],
            'schema' => 'troubleticket',
        )
    )
);
