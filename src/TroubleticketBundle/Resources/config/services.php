<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;

$container->register('troubleticket.locale_listener', 'TroubleticketBundle\EventListener\LocaleListener')
    ->addTag('kernel.event_listener', array('event' => 'kernel.request'));

$env = $container->getParameter('kernel.environment');
if ($env == 'dev') {
    $container->register('troubleticket.fake_user_listener', 'TroubleticketBundle\EventListener\FakeUserListener')
        ->addTag('kernel.event_listener', array('event' => 'kernel.request'));
}


$container->register('troubleticket.time_extension', 'TroubleticketBundle\Twig\TimeExtension')
    ->setPublic(true)
    ->addTag('twig.extension');

$container->register('troubleticket.breadcrumb_extension', 'TroubleticketBundle\Twig\BreadcrumbExtension')
    ->setPublic(true)
    ->addTag('twig.extension');

$container->setDefinition(
    'permissions',
    new Definition(
        'TroubleticketBundle\Service\Permissions',
        array(new Reference('session'),new Reference('service_container'))
    )
);

$container->setDefinition(
    'troubleticket.permissions_extension',
    new Definition(
        'TroubleticketBundle\Twig\PermissionsExtension',
        array(new Reference('permissions'))
    )
)->addTag('twig.extension');

$container->setDefinition(
    'troubleticket.error_listener',
    new Definition(
        'TroubleticketBundle\EventListener\ErrorHandlerListener',
        array(new Reference('templating'), new Parameter('kernel.environment'))
    )
)->addTag('kernel.event_listener', array('event' => 'kernel.exception'));

$colaboradorApi = $container->setDefinition(
    'troubleticket.colaborador_api',
    new Definition(
        'TroubleticketBundle\Api\ColaboradorApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);

$circuitApi = $container->setDefinition(
    'troubleticket.circuit_api',
    new Definition(
        'TroubleticketBundle\Api\TroubleticketCircuitApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);

$clientApi = $container->setDefinition(
    'troubleticket.client_api',
    new Definition(
        'TroubleticketBundle\Api\TroubleticketClientApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);

$providerApi = $container->setDefinition(
    'troubleticket.provider_api',
    new Definition(
        'TroubleticketBundle\Api\TroubleticketProviderApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);

$integracaoToaApi = $container->setDefinition(
		'troubleticket.integracaotoa_api',
		new Definition(
				'TroubleticketBundle\Api\IntegracaoToaApi',
				array(new Parameter('troubleticket_toa'))
				)
		);

$popApi = $container->setDefinition(
    'troubleticket.pop_api',
    new Definition(
        'TroubleticketBundle\Api\TroubleticketPopApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);

$circuitInfoApi = $container->setDefinition(
    'troubleticket.circuit_info_api',
    new Definition(
        'TroubleticketBundle\Api\TroubleticketCircuitInfoApi',
        array(new Parameter('troubleticket_sistech_api'))
    )
);


if ($env == 'dev') {
    $popApi->addMethodCall('setLogger', array(new Reference('logger')));
    $providerApi->addMethodCall('setLogger', array(new Reference('logger')));
    $clientApi->addMethodCall('setLogger', array(new Reference('logger')));
    $circuitApi->addMethodCall('setLogger', array(new Reference('logger')));
    $colaboradorApi->addMethodCall('setLogger', array(new Reference('logger')));
    $circuitInfoApi->addMethodCall('setLogger', array(new Reference('logger')));
}
