<?php
namespace Servicos\RhBundle\Controller\RhDepartamento;
use Doctrine\Common\Collections\ArrayCollection;
use Rh\Entity\RhColaborador;
use Servicos\RhBundle\Controller\BaseController;
use Symfony\Component\Config\Definition\Exception\Exception;


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
        if($this->_repository === null)
        {
            $this->_entity = $this->getDoctrine()->
            getManager('rh');

            $this->_repository = $this->_entity->
            getRepository('ServicosRhBundle:RhDepartamento');
        }
    }

    public function DepartamentosFilhosAction($id){
       return $this->createJsonResponse(self::DepartamentosFilhos($id));
    }

    public function DepartamentosFilhos($id)
    {
        self::init();
        $retorno = array(
            'msg'  => '' ,
            'error'=> $id,
            'data' => array()
        );
        try
        {
            $arrayCollectionDepart = new ArrayCollection();
            $retorno['data'] = $this->_repository->getDepartamentosFilhos($id,$arrayCollectionDepart)->toArray();
        }
        catch(Exception $e)
        {
            $retorno['error'] = true;
            $retorno['msg']   = $e->getMessage();
        }

        return $retorno;
    }


    public function colaboradorDepartamentoAction($id)
    {
        $retorno = array(
            'msg'  => '' ,
            'error'=> $id,
            'data' => array()
        );
        try
        {

            self::init();

            $colaboradores = $this
                ->getDoctrine()
                ->getManager('rh')
                ->getRepository('ServicosRhBundle:RhColaboradorDepartamento')
                ->findBy(array('idDepartamento' => $id));

            if($colaboradores)
            {

                foreach($colaboradores as $key => $item)
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




}