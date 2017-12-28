<?php
namespace Servicos\RhBundle\Service\RhDepartamento;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use Servicos\RhBundle\Entity as EntityRh;
use Servicos\GcdbBundle\Entity as EntityGcdb;

class RhDepartamentoCreate {
		
	private $objValidator = NULL;
	private $entityDefault = NULL;
	private $objRhDepartamento = NULL;
	private $objRhDepartamentoAsc = NULL;
	private $objRhDepartamentoRepository = NULL;
	
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
			$this->objRhDepartamentoRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhDepartamento');
		} catch (\Exception $ex) {
			throw $ex;
		}
	}

	public function getObjRhDepartamento(){
		return $this->objRhDepartamento;
	}

	public function setObjRhDepartamentoAsc(EntityRh\RhDepartamento $objRhDepartamentoAsc){
		try {
			$this->objRhDepartamentoAsc = $objRhDepartamentoAsc;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
	
	public function createRhDepartamento(Request $objRequest){
		try {
			$this->validate($objRequest);
			$this->objRhDepartamento = new EntityRh\RhDepartamento();
			$this->objRhDepartamento->setDataInc(new \DateTime());
			$this->objRhDepartamento->setIdDepartamentoAsc($this->objRhDepartamentoAsc);
			$this->objRhDepartamento->setNome(trim(preg_replace('!\s+!', ' ', $objRequest->get('nome'))));
			$this->objRhDepartamento->setStaff((boolean)$objRequest->get('staff'));
		} catch (\Exception $ex) {
			throw $ex;
		}	
	}
	
	private function validate(Request $objRequest){
		try {
			
			if((integer)$objRequest->get('idDepartamentoAsc') && !($this->objRhDepartamentoAsc instanceof EntityRh\RhDepartamento)){
				$this->objRhDepartamentoAsc = $this->objRhDepartamentoRepository->find((integer)$objRequest->get('idDepartamentoAsc'));
				$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhDepartamento';
				$errorList = $this->objValidator->validateValue($this->objRhDepartamentoAsc,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idDepartamentoAsc', $errorList[0]->getMessage())); }
			}
			
			$this->arrayValidationLength['min'] = 5;
			$this->arrayValidationLength['max'] = 255;
			$errorList = $this->objValidator->validateValue(trim(preg_replace('!\s+!', ' ', $objRequest->get('nome'))),
				array(
					new Assert\NotNull($this->arrayValidationNotNull),
					new Assert\NotBlank($this->arrayValidationNotBlank),
					new Assert\Length($this->arrayValidationLength)
				)
			);
			if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'nome', $errorList[0]->getMessage())); }
		} catch (\Exception $ex) {
			throw $ex;
		}
	}
	
	public function save(){
		try {
			if(($this->objRhDepartamento instanceof EntityRh\RhDepartamento) && $this->objRhDepartamento->getIdDepartamento()){
				$this->entityDefault->merge($this->objRhDepartamento);
			}elseif($this->objRhDepartamento instanceof EntityRh\RhDepartamento){
				$this->entityDefault->persist($this->objRhDepartamento);
			}else{
				throw new \Exception('Erro::objRhDepartamento não e uma instancia de "EntityRh\RhDepartamento".');
			}
			$this->entityDefault->flush();
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
}
