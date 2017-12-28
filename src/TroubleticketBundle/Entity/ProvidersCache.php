<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProvidersCache
 *
 * @ORM\Table(name="troubleticket.providers_cache")
 * @ORM\Entity
 */
class ProvidersCache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cnpj", type="integer", length=255)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_fantasia", type="string", length=255)
     */
    private $nomeFantasia;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=255)
     */
    private $razaoSocial;

    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

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
     * Set cnpj
     *
     * @param string $cnpj
     * @return ProvidersCache
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = (string)$cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set nomeFantasia
     *
     * @param string $nomeFantasia
     * @return ProvidersCache
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = (string)$nomeFantasia;

        return $this;
    }

    /**
     * Get nomeFantasia
     *
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     * @return ProvidersCache
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = (string)$razaoSocial;

        return $this;
    }

    /**
     * Get razaoSocial
     *
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
}
