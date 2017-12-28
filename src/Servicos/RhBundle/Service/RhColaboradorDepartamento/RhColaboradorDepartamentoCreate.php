<?php
namespace Servicos\RhBundle\Service\RhColaboradorDepartamento;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use Servicos\RhBundle\Entity as EntityRh;
use Servicos\GcdbBundle\Entity as EntityGcdb;

class RhColaboradorDepartamentoCreate {
		
	private $objValidator = NULL;
	private $entityDefault = NULL;
	private $objRhDepartamento = NULL;
	private $objRhColaborador = NULL;
	private $objRhColaboradorDepartamento = NULL;
	private $objRhColaboradorRepository = NULL;
	private $objRhDepartamentoRepository = NULL;
	private $objRhColaboradorDepartamentoRepository = NULL;
	
	private $arrayValidationNotNull = array(
		'message' => 'O campo "{{ campo }}" não pode ser nulo.'
     );
	
	private $arrayValidationNotBlank = array(
		'message' => 'O campo "{{ campo }}" não pode ser vazio.'
    );

	private $arrayValidationType = array(
		'message' => 'Valor do campo "{{ campo }}" é inválido.',
		'type' => NULL
	);

	private $arrayValidationLength = array(
		'min' => 5,
		'max' => 100,
		'minMessage' => 'O campo "{{ campo }}" deve ter no mínimo {{ limit }} caracteres.',
		'maxMessage' => 'O campo "{{ campo }}" não pode ter mais de {{ limit }} caracteres.'
	);
	
	public function __construct(Container $objContainer) {
		try {
			$this->objValidator = $objContainer->get('validator');
			$this->entityDefault = $objContainer->get('doctrine')->getManager('default');
			$this->objRhColaboradorDepartamentoRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhColaboradorDepartamento');
			$this->objRhDepartamentoRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhDepartamento');
			$this->objRhColaboradorRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhColaborador');
		} catch (\Exception $ex) {
			throw $ex;
		}
	}

	public function getObjRhColaboradorDepartamento(){
		return $this->objRhColaboradorDepartamento;
	}

	public function setObjRhDepartamento(EntityRh\RhDepartamento $objRhDepartamento){
		try {
			$this->objRhDepartamento = $objRhDepartamento;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}

	public function setObjRhColaborador(EntityRh\RhColaborador $objRhColaborador){
		try {
			$this->objRhColaborador = $objRhColaborador;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
	
	public function createRhColaboradorDepartamento(Request $objRequest){
		try {
			$this->validate($objRequest);
			$this->objRhColaboradorDepartamento = new EntityRh\RhColaboradorDepartamento();
			$this->objRhColaboradorDepartamento->setBoss((boolean)$objRequest->get('boss'));
			$this->objRhColaboradorDepartamento->setDataInc(new \DateTime());
			$this->objRhColaboradorDepartamento->setIdColaborador($this->objRhColaborador);
			$this->objRhColaboradorDepartamento->setIdDepartamento($this->objRhDepartamento);
		} catch (\Exception $ex) {
			throw $ex;
		}	
	}
	
	private function validate(Request $objRequest){
		try {
			if(!($this->objRhDepartamento instanceof EntityRh\RhDepartamento)){
				$this->objRhDepartamento = $this->objRhDepartamentoRepository->find((integer)$objRequest->get('idDepartamento'));
				$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhDepartamento';
				$errorList = $this->objValidator->validateValue($this->objRhDepartamento,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idDepartamento', $errorList[0]->getMessage())); }
			}
					
			if(!($this->objRhColaborador instanceof EntityRh\RhColaborador)){
				$this->objRhColaborador = $this->objRhColaboradorRepository->find((integer)$objRequest->get('idColaborador'));
				$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhColaborador';
				$errorList = $this->objValidator->validateValue($this->objRhColaborador,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idColaborador', $errorList[0]->getMessage())); }
			}
					
			$this->objRhColaboradorDepartamento = $this->objRhColaboradorDepartamentoRepository->findOneBy(array('idDepartamento'=>$this->objRhDepartamento, 'idColaborador'=>$this->objRhColaborador));
			if($this->objRhColaboradorDepartamento instanceof EntityRh\RhColaboradorDepartamento){
				throw new \Exception('Colaborador já vinculado a este departamento.');
			}
			
		} catch (\Exception $ex) {
			throw $ex;
		}
	}
	
	public function save(){
		try {
			if(($this->objRhColaboradorDepartamento instanceof EntityRh\RhColaboradorDepartamento) && $this->objRhColaboradorDepartamento->getIdColaboradorDepartamento()){
				$this->entityDefault->merge($this->objRhColaboradorDepartamento);
			}elseif($this->objRhColaboradorDepartamento instanceof EntityRh\RhColaboradorDepartamento){
				$this->entityDefault->persist($this->objRhColaboradorDepartamento);
			}else{
				throw new \Exception('Erro::objRhColaboradorDepartamento não e uma instancia de "EntityRh\RhColaboradorDepartamento".');
			}
			$this->entityDefault->flush();
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
}
