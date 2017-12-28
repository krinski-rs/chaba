<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CircuitsCache
 *
 * @ORM\Table(name="troubleticket.circuits_cache")
 * @ORM\Entity
 */
class CircuitsCache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="final_client", type="string", length=255)
     */
    private $finalClient;

    /**
     * @var string
     *
     * @ORM\Column(name="uf_ponta_a", type="string", length=255)
     */
    private $ufPontaA;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="integer")
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="sla", type="string", length=255)
     */
    private $sla;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

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
     * Set designation
     *
     * @param string $designation
     * @return CircuitsCache
     */
    public function setDesignation($designation)
    {
        $this->designation = (string)$designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set finalClient
     *
     * @param string $finalClient
     * @return CircuitsCache
     */
    public function setFinalClient($finalClient)
    {
        $this->finalClient = (string)$finalClient;

        return $this;
    }

    /**
     * Get finalClient
     *
     * @return string
     */
    public function getFinalClient()
    {
        return $this->finalClient;
    }

    /**
     * Set ufPontaA
     *
     * @param string $ufPontaA
     * @return CircuitsCache
     */
    public function setUfPontaA($ufPontaA)
    {
        $this->ufPontaA = (string)$ufPontaA;

        return $this;
    }

    /**
     * Get ufPontaA
     *
     * @return string
     */
    public function getUfPontaA()
    {
        return $this->ufPontaA;
    }

    /**
     * Obtem o cliente relacionado
     *
     * @access public
     * @return ClientsCache
    */
    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($id)
    {
        $this->clientId = (int)$id;

        return $this;
    }

    /**
     * Set sla
     *
     * @param string $sla
     * @return CircuitsCache
     */
    public function setSla($sla)
    {
        $this->sla = (string)$sla;

        return $this;
    }

    /**
     * Get sla
     *
     * @return string
     */
    public function getSla()
    {
        return $this->sla;
    }

    /**
     * Set sla
     *
     * @param string $sla
     * @return CircuitsCache
     */
    public function setCity($city)
    {
        $this->city = (string)$city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}
