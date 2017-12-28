<?php
namespace TroubleticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use TroubleticketBundle\Entity;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Ação para a realização de ações sobre os pops
 */
class PopController extends Controller
{
    /**
     * Busca os pops através da api para ser demonstrados na modal de chamento de boletins
     *
     * @param Request $request
     * @access public
     * @return JsonResponse
     */
    public function mainRequestAction(Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA', 'read')) {
            $json_response = new JsonResponse();
            $json_response->setData(array(
                'data' => array(),
                'recordsTotal' => array(),
                'recordsFiltered' => array(),
                'draw' => null,
            ));

            return $json_response;
        }

        $request_draw = intval($request->query->get('draw'));
        $request_start = intval($request->query->get('start'));
        $request_page_limit = intval($request->query->get('length'));

        $cid = strval($request->query->get('cid',null));

        $troubleticket_pop_api = $this->get('troubleticket.pop_api');

        $error = null;

        try {
            $troubleticket_pop_api_get = $troubleticket_pop_api->get(
                $request_page_limit,
                $request_start,
                null,
                null,
                null,
                true,//sempre traz os ativos
                $cid);//procura pela mesma palavra chave em outros campos

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add('error_message',$error->getMessage());

            $troubleticket_circuit_api_get = array();
            $error = $error->getMessage();
        }

        $data_list = array();
        $pop_total = 0;

        //busca os campos através do filtro pelo pop
        if (!empty($troubleticket_pop_api_get) && !empty($troubleticket_pop_api_get->pop)) {
            $pop_total = intval($troubleticket_pop_api_get->total);
            $data_list = $troubleticket_pop_api_get->pop;
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $data_list,
            'recordsTotal' => $pop_total,
            'recordsFiltered' => $pop_total,
            'draw' => $request_draw,
            'error' => $error
        ));

        return $json_response;
    }
}
