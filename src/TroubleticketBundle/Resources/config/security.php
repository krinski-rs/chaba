<?php

$container->loadFromExtension('security',array(
    'firewalls' => array(
        'secured_area' => array(
            'form_login' => array(
                'csrf_provider' => 'security.csrf.token_manager',
            ),
        ),
    ),
));