<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersAtividades
 */
class CadUsersAtividades
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idAtividadesecundaria;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var \Servicos\GcdbBundle\Entity\AtividadesPrimarias
     */
    private $idAtividade;


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
     * Set idAtividadesecundaria
     *
     * @param integer $idAtividadesecundaria
     * @return CadUsersAtividades
     */
    public function setIdAtividadesecundaria($idAtividadesecundaria)
    {
        $this->idAtividadesecundaria = $idAtividadesecundaria;

        return $this;
    }

    /**
     * Get idAtividadesecundaria
     *
     * @return integer 
     */
    public function getIdAtividadesecundaria()
    {
        return $this->idAtividadesecundaria;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return CadUsersAtividades
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idAtividade
     *
     * @param \Servicos\GcdbBundle\Entity\AtividadesPrimarias $idAtividade
     * @return CadUsersAtividades
     */
    public function setIdAtividade(\Servicos\GcdbBundle\Entity\AtividadesPrimarias $idAtividade = null)
    {
        $this->idAtividade = $idAtividade;

        return $this;
    }

    /**
     * Get idAtividade
     *
     * @return \Servicos\GcdbBundle\Entity\AtividadesPrimarias 
     */
    public function getIdAtividade()
    {
        return $this->idAtividade;
    }
}
