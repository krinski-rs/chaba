<?php
namespace TroubleticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use TroubleticketBundle\Entity;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Ação para a realização de ações sobre o histórico dos boletins
 */
class HistoryController extends Controller
{
    /**
     * Apresenta o histórico completo de um boletim
     *
     * @param Request $request
     * @param int $id
     * @access public
     * @return mixed
     */
    public function mainAction(Request $request, $id)
    {
        $reportsRepository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports           = $reportsRepository->findOneBy(array('id' => $id));

        if (empty($reports)) {
            $request->getSession()
                    ->getFlashBag()
                    ->add("error", 'O boletim especificado não existe.');

            $url = $this->generateUrl(
                    'troubleticket_ba_stack'
                );

            return $this->redirect($url);
        }

        try{
            $permissions = $this->get('permissions');
            if (!$permissions->isAllowed($reports->getTypeString(), 'history')) {
                throw new TroubleticketBundleException('Você não possui permissão para visualizar o histórico de um boletim!');
            }

            $arrayUserData = $this->getUserNameByLot($reports->getHistories());
            foreach ($reports->getHistories() as $history) {
                $history->setUserName('Não disponível');
                foreach ($arrayUserData->colaborador as $user) {
                    if ($history->getUsuario() == $user->id) {
                        $history->setUserName($user->nome);
                        break;
                    }
                }
            }
        } catch (TroubleticketBundleException $tte){
            $request->getSession()
                    ->getFlashBag()
                    ->add('error', $tte->getMessage());
            $url = $this->generateUrl('troubleticket_'.strtolower($reports->getTypeString()).'_stack');
            return $this->redirect($url);
        }

        $render_template = 'TroubleticketBundle:History:main.html.twig';
        return $this->render($render_template, array('reports' => $reports));
    }

    /**
     * Obtem os nomes de usuário em lote
     *
     * @param array $histories
     * @access protected
     * @return StdClass
     */
    protected function getUserNameByLot($histories)
    {
        $ids = array();
        foreach($histories as $history){
            if(!in_array($history->getUsuario(), $ids)){
                array_push($ids, $history->getUsuario());
            }
        }

        $apiColaborador = $this->get('troubleticket.colaborador_api');

        if (empty($apiColaborador)) {
            throw new TroubleticketBundleException('Não foi possível recuperar os dados de usuário!');
            return array();
        }

        return $apiColaborador->getByIds($ids);
    }
}
