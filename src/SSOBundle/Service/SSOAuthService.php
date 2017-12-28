<?php

namespace SSOBundle\Service;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class SSOAuthService
{

	private $cookieName;
	private $request;
	private $autUsuarioRepository;

	public function __construct(Container $container)
	{
		$data = $container->getParameter('vogel_sso');
		$this->cookieName = $data['cookie_name'];
		//$this->autUsuarioRepository = $container->get('doctrine')
		//										->getRepository('ServicosGcdbBundle:AutUsuarios');
	}

	public function getAuthCookieValue() 
	{
		$request = $this->getRequest();
		return $request->cookies->get($this->cookieName, false);
	}

	private function getRequest()
	{
		if (empty($this->request)) {
			$this->request = Request::createFromGlobals();
		}
		return $this->request;
	}

	public function isLoggedIn()
	{
		if ( 
			$this->sessionIsStarted() && 
			isset($_SESSION['usr_codigoid']) && 
			!empty($_SESSION['usr_codigoid'])
		) {
			return true;
		}
		return false;
	}

	public function authenticate($userdata)
	{
		//$objAutUsuarios = $this->autUsuarioRepository->findOneBy(
		//							array('username' => $userdata['usuario'], 'ativo' => 1)
		//						);
		//if ($objAutUsuarios) {
			if (!$this->sessionIsStarted()) {
				session_start();
			}
			$_SESSION['grupos'] 	  = $userdata['grupos'];
			$_SESSION['usr_codigoid'] = $userdata['usr_codigoid'];
			$_SESSION['id_user'] 	  = $userdata['id_user'];
			$_SESSION['usuario'] 	  = $userdata['usuario'];
			$_SESSION['usr_nome'] 	  = $userdata['usr_nome'];
			$_SESSION['logado'] 	  = true;
			//$arrayRetorno = $this->montaMenu($objAutUsuarios);
			//$_SESSION['menu'] = $arrayRetorno['menu'];
			//$_SESSION['permissoes'] = $arrayRetorno['permissoes'];
			return true;
		//}
		//return false;
	}

	private function montaMenu($objAutUsuarios)
	{
		$permissoes = $objAutUsuarios->getAutPermissoes();
		$usuariosHasGrupos = $objAutUsuarios->getAutUsuariosHasGrupos();
		$arrayPermissoes = array();
		if ($permissoes->count()) {
			foreach ($permissoes as $objAutPermissoes) {
				if(array_key_exists($objAutPermissoes->getOpcoesId(), $arrayPermissoes)){
					if($objAutPermissoes->getPermissao() > $arrayPermissoes[$objAutPermissoes->getOpcoesId()]){
						$arrayPermissoes[$objAutPermissoes->getOpcoesId()] = $objAutPermissoes->getPermissao();
					}
				}elseif($objAutPermissoes->getOpcoesId()){
					$arrayPermissoes[$objAutPermissoes->getOpcoesId()] = $objAutPermissoes->getPermissao();
				}
			}
		}
		if ($usuariosHasGrupos->count()) {
			foreach ($usuariosHasGrupos as $usuarioHasGrupo){
				$autPermissoesGrupo = $usuarioHasGrupo->getAutGrupos()->getAutPermissoesGrupos();
				foreach ($autPermissoesGrupo as $objAutPermissoesGrupos) {
					if(array_key_exists($objAutPermissoesGrupos->getOpcoesId(), $arrayPermissoes)){
						if($objAutPermissoesGrupos->getPermissao() > $arrayPermissoes[$objAutPermissoesGrupos->getOpcoesId()]){
							$arrayPermissoes[$objAutPermissoesGrupos->getOpcoesId()] = $objAutPermissoesGrupos->getPermissao();
						}	
					}elseif($objAutPermissoesGrupos->getOpcoesId()){
						$arrayPermissoes[$objAutPermissoesGrupos->getOpcoesId()] = $objAutPermissoesGrupos->getPermissao();
					}
				}
			}
		}
		$arrayMenu = $this->readMenu($arrayPermissoes);
		return array('permissoes' => $arrayPermissoes, 'menu' => $arrayMenu);
	}

	public function readMenu($arrayPermissoes){
		$readSubMenu = NULL;
		$readSubMenu = function ($sub) use($arrayPermissoes, &$readSubMenu){
			$menu = array();
			$count = 0;
			foreach ($sub as $key => $value){
				$dependKids = FALSE;
				$subMenu = array();
				$subMenu['link_item'] 	= (isset($value['link']))? $value['link']: 'javascript:;';
				$subMenu['link_texto']	= (isset($value['text']))? utf8_decode($value['text']): '';
				if(isset($value['class'])){
					$subMenu['class'] = $value['class'];
				}
				if(isset($value['perm'])){
					$perms = $value['perm'];
					$reprovado = TRUE;
					if(is_string($perms) || is_numeric($perms)){
						if($perms === 'kids'){
							$dependKids = TRUE;
							$reprovado = FALSE;
						} else {
							$perms = explode('|', $perms);
							foreach($perms as $perm)
							{
								if(isset($arrayPermissoes[(int)$perm])){
									$reprovado = FALSE;
									break;
								}
							}
						}
					} elseif(is_array($perms)){
						foreach($perms as $perm => $nivel){
							if(!isset($arrayPermissoes[$perm])){
								continue;
							}
							$test = 0;
							switch (strtolower(substr($nivel, 0, 1))){
								case 'r':
								case 'l':
									$test |= 1;
									break;
								case 'i':
									$test |= 2;
									break;
								case 'e':
									$test |= 4;
									break;
								case 'd':
								case 'a':
									$test |= 8;
									break;
							}
							if($arrayPermissoes[$perm] & $test){
								$reprovado = FALSE;
								break;
							}
						}
					}
					if($reprovado){
						continue;
					}
				}

				if (isset($value['restrict_to_users']) && is_array($value['restrict_to_users'])) {
					if(!in_array($_SESSION['id_user'], $value['restrict_to_users'])){
						continue;
					}
				}

				if(isset($value['sub'])){//Find dependent
					$subMenu['sub'] = $readSubMenu($value['sub']);
					if(count($subMenu['sub'])){
						ksort($subMenu['sub']);
					} elseif($dependKids) {
						continue;
					}
				}
				if(isset($value['order'])){
					$order = $value['order'];
					$menu[$order][$key] = $subMenu;
				} else {
					$menu[$key] = $subMenu;
				}
			}
			return $menu;
		};
		$yaml = new \Symfony\Component\Yaml\Parser();
		$items = $yaml->parse(file_get_contents('/var/www/html/config/yaml/topMenu.yml'));
		return $readSubMenu($items['modules']);
	}

	private function sessionIsStarted()
	{
		$sessId = session_id();
		return !empty($sessId);
	}


}