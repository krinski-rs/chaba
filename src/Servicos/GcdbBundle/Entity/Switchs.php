<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Switchs
 */
class Switchs
{
    /**
     * @var integer
     */
    private $idswitch;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $pop;

    /**
     * @var string
     */
    private $localizacao;

    /**
     * @var string
     */
    private $ipadmin;

    /**
     * @var string
     */
    private $vlanadmin;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $senha;


    /**
     * Get idswitch
     *
     * @return integer 
     */
    public function getIdswitch()
    {
        return $this->idswitch;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Switchs
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set pop
     *
     * @param string $pop
     * @return Switchs
     */
    public function setPop($pop)
    {
        $this->pop = $pop;

        return $this;
    }

    /**
     * Get pop
     *
     * @return string 
     */
    public function getPop()
    {
        return $this->pop;
    }

    /**
     * Set localizacao
     *
     * @param string $localizacao
     * @return Switchs
     */
    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;

        return $this;
    }

    /**
     * Get localizacao
     *
     * @return string 
     */
    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    /**
     * Set ipadmin
     *
     * @param string $ipadmin
     * @return Switchs
     */
    public function setIpadmin($ipadmin)
    {
        $this->ipadmin = $ipadmin;

        return $this;
    }

    /**
     * Get ipadmin
     *
     * @return string 
     */
    public function getIpadmin()
    {
        return $this->ipadmin;
    }

    /**
     * Set vlanadmin
     *
     * @param string $vlanadmin
     * @return Switchs
     */
    public function setVlanadmin($vlanadmin)
    {
        $this->vlanadmin = $vlanadmin;

        return $this;
    }

    /**
     * Get vlanadmin
     *
     * @return string 
     */
    public function getVlanadmin()
    {
        return $this->vlanadmin;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Switchs
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Switchs
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Switchs
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }
}
