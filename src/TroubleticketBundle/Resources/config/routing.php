<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

//BA
$collection->add('troubleticket_ba_home',new Route('/',array(
    '_controller' => 'TroubleticketBundle:BA:stack'),
    array(),
    array(),
    '',
    array(),
    array('GET','POST')));

$collection->add('troubleticket_ba_new',new Route('ba/novo',array(
    '_controller' => 'TroubleticketBundle:BA:new'),
    array(),
    array(),
    '',
    array(),
    array('GET','POST')));

$collection->add('troubleticket_ba_create_preview',new Route('ba/criar',array(
    '_controller' => 'TroubleticketBundle:BA:createPreview'),
    array(),
    array(),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_create',new Route('ba/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:create'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('GET', 'POST')));

$collection->add('troubleticket_ba_create_post',new Route('ba/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:createPost'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main',new Route('ba/editar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:main'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_ba_symptom_update',new Route('ba/atualizasintoma/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:symptomUpdate'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_update',new Route('ba/editar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainUpdate'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_pause',new Route('ba/pause/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainPause'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_restart',new Route('ba/reiniciar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainRestart'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_solve',new Route('ba/resolver/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainSolve'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_unsolved',new Route('ba/nao-resolvido/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainUnsolved'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_close',new Route('ba/fechar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainClose'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_main_cancel',new Route('ba/cancelar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BA:mainCancel'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_ba_stack',new Route('ba/fila',array(
    '_controller' => 'TroubleticketBundle:BA:stack'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_ba_counters',new Route('ba/contadores',array(
    '_controller' => 'TroubleticketBundle:BA:counters'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_ba_stack_request',new Route('ba/stack-request',array(
    '_controller' => 'TroubleticketBundle:BA:stackRequest'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add(
    'troubleticket_ba_send_to_sn2',
    new Route(
        'ba/enviar-para-sn2/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BA:sendToSn2',
            array(),
            array('report_id' => '\d+'),
        )
    )
);

$collection->add(
    'troubleticket_ba_send_to_sn3',
    new Route(
        'ba/enviar-para-sn3/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BA:sendToSn3',
            array(),
            array('report_id' => '\d+'),
        )
    )
);

$collection->add(
    'troubleticket_ba_change_stack',
    new Route(
        'ba/alterar-stack/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BA:changeStack',
            array(),
            array('report_id' => '\d+'),
        )
    )
);

$collection->add(
    'troubleticket_ba_send_to_user',
    new Route(
        'ba/enviar-para-usuario/{report_id}/',
        array(
            '_controller' => 'TroubleticketBundle:BA:sendToUser',
            array(),
            array('report_id' => '\d+'),
            '',
            array(),
            array('POST')
        )
    )
);

$collection->add(
    'troubleticket_ba_comment',
    new Route(
        'ba/comentar/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BA:comment',
            array(),
            array('report_id' => '\d+'),
            '',
            array(),
            array('POST')
        )
    )
);

$collection->add(
    'troubleticket_ba_chat',
    new Route(
        'ba/chat/{report_id}',
        array('_controller' => 'TroubleticketBundle:BA:chatList'),
        array(),
        array('report_id' => '\d+'),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_ba_chat_insert',
    new Route(
        'ba/chat/{report_id}',
        array('_controller' => 'TroubleticketBundle:BA:chat'),
        array(),
        array('report_id' => '\d+'),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_ba_link_to_bi',
    new Route(
        'ba/{report_id}/bis',
        array(
            '_controller' => 'TroubleticketBundle:BA:bis'
        )
    )
);

$collection->add(
    'troubleticket_ba_take_on',
    new Route(
        'ba/assumir/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BA:takeOn'
        )
    )
);

$collection->add('troubleticket_ba_report_incident',new Route('ba/relatorio/incidente',array(
    '_controller' => 'TroubleticketBundle:BA:reportIncident'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bs_report',new Route('bs/relatorio',array(
    '_controller' => 'TroubleticketBundle:BS:report'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_ba_report_performance',new Route('ba/relatorio/performance',array(
    '_controller' => 'TroubleticketBundle:BA:reportPerformance'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_circuit_ba_request',new Route('circuito-ba-request',array(
    '_controller' => 'TroubleticketBundle:BA:circuitRequest'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

//BI
$collection->add('troubleticket_bi_symptom_update',new Route('bi/atualizasintoma/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:symptomUpdate'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_bi_new',new Route('bi/novo',array(
    '_controller' => 'TroubleticketBundle:BI:new'),
    array(),
    array(),
    '',
    array(),
    array('GET','POST')));

$collection->add('troubleticket_bi_create_preview',new Route('bi/criar',array(
    '_controller' => 'TroubleticketBundle:BI:createPreview'),
    array(),
    array(),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_bi_create',new Route('bi/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:create'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('GET', 'POST')));

$collection->add('troubleticket_bi_create_post',new Route('bi/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:createPost'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_circuit_request',new Route('circuito-request',array(
    '_controller' => 'TroubleticketBundle:BI:circuitRequest'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_main',new Route('bi/editar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:main'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_main_close',new Route('bi/fechar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:mainClose'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_bi_comment',new Route('bi/comentar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:comment',
    array(),
    array('report_id' => '\d+'),
    '',
    array(),
    array('POST')))
);

$collection->add('troubleticket_bi_take_on',new Route('bi/assumir/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:takeOn'))
);

$collection->add(
    'troubleticket_bi_send_to_user',
    new Route(
        'bi/enviar-para-usuario/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BI:sendToUser',
            array(),
            array('report_id' => '\d+'),
            '',
            array(),
            array('POST')
        )
    )
);

$collection->add('troubleticket_bi_stack',new Route('bi/fila',array(
    '_controller' => 'TroubleticketBundle:BI:stack'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_stack_request',new Route('bi/stack-request',array(
    '_controller' => 'TroubleticketBundle:BI:stackRequest'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_related_ba',new Route('bi/incidentes/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:mainBaRelated'),
    array(),
    array('report_id' => '\d+'),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_related_ba_request',new Route('bi/ba-related-request/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BI:mainBaRelatedRequest'),
    array(),
    array('report_id' => '\d+'),
    '',
    array(),
    array('GET')));

$collection->add('troubleticket_bi_report_incident',new Route('bi/relatorio/incidente',array(
    '_controller' => 'TroubleticketBundle:BI:reportIncident',
    array(),
    array(),
    '',
    array(),
    array('GET'))));

$collection->add('troubleticket_bi_report_performance',new Route('bi/relatorio/performance',array(
    '_controller' => 'TroubleticketBundle:BI:reportPerformance'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

//Subcaso BI
$collection->add('troubleticket_bi_subcase_main',new Route('bi/subcaso/{subcaseId}',array(
    '_controller' => 'TroubleticketBundle:Subcases:main',
    array(),
    array('subcaseId' => '\d+'),
    '',
    array(),
    array('GET')))
);

$collection->add('troubleticket_bi_subcase_create',new Route('bi/subcaso/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:Subcases:create',
    array(),
    array('report_id' => '\d+'),
    '',
    array(),
    array('GET','POST')))
);

$collection->add('troubleticket_bi_subcase_materials',new Route('bi/subcaso/listamateriais/{subcaseId}',array(
    '_controller' => 'TroubleticketBundle:Subcases:listOfMaterialsPrint',
    array(),
    array('subcaseId' => '\d+'),
    '',
    array()))
);

//Subcaso BA
$collection->add('troubleticket_ba_subcase_materials',new Route('ba/subcaso/listamateriais/{subcaseId}',array(
    '_controller' => 'TroubleticketBundle:Subcases:listOfMaterialsPrint',
    array(),
    array('subcaseId' => '\d+'),
    '',
    array()))
);

$collection->add(
    'troubleticket_ba_subcase_pause',
    new Route(
        'ba/subcaso/pausar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:pause',
        ),
        array(),
        array(
            'id' => '\d+',
        )
    )
);

$collection->add(
    'troubleticket_ba_subcase_main',
    new Route(
        'ba/subcaso/{subcaseId}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:main',
            array(),
            array(
                'subcaseId' => '\d+'),
            '',
            array(),
            array('GET')
        )
        )
    );


$collection->add(
    'troubleticket_ba_subcase_create',
    new Route(
        'ba/subcaso/criar/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:create',
            array(),
            array('report_id' => '\d+'),
            '',
            array(),
            array('POST')
        )
        )
    );

$collection->add(
    'troubleticket_ba_subcase_restart',
    new Route(
        'ba/subcaso/reiniciar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:restart',
        ),
        array(),
        array(
            'id' => '\d+',
        )
    )
);

$collection->add(
    'troubleticket_ba_subcase_close',
    new Route(
        'ba/subcaso/fechar/{subcaseId}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:close',
            array(),
            array(
                'subcaseId' => '\d+'
            ),
            '',
            array(),
            array('POST')
        )
    )
);

$collection->add(
    'troubleticket_ba_subcase_update',
    new Route(
        'ba/subcaso/atualizar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:Subcases:update',
        ),
        array(),
        array(
            'id' => '\d+',
        )
    )
);

//BS
$collection->add('troubleticket_bs_new',new Route('bs/novo',array(
    '_controller' => 'TroubleticketBundle:BS:new'),
    array(),
    array(),
    '',
    array(),
    array('GET','POST')));

$collection->add('troubleticket_bs_create_preview',new Route('bs/criar',array(
    '_controller' => 'TroubleticketBundle:BS:createPreview'),
    array(),
    array(),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_bs_create',new Route('bs/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BS:create'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('GET', 'POST')));

$collection->add('troubleticket_bs_create_post',new Route('bs/criar/{report_id}',array(
    '_controller' => 'TroubleticketBundle:BS:createPost'),
    array(),
    array(
        'report_id' => '\d+'),
    '',
    array(),
    array('POST')));

$collection->add('troubleticket_circuit_bs_request',new Route('circuito-bs-request',array(
    '_controller' => 'TroubleticketBundle:BS:circuitRequest'),
    array(),
    array(),
    '',
    array(),
    array('GET')));

$collection->add(
    'troubleticket_bs_config',
    new Route(
        'bs/configuracao',
        array(
            '_controller' => 'TroubleticketBundle:BS:config',
            array(),
            array('id' => '\d+'),
            '',
            array(),
            array('GET')
        )
    )
);

$collection->add(
    'troubleticket_bs_stack',
    new Route(
        'bs/fila',
        array(
            '_controller' => 'TroubleticketBundle:BS:stack',
        )
        )
    );

$collection->add(
    'troubleticket_bs_stack_request',
    new Route(
        'bs/stack-request',
        array(
            '_controller' => 'TroubleticketBundle:BS:stackRequest',
        )
        )
    );

$collection->add(
    'troubleticket_bs_main',
    new Route(
        'bs/editar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:BS:main',
        ),
        array(),
        array(
            'id' => '\d+',
        )
        )
    );

$collection->add(
    'troubleticket_bs_take_on',
    new Route(
        'bs/assumir/{id}',
        array(
            '_controller' => 'TroubleticketBundle:BS:takeOn',
        ),
        array(),
        array(
            'id' => '\d+',
        )
        )
    );

$collection->add(
    'troubleticket_bs_send_to_user',
    new Route(
        'bs/enviar-para-usuario/{report_id}',
        array(
            '_controller' => 'TroubleticketBundle:BS:sendToUser',
            array(),
            array('report_id' => '\d+'),
            '',
            array(),
            array('POST')
        )
    )
);

$collection->add(
    'troubleticket_bs_comment',
    new Route(
        'bs/comentar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:BS:comment',
        ),
        array(),
        array(
            'id' => '\d+',
        )
        )
    );

$collection->add(
    'troubleticket_bs_close',
    new Route(
        'bs/fechar/{id}',
        array(
            '_controller' => 'TroubleticketBundle:BS:close',
        ),
        array(),
        array(
            'id' => '\d+',
        )
        )
    );

//Historico
$collection->add(
'troubleticket_history',
    new Route(
        'historico/{id}',
        array('_controller' => 'TroubleticketBundle:History:main',
            array(),
            array('id' => '\d+'),
            '',
            array(),
            array('GET')
        )
    )
);


//Visualizar Ponta
$collection->add(
	'troubleticket_tip',
	new Route(
			'ba/tip',
			array('_controller' => 'TroubleticketBundle:BA:previewTip',
					array(),
					array(),
					'',
					array(),
					array('GET')
			)
	)
);

//API Troubleticket
$collection->add(
    'troubleticket_api_login',
    new Route(
        'troubleticket/api/login',
        array('_controller' => 'TroubleticketBundle:API:login'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

// somente para teste
$collection->add(
    'troubleticket_is_logged',
    new Route(
        'troubleticket/api/is-logged',
        array('_controller' => 'TroubleticketBundle:API:isLogged'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_api_logout',
    new Route(
        'troubleticket/api/logout',
        array('_controller' => 'TroubleticketBundle:API:logout'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_api_circuits',
    new Route(
        'troubleticket/api/circuitos',
        array('_controller' => 'TroubleticketBundle:API:circuits'),
        array(),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_api_report',
    new Route(
        'troubleticket/api/chamado',
        array('_controller' => 'TroubleticketBundle:API:report'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_api_report_bs',
    new Route(
        'troubleticket/api/chamado-bs',
        array('_controller' => 'TroubleticketBundle:API:reportBS'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_api_report_list',
    new Route(
        'troubleticket/api/chamado',
        array('_controller' => 'TroubleticketBundle:API:reportList'),
        array(),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_api_report_detail',
    new Route(
        'troubleticket/api/chamado/{id}',
        array('_controller' => 'TroubleticketBundle:API:reportDetail'),
        array('id' => '\d+'),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_api_report_detail_lot',
    new Route(
        'troubleticket/api/chamados',
        array('_controller' => 'TroubleticketBundle:API:reportLotDetail'),
        array(),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_api_chat',
    new Route(
        'troubleticket/api/chat',
        array('_controller' => 'TroubleticketBundle:API:chat'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_pop_request',
    new Route('pop-request',array(
        '_controller' => 'TroubleticketBundle:Pop:mainRequest'),
        array(),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_provider_request',
    new Route('provider-request',array(
        '_controller' => 'TroubleticketBundle:Provider:mainRequest'),
        array(),
        array(),
        '',
        array(),
        array('GET')
    )
);

$collection->add(
    'troubleticket_api_report_close',
    new Route(
        'troubleticket/api/chamado/fechar/{id}',
        array('_controller' => 'TroubleticketBundle:API:reportClose'),
        array('id' => '\d+'),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_api_ba_un_resolved',
    new Route(
        'troubleticket/api/ba/nao/resolvido/{id}',
        array('_controller' => 'TroubleticketBundle:API:baUnsolved'),
        array('id' => '\d+'),
        array(),
        '',
        array(),
        array('PUT')
    )
);

$collection->add(
    'troubleticket_subcases_start_activity',
    new Route(
        'troubleticket/subcases/start',
        array('_controller' => 'TroubleticketBundle:Subcases:startActivity'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_subcases_comment_activity',
    new Route(
        'troubleticket/subcases/comment',
        array('_controller' => 'TroubleticketBundle:Subcases:commentActivity'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_subcases_vinculate_user_activity',
    new Route(
        'troubleticket/subcases/vinculate',
        array('_controller' => 'TroubleticketBundle:Subcases:vinculateUserToActivity'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_subcases_finish_activity',
    new Route(
        'troubleticket/subcases/finish',
        array('_controller' => 'TroubleticketBundle:Subcases:finishActivity'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add(
    'troubleticket_subcases_cancel_activity',
    new Route(
        'troubleticket/subcases/cancel',
        array('_controller' => 'TroubleticketBundle:Subcases:cancelActivity'),
        array(),
        array(),
        '',
        array(),
        array('POST')
    )
);

$collection->add('troubleticket_subcase_daily_extract',new Route('ba/daily/{reportId}',array(
    '_controller' => 'TroubleticketBundle:Subcases:daily',
    array(),
    array('reportId' => '\d+'),
    '',
    array(),
    array('GET','POST')))
    );

$collection->add('troubleticket_subcase_view_report',new Route('subcase/{subcaseId}/{type}',array(
    '_controller' => 'TroubleticketBundle:Subcases:viewReport',
    array(),
    array('subcaseId' => '\d+'),
    '',
    array(),
    array('GET')))
    );

/*$collection->add('troubleticket_subcases_start_activity',new Route('troubleticket/api/subcases/start/{id}',array(
    '_controller' => 'TroubleticketBundle:API:startActivity'),
    array(),
    array(),
    '',
    array(),
    array('GET')));*/

return $collection;

