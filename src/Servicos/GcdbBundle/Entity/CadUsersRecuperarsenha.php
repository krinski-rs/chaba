<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersRecuperarsenha
 */
class CadUsersRecuperarsenha
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataValidade;

    /**
     * @var string
     */
    private $confirmacao;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $caduserid;


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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return CadUsersRecuperarsenha
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set dataValidade
     *
     * @param \DateTime $dataValidade
     * @return CadUsersRecuperarsenha
     */
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get dataValidade
     *
     * @return \DateTime 
     */
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * Set confirmacao
     *
     * @param string $confirmacao
     * @return CadUsersRecuperarsenha
     */
    public function setConfirmacao($confirmacao)
    {
        $this->confirmacao = $confirmacao;

        return $this;
    }

    /**
     * Get confirmacao
     *
     * @return string 
     */
    public function getConfirmacao()
    {
        return $this->confirmacao;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CadUsersRecuperarsenha
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set caduserid
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $caduserid
     * @return CadUsersRecuperarsenha
     */
    public function setCaduserid(\Servicos\GcdbBundle\Entity\CadUsers $caduserid = null)
    {
        $this->caduserid = $caduserid;

        return $this;
    }

    /**
     * Get caduserid
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCaduserid()
    {
        return $this->caduserid;
    }
}
