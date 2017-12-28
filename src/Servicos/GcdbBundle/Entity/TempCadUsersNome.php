<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadUsersNome
 */
class TempCadUsersNome
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadUsersId;

    /**
     * @var integer
     */
    private $admTipoNomeId;

    /**
     * @var string
     */
    private $nome;


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
     * Set cadUsersId
     *
     * @param integer $cadUsersId
     * @return TempCadUsersNome
     */
    public function setCadUsersId($cadUsersId)
    {
        $this->cadUsersId = $cadUsersId;

        return $this;
    }

    /**
     * Get cadUsersId
     *
     * @return integer 
     */
    public function getCadUsersId()
    {
        return $this->cadUsersId;
    }

    /**
     * Set admTipoNomeId
     *
     * @param integer $admTipoNomeId
     * @return TempCadUsersNome
     */
    public function setAdmTipoNomeId($admTipoNomeId)
    {
        $this->admTipoNomeId = $admTipoNomeId;

        return $this;
    }

    /**
     * Get admTipoNomeId
     *
     * @return integer 
     */
    public function getAdmTipoNomeId()
    {
        return $this->admTipoNomeId;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return TempCadUsersNome
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
}
