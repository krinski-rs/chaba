<?php
namespace Servicos\RhBundle\Controller\RhColaboradorDepartamento;
use Doctrine\Common\Collections\ArrayCollection;
use Rh\Entity\RhColaborador;
use Servicos\RhBundle\Controller\BaseController;



/**
 * Created by PhpStorm.
 * User: rpires
 * Date: 25/05/16
 * Time: 09:09
 */
class DefaultController extends BaseController
{
    /**
     *
     * @var \Doctrine\ORM\Repository
     */
    protected $_repository;
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_entity;

    /**
     * @return void
     */
    public function init()
    {
        if($this->_repository === null){
            $this->_entity = $this->getDoctrine()->
            getManager('rh');

            $this->_repository = $this->_entity->
            getRepository('ServicosRhBundle:RhColaboradorDepartamento');
        }
    }

    public function indexAction(){
        $retorno = array(
            'msg'  => '' ,
            'error'=> false,
            'data' => array()
        );
        return $this->createJsonResponse($retorno);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function altusuarioAction($id){

        $retorno = array(
            'msg'  => '' ,
            'error'=> $id,
            'data' => array()
        );
        try
        {

            self::init();

            $colaborador = $this
                ->getDoctrine()
                ->getManager('rh')
                ->getRepository('ServicosRhBundle:RhColaborador')
                ->findOneBy(array('idAltUsuarioSistech' => $id));

            if($colaborador)
            {
                $arraySubordinados = self::getSubordinados($colaborador);

                foreach($arraySubordinados as $key => $item)
                {
                    array_push($retorno['data'], array(
                        'nome'     => $item->getIdColaborador()->getNome(),
                        'id'       => $item->getIdColaborador()->getIdColaborador(),
                        'aut_user' => $item->getIdColaborador()->getIdAltUsuarioSistech(),
                        'unidade'  => $item->getIdColaborador()->getUnidCodigoid()
                    ));
                }
            }
            else
            {
                $retorno['error'] = true;
                $retorno['msg']   = "Erro ao localizar o colaborador";
            }
        }
        catch(\Exception $e)
        {
            $retorno['error'] = true;
            $retorno['msg']   = $e->getMessage();
        }

        return $this->createJsonResponse($retorno);
    }


    /**
     * @param RhColaborador $colaborador
     * @return ArrayCollection|\Exception
     */
    private function getSubordinados( $colaborador)
    {
        $dataRetorno = new ArrayCollection();


        try
        {
            self::init();
            $deptBoss = $this->_repository->
            findBy(array('idColaborador' => $colaborador->getIdColaborador(), 'boss' => 1));

            foreach($deptBoss as $key => $item)
            {
                 $dataRetorno->add($item->getIdDepartamento()->getColaboradorDepartamento()->filter(function($obj) use ($dataRetorno){
                     if(!$dataRetorno->contains($obj->getIdColaborador()))
                     {
                         return $obj->getIdColaborador();
                     }
                 }));
            }

        }
        catch(\Exception $e)
        {
            return $e;
        }
        return $dataRetorno->first();
    }

}