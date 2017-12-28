<?php

namespace TroubleticketBundle\Twig;

use TroubleticketBundle\Service;

/**
 * Classe para permitir o acesso a permissões através do Twig
 */
class PermissionsExtension extends \Twig_Extension
{

    /**
     * Serviço de permissões
     *
     * @var Service\Permissions
     * @access protected
     */
    protected $permissions;

    /**
     * Construtor
     *
     * @param Service\Permissions $permissions
     * @access public
     */
    public function __construct(Service\Permissions $permissions)
    {
        $this->setPermissionsService($permissions);
    }

    /**
     * Define o objeto do serviço de permissões
     *
     * @param Service\Permissions $permissions
     * @access public
     * @return $this
     */
    public function setPermissionsService(Service\Permissions $permissions)
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * Obtem o serviço de permissões
     *
     * @access public
     * @return Service\Permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'permissions';
    }

    /**
     * Verifica se o usuário logado possui permissão para executar determinada ações sobre determinado recurso
     *
     * @param string $resource
     * @param string $action
     * @access public
     * @return bool
     */
    public function isAllowed($resource, $action)
    {
        return $this->getPermissions()->isAllowed($resource, $action);
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('isAllowed', array($this, 'isAllowed')),
        );
    }

}
