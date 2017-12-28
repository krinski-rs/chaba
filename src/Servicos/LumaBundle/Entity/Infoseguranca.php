<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infoseguranca
 */
class Infoseguranca
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $usuario;

    /**
     * @var string
     */
    private $imagem;

    /**
     * @var string
     */
    private $tela;

    /**
     * @var string
     */
    private $liberacao;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $direciona;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return Infoseguranca
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return Infoseguranca
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string 
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set tela
     *
     * @param string $tela
     * @return Infoseguranca
     */
    public function setTela($tela)
    {
        $this->tela = $tela;

        return $this;
    }

    /**
     * Get tela
     *
     * @return string 
     */
    public function getTela()
    {
        return $this->tela;
    }

    /**
     * Set liberacao
     *
     * @param string $liberacao
     * @return Infoseguranca
     */
    public function setLiberacao($liberacao)
    {
        $this->liberacao = $liberacao;

        return $this;
    }

    /**
     * Get liberacao
     *
     * @return string 
     */
    public function getLiberacao()
    {
        return $this->liberacao;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Infoseguranca
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set direciona
     *
     * @param string $direciona
     * @return Infoseguranca
     */
    public function setDireciona($direciona)
    {
        $this->direciona = $direciona;

        return $this;
    }

    /**
     * Get direciona
     *
     * @return string 
     */
    public function getDireciona()
    {
        return $this->direciona;
    }
}
