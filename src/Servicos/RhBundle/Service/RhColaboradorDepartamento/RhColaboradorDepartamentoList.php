<?php
namespace Servicos\RhBundle\Service\RhColaboradorDepartamento;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Servicos\RhBundle\Entity as EntityRh;
use Servicos\ComercialBundle\Entity as EntityComercial;

class RhColaboradorDepartamentoList {

	private $entityDefault = NULL;
    private $entityComercial = NULL;
	private $RhColaboradorRepository = NULL;
	private $RhDepartamentoRepository = NULL;
	private $RhColaboradorDepartamentoRepository = NULL;
    private $vipRepository = NULL;
    private $vipLevelRepository = NULL;
    private $listaColaboradores = array();
    private $objValidator = NULL;
    private $canalUsuarioRepository = NULL;
    private $walletRepository = NULL;

    public function __construct(Container $objContainer) {
        try {
            $this->objValidator = $objContainer->get('validator');
            $this->entityDefault = $objContainer->get('doctrine')->getManager('default');
            $this->entityComercial = $objContainer->get('doctrine')->getManager('comercial');
            $this->vipRepository = $this->entityComercial->getRepository('ServicosComercialBundle:Vip');
            $this->vipLevelRepository = $this->entityComercial->getRepository('ServicosComercialBundle:VipLevel');
            $this->canalUsuarioRepository = $this->entityComercial->getRepository('ServicosComercialBundle:CanalUsuario');
            $this->RhColaboradorDepartamentoRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhColaboradorDepartamento');
            $this->RhDepartamentoRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhDepartamento');
            $this->RhColaboradorRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhColaborador');
            $this->walletRepository = $this->entityComercial->getRepository('ServicosComercialBundle:Wallet');
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
    /*
     * Retorna os departamentos em que o Colaborador é supervisor ou staff
     */
    public function getDepartamentosSupervisorStaff(Request $objRequest) {
        try {
            $RhColaborador = $this->RhColaboradorRepository->findOneBy(
                array('idAltUsuarioSistech' => (integer)$objRequest->get("idAltUsuario"))
            );
            $departamentosColaborador = $this->RhColaboradorDepartamentoRepository->findByidColaborador($RhColaborador);
            if(!count($departamentosColaborador)) {
                return array();
            }
            $idsDepartamentoColaborador = array();
            foreach ( $departamentosColaborador as $departamentoColaborador) {
                if($departamentoColaborador->getBoss() == true) {
                    $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamento();
                }
                if($departamentoColaborador->getIdDepartamento()->getStaff() == true) {
                    $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamentoAsc();
                }
            }
            $departamentos = $this->RhDepartamentoRepository->findBy(
                array("idDepartamento" => $idsDepartamentoColaborador)
            );
            return $departamentos;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function getDepartamentosSupervisorStaffByAutUsuarioId($id) {
        try {
            $RhColaborador = $this->RhColaboradorRepository->findOneBy(
                array('idAltUsuarioSistech' => $id)
            );
            $departamentosColaborador = $this->RhColaboradorDepartamentoRepository->findByidColaborador($RhColaborador);
            if(!count($departamentosColaborador)) {
                return array();
            }
            $idsDepartamentoColaborador = array();
            foreach ( $departamentosColaborador as $departamentoColaborador) {
                if($departamentoColaborador->getBoss() == true) {
                    $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamento();
                }
                if($departamentoColaborador->getIdDepartamento()->getStaff() == true) {
                    $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamentoAsc();
                }
            }
            $departamentos = $this->RhDepartamentoRepository->findBy(
                array("idDepartamento" => $idsDepartamentoColaborador)
            );
            return $departamentos;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function getArrayEvs(Request $objRequest){
        try {
            // Valida se é colaborador
            $RhColaborador = $this->RhColaboradorRepository->findOneBy(
                array('idAltUsuarioSistech' => (integer)$objRequest->get("idAltUsuario"))
            );
            if(!($RhColaborador instanceof EntityRh\RhColaborador)){
                throw new \Exception("Colaborador não encontrado");
            }
            // Se for vip, pode ver todos os evs
            $vip = $this->vipRepository->findOneBy(array(
                'level' => $this->vipLevelRepository->find(1),
                'userId' => $RhColaborador->getIdAltUsuarioSistech()
            ));
            if ($vip instanceof EntityComercial\Vip){
                $evs = array();
                $arrayWallet = $this->walletRepository->findAll(array(),array('idEv'));
                foreach ($arrayWallet as $objWallet){
                    $evs[] = $objWallet->getIdev();
                }
                return $evs;
            }

            $departamentosBossStaff = $this->getDepartamentosSupervisorStaff($objRequest);
            if(count($departamentosBossStaff)){
                foreach ($departamentosBossStaff as $objDepartamento) {
                    $this->getArvoreSubordinados($objDepartamento);
                }
                return $this->listaColaboradores;
            } else {
                return array("autUsuario" => $objRequest->get("idAltUsuario"));
            }
        }catch(\Exception $ex){
            throw $ex;
        }
    }

    public function getRegional($ev){
        try {
            $RhColaborador = $this->RhColaboradorRepository->findOneBy(
                array('idAltUsuarioSistech' => (integer)$ev)
            );
            $departamentosColaborador = $this->RhColaboradorDepartamentoRepository->findByidColaborador($RhColaborador);

            if (count($departamentosColaborador) && $departamentosColaborador[0] instanceof EntityRh\RhColaboradorDepartamento) {
                $RhDepartamento = $this->RhDepartamentoRepository->find($departamentosColaborador[0]->getIdDepartamento()->getIdDepartamento());
                $RhDepartamentoAsc = $this->RhDepartamentoRepository->find($RhDepartamento->getIdDepartamentoAsc());
                $nomeRegional = $RhDepartamentoAsc->getNome();
            } else {
                $nomeRegional = "Sem Regional";
            }

            return $nomeRegional;
        }catch(\Exception $ex){
            throw $ex;
        }
    }

    public function getArrayEvs2(Request $objRequest){
        try {
            // Valida se é colaborador
            $RhColaborador = $this->RhColaboradorRepository->findOneBy(
                array('idAltUsuarioSistech' => (integer)$objRequest->get("idAltUsuario"))
            );
            if(!($RhColaborador instanceof EntityRh\RhColaborador)){
                throw new \Exception("Colaborador não encontrado");
            }

            $departamentosBossStaff = $this->getDepartamentosSupervisorStaff($objRequest);
            if(count($departamentosBossStaff)){
                foreach ($departamentosBossStaff as $objDepartamento) {
                    $this->getArvoreSubordinados($objDepartamento);
                }
                return $this->listaColaboradores;
            } else {
                return array("autUsuario" => $objRequest->get("idAltUsuario"));
            }
        }catch(\Exception $ex){
            throw $ex;
        }
    }

    public function getArrayEvsByAutUsuarioId($id)
    {
        $RhColaborador = $this->RhColaboradorRepository
                              ->findOneBy(array('idAltUsuarioSistech' => $id));

        if(!($RhColaborador instanceof EntityRh\RhColaborador)){
            throw new \Exception("Colaborador não encontrado");
        }
        // Se for vip, pode ver todos os evs
        $vip = $this->vipRepository
                    ->findOneBy(array(
                        'level'  => $this->vipLevelRepository->find(1),
                        'userId' => $RhColaborador->getIdAltUsuarioSistech()
                    ));

        if ($vip instanceof EntityComercial\Vip) {
            $evs = array();
            $arrayWallet = $this->walletRepository->findAll(array(),array('idEv'));
            foreach ($arrayWallet as $objWallet) {
                $evs[] = $objWallet->getIdev();
            }
            return $evs;
        }

        $departamentosBossStaff = $this->getDepartamentosSupervisorStaffByAltUsuarioId($id);
        if(count($departamentosBossStaff)){
            foreach ($departamentosBossStaff as $objDepartamento) {
                $this->getArvoreSubordinados($objDepartamento);
            }
            return $this->listaColaboradores;
        } else {
            return array("autUsuario" => $id);
        }
    }

    public function getDepartamentosSupervisorStaffByAltUsuarioId($id)
    {
        $RhColaborador = $this->RhColaboradorRepository->findOneBy(
            array('idAltUsuarioSistech' => $id)
        );
        $departamentosColaborador = $this->RhColaboradorDepartamentoRepository->findByidColaborador($RhColaborador);
        if(!count($departamentosColaborador)) {
            return array();
        }
        $idsDepartamentoColaborador = array();
        foreach ( $departamentosColaborador as $departamentoColaborador) {
            if($departamentoColaborador->getBoss() == true) {
                $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamento();
            }
            if($departamentoColaborador->getIdDepartamento()->getStaff() == true) {
                $idsDepartamentoColaborador[] = $departamentoColaborador->getIdDepartamentoAsc();
            }
        }
        $departamentos = $this->RhDepartamentoRepository->findBy(
            array("idDepartamento" => $idsDepartamentoColaborador)
        );
        return $departamentos;
    }

    public function getArvoreSubordinados($objDepartamento){
        $objColaboradorDepartamento = $this->RhColaboradorDepartamentoRepository->findBy(array(
            'idDepartamento' => $objDepartamento,
        ));
        foreach ($objColaboradorDepartamento as $colaboradorDepartamento) {
            $this->listaColaboradores[] = $colaboradorDepartamento->getIdColaborador()->getIdAltUsuarioSistech();
        }
        $departamentosFilho = $this->RhDepartamentoRepository->findBy(array(
            'idDepartamentoAsc' => $objDepartamento->getIdDepartamento(),
        ));
        foreach ($departamentosFilho as $departamentoFilho) {
            $this->getArvoreSubordinados($departamentoFilho);
        }
    }
}
