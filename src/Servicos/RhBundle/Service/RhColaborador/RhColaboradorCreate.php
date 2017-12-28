<?php
namespace Servicos\RhBundle\Service\RhColaborador;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use Servicos\RhBundle\Entity as EntityRh;
use Servicos\LumaBundle\Entity as EntityLuma;
use Servicos\GcdbBundle\Entity as EntityGcdb;

class RhColaboradorCreate {
		
	private $objValidator = NULL;
	private $entityDefault = NULL;
	private $objRhColaborador = NULL;
	private $objRhColaboradorAnterior = NULL;
	private $objRhColaboradorPai = NULL;
	private $objRhColaboradorRepository = NULL;
	private $objRhTipoColaborador = NULL;
	private $objRhTipoColaboradorRepository = NULL;
	private $objAutUsuarios = NULL;
	private $objAutUsuariosRegistrante = NULL;
	private $objAutUsuariosRepository = NULL;
	private $objCadUsers = NULL;
	private $objCadUsersRepository = NULL;
	private $objAdmCidades = NULL;
	private $objAdmCidadesRepository = NULL;
	private $objUnidade = NULL;
	private $objUnidadeRepository = NULL;
	private $arrayPameters = array();
	
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

	private $arrayValidationChoice = array(
			'min' => 1,
			'max' => 1,
			'minMessage' => '"{{ campo }}" Você deve selecionar pelo menos {{ limit }} escolha(s).',
			'maxMessage' => '"{{ campo }}" Você deve selecionar no máximo {{ limit }} escolha(s).'
	);
	
	public function __construct(Container $objContainer) {
		try {
			$this->objValidator = $objContainer->get('validator');
			$this->arrayPameters = $objContainer->getParameter('colaborador');
			$this->entityDefault = $objContainer->get('doctrine')->getManager('default');
			$this->objRhColaboradorRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhColaborador');
			$this->objRhTipoColaboradorRepository = $this->entityDefault->getRepository('ServicosRhBundle:RhTipoColaborador');
			$this->objCadUsersRepository = $this->entityDefault->getRepository('ServicosGcdbBundle:CadUsers');
			$this->objAutUsuariosRepository = $this->entityDefault->getRepository('ServicosGcdbBundle:AutUsuarios');
			$this->objAdmCidadesRepository = $this->entityDefault->getRepository('ServicosGcdbBundle:AdmCidades');
			$this->objUnidadeRepository = $this->entityDefault->getRepository('ServicosLumaBundle:Unidade');
		} catch (\Exception $ex) {
			throw $ex;
		}
	}

	public function getObjRhColaborador(){
		return $this->objRhColaborador;
	}

	public function setObjAutUsuarios(EntityGcdb\AutUsuarios $objAutUsuarios){
		try {
			$this->objAutUsuarios = $objAutUsuarios;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}

	public function setObjCadUsers(EntityGcdb\CadUsers $objCadUsers){
		try {
			$this->objCadUsers = $objCadUsers;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
	
	public function setObjRhColaboradorAnterior(EntityRh\RhColaborador $objRhColaboradorAnterior){
		try {
			$this->objRhColaboradorAnterior = $objRhColaboradorAnterior;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}

	public function setObjRhColaboradorPai(EntityRh\RhColaborador $objRhColaboradorPai){
		try {
			$this->objRhColaboradorPai = $objRhColaboradorPai;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
	
	public function setObjUnidade(EntityLuma\Unidade $objUnidade){
		try {
			$this->objUnidade = $objUnidade;
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
	
	public function createRhColaborador(Request $objRequest){
		try {
			$this->validate($objRequest);
			$this->objRhColaborador = new EntityRh\RhColaborador();
			$this->objRhColaborador->setAtivo(true);
			$this->objRhColaborador->setAutUsuarios($this->objAutUsuarios);
			$this->objRhColaborador->setCadUsers($this->objCadUsers);
			if($this->objCadUsers instanceof EntityGcdb\CadUsers){
				$this->objRhColaborador->setCpf($this->objCadUsers->getCpf());
				$this->objRhColaborador->setDataNascimento($this->objCadUsers->getDtAbertura());
			}else{
				$this->objRhColaborador->setCpf(NULL);
				$this->objRhColaborador->setDataNascimento(NULL);
			}
			$this->objRhColaborador->setDataInc(new \DateTime());
			$this->objRhColaborador->setEndereco(NULL);
			if(strlen(trim($objRequest->get('estadoCivil')))){
				$this->objRhColaborador->setEstadoCivil($objRequest->get('estadoCivil'));
			}else{
				$this->objRhColaborador->setEstadoCivil(NULL);
			}
			$this->objRhColaborador->setFiliacaoProfissao(NULL);
			$this->objRhColaborador->setFone(NULL);
			if((integer)$objRequest->get('idAltUsuarioSistech')){
				$this->objRhColaborador->setIdAltUsuarioSistech((integer)$objRequest->get('idAltUsuarioSistech'));
			}else{
				$this->objRhColaborador->setIdAltUsuarioSistech(NULL);
			}
			
			if((integer)$objRequest->get('idCadUserSistech')){
				$this->objRhColaborador->setIdCadUserSistech((integer)$objRequest->get('idCadUserSistech'));
			}else{
				$this->objRhColaborador->setIdCadUserSistech(NULL);
			}
			
			$this->objRhColaborador->setIdColaboradorAnterior($this->objRhColaboradorAnterior);
			$this->objRhColaborador->setIdColaboradorPai($this->objRhColaboradorPai);
			$this->objRhColaborador->setIdTipoColaborador($this->objRhTipoColaborador);
			if($this->objAdmCidades instanceof EntityGcdb\AdmCidades){
				$this->objRhColaborador->setLocalNascimento($this->objAdmCidades->getId());
			}else{
				$this->objRhColaborador->setLocalNascimento(NULL);
			}
			if((integer)$objRequest->get('matricula')){
				$this->objRhColaborador->setMatricula((integer)$objRequest->get('matricula'));
			}else{
				$this->objRhColaborador->setMatricula(NULL);
			}
			
			$nome = NULL;
			
			if($this->objCadUsers instanceof EntityGcdb\CadUsers){
				$arrayCadUsersNome = $this->objCadUsers->getCadUsersNome();
				if($arrayCadUsersNome->count()){
					$nome = '';
					$arrayCadUsersNome->first();
					while($objCadUsersNome = $arrayCadUsersNome->current()){
						if($arrayCadUsersNome->key()){
							$nome.= ' ';
						}
						$nome = trim($objCadUsersNome->getNome());
						$arrayCadUsersNome->next();
					}
				}
			}
			
			$this->objRhColaborador->setNome($nome);
			$this->objRhColaborador->setRegistrante($this->objAutUsuariosRegistrante->getId());
			if(strlen(trim($objRequest->get('sexo')))){
				$this->objRhColaborador->setSexo($objRequest->get('sexo'));
			}else{
				$this->objRhColaborador->setSexo(NULL);
			}
			$this->objRhColaborador->setUnidade($this->objUnidade);
			if((integer)$objRequest->get('unidCodigoid')){
				$this->objRhColaborador->setUnidCodigoid((integer)$objRequest->get('unidCodigoid'));
			}else{
				$this->objRhColaborador->setUnidCodigoid(NULL);
			}
				
		} catch (\Exception $ex) {
			throw $ex;
		}	
	}
	
	private function validate(Request $objRequest){
		try {
			if(!($this->objAutUsuarios instanceof EntityGcdb\AutUsuarios)){
				$this->objAutUsuarios = $this->objAutUsuariosRepository->findOneBy(array('id'=>(integer)$objRequest->get('idAltUsuarioSistech'), 'ativo'=>true));
				$this->arrayValidationType['type'] = 'Servicos\GcdbBundle\Entity\AutUsuarios';
				$errorList = $this->objValidator->validateValue($this->objAutUsuarios,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idAltUsuarioSistech', $errorList[0]->getMessage())); }
			}else{
				if(!$this->objAutUsuarios->getAtivo()){
					throw new \Exception('O usuário está inativo.');
				}
			}
			
			$this->objAutUsuariosRegistrante = $this->objAutUsuariosRepository->findOneBy(array('id'=>(integer)$objRequest->get('registrante'), 'ativo'=>true));
			$this->arrayValidationType['type'] = 'Servicos\GcdbBundle\Entity\AutUsuarios';
			$errorList = $this->objValidator->validateValue($this->objAutUsuariosRegistrante,
				array(
					new Assert\NotNull($this->arrayValidationNotNull),
					new Assert\NotBlank($this->arrayValidationNotBlank),
					new Assert\Type($this->arrayValidationType)
				)
			);
			if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'registrante', $errorList[0]->getMessage())); }
			
			if(!($this->objCadUsers instanceof EntityGcdb\CadUsers)){
				$this->objCadUsers = $this->objCadUsersRepository->findOneBy(array('id'=>(integer)$objRequest->get('idCadUserSistech'), 'tipo'=>'J'));
				$this->arrayValidationType['type'] = 'Servicos\GcdbBundle\Entity\CadUsers';
				$errorList = $this->objValidator->validateValue($this->objCadUsers,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idCadUserSistech', $errorList[0]->getMessage())); }
			}else{
				if($this->objCadUsers->getTipo() !== 'F'){
					throw new \Exception('Pessoa Jurídica não de ser vinculada a um colaborador.');
				}
			}

			$objRhColaborador = $this->objRhColaboradorRepository->findOneBy(array('idCadUserSistech' => $this->objCadUsers->getId()));
			if($objRhColaborador instanceof EntityRh\RhColaborador){
				throw new \Exception('Pessoa Física já vinculada a um colaborador');
			}
				
			if((integer)$objRequest->get('unidCodigoid')){
				$this->objUnidade = $this->objUnidadeRepository->findOneBy(array('unidCodigoid'=>(integer)$objRequest->get('unidCodigoid'), 'unidAtivo'=>true));
				$this->arrayValidationType['type'] = 'Servicos\LumaBundle\Entity\Unidade';
				$errorList = $this->objValidator->validateValue($this->objUnidade,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'unidCodigoid', $errorList[0]->getMessage())); }
			}elseif(($this->objUnidade instanceof EntityLuma\Unidade) && !$this->objUnidade->getUnidAtivo()){
				throw new \Exception('A unidade não está ativa.');
			}

			$this->objRhTipoColaborador = $this->objRhTipoColaboradorRepository->findOneBy(array('idTipoColaborador'=>(integer)$objRequest->get('idTipoColaborador'), 'ativo'=>true));
			$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhTipoColaborador';
			$errorList = $this->objValidator->validateValue($this->objRhTipoColaborador,
				array(
					new Assert\NotNull($this->arrayValidationNotNull),
					new Assert\NotBlank($this->arrayValidationNotBlank),
					new Assert\Type($this->arrayValidationType)
				)
			);
			if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idTipoColaborador', $errorList[0]->getMessage())); }
			
			if((integer)$objRequest->get('idColaboradorAnterior')){
				$this->objRhColaboradorAnterior = $this->objRhColaboradorRepository->find((integer)$objRequest->get('idColaboradorAnterior'));
				$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhColaborador';
				$errorList = $this->objValidator->validateValue($this->objRhColaboradorAnterior,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idColaboradorAnterior', $errorList[0]->getMessage())); }
			}
			
			if((integer)$objRequest->get('idColaboradorPai')){
				$this->objRhColaboradorPai = $this->objRhColaboradorRepository->findOneBy(array('idColaborador'=>(integer)$objRequest->get('idColaboradorPai'), 'ativo'=>true));
				$this->arrayValidationType['type'] = 'Servicos\RhBundle\Entity\RhColaborador';
				$errorList = $this->objValidator->validateValue($this->objRhColaboradorPai,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'idColaboradorPai', $errorList[0]->getMessage())); }
			}
			
			if((integer)$objRequest->get('localNascimento')){
				$this->objAdmCidades = $this->objAdmCidadesRepository->find((integer)$objRequest->get('localNascimento'));
				$this->arrayValidationType['type'] = 'Servicos\GcdbBundle\Entity\AdmCidades';
				$errorList = $this->objValidator->validateValue($this->objAdmCidades,
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationType)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'localNascimento', $errorList[0]->getMessage())); }
			}

			if(strlen(trim($objRequest->get('sexo')))){
				$this->arrayValidationChoice['choices'] = $this->arrayPameters['sexo'];
				$errorList = $this->objValidator->validateValue($objRequest->get('sexo'),
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationChoice)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'sexo', $errorList[0]->getMessage())); }
			}
			if(strlen(trim($objRequest->get('estadoCivil')))){
				$this->arrayValidationChoice['choices'] = $this->arrayPameters['colaborador']['estado_civil'];
				$errorList = $this->objValidator->validateValue($objRequest->get('estadoCivil'),
					array(
						new Assert\NotNull($this->arrayValidationNotNull),
						new Assert\NotBlank($this->arrayValidationNotBlank),
						new Assert\Type($this->arrayValidationChoice)
					)
				);
				if(count($errorList)){ throw new \Exception(str_replace('{{ campo }}', 'estadoCivil', $errorList[0]->getMessage())); }
			}

			if((integer)$objRequest->get('matricula')){
				$objColaboradorMatricula = $this->objRhColaboradorRepository->findOneBy(array('matricula'=>(integer)$objRequest->get('matricula')));
				if($objColaboradorMatricula instanceof \Servicos\RhBundle\Entity\RhColaborador){
					throw new \Exception('Matrícula já esta em uso.');
				}
			}
			
		} catch (\Exception $ex) {
			throw $ex;
		}
	}
	
	public function save(){
		try {
			if(($this->objRhColaborador instanceof EntityRh\RhColaborador) && $this->objRhColaborador->getIdColaborador()){
				$this->entityDefault->merge($this->objRhColaborador);
			}elseif($this->objRhColaborador instanceof EntityRh\RhColaborador){
				$this->entityDefault->persist($this->objRhColaborador);
			}else{
				throw new \Exception('Erro::objRhColaborador não e uma instancia de "EntityRh\RhColaborador".');
			}
			$this->entityDefault->flush();
		} catch (\Exception $ex) {
			throw $ex;
		}
		return $this;
	}
}
