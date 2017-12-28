<?php
namespace Servicos\RhBundle\Service\RhColaborador;
use Servicos\RhBundle\Entity\RhColaborador;

/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 27/07/16
 * Time: 15:22
 */
class ServiceList
{
    /**
     * @var \Doctrine\ORM\Repository
     */
    protected $_repository;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_entityManager;
    /**
     * @var Container
     */
    protected $_objContainer;
    /**
     * @return void
     */
    function __construct(\Symfony\Component\DependencyInjection\Container $objContainer)
    {
        if(is_null($this->_objContainer))
        {
            $this->_objContainer  = $objContainer;
            $this->_entityManager = $this->_objContainer->get('doctrine')->getManager('rh');
            $this->_repository    = $this->_entityManager->getRepository('ServicosRhBundle:RhColaborador');
        }
    }

    public function getFilial($id)
    {
        $objRhColaborador = $this->_repository->
        findOneBy(array('idAltUsuarioSistech' => $id));
        $return = array();
        if ($objRhColaborador instanceof RhColaborador){

            $filialAtual = $objRhColaborador->getColaboradorFilial()->filter(function ($filiais){
                if ($filiais->getDataFim() == null){
                    return $filiais;
                }
            })->first();

            $repositoryCadUser = $this->_objContainer->get('doctrine')
                ->getManager('default')
                ->getRepository('ServicosGcdbBundle:CadUsers');

            $return = $repositoryCadUser->getMatrizPelaFilial($filialAtual->getSistechCodigoid());
        }

        return $return;

    }
}