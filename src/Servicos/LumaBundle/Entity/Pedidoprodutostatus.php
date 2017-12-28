<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoprodutostatus
 */
class Pedidoprodutostatus
{
    /**
     * @var integer
     */
    private $pediprodstatCodigoid;

    /**
     * @var string
     */
    private $pediprodstatNome;

    /**
     * @var boolean
     */
    private $pediprodstatEditavel;

    /**
     * @var boolean
     */
    private $pediprodstatRemovivel;

    /**
     * @var boolean
     */
    private $pediprodstatSubstituivel;

    /**
     * @var boolean
     */
    private $pediprodstatVisivel;


    /**
     * Get pediprodstatCodigoid
     *
     * @return integer 
     */
    public function getPediprodstatCodigoid()
    {
        return $this->pediprodstatCodigoid;
    }

    /**
     * Set pediprodstatNome
     *
     * @param string $pediprodstatNome
     * @return Pedidoprodutostatus
     */
    public function setPediprodstatNome($pediprodstatNome)
    {
        $this->pediprodstatNome = $pediprodstatNome;

        return $this;
    }

    /**
     * Get pediprodstatNome
     *
     * @return string 
     */
    public function getPediprodstatNome()
    {
        return $this->pediprodstatNome;
    }

    /**
     * Set pediprodstatEditavel
     *
     * @param boolean $pediprodstatEditavel
     * @return Pedidoprodutostatus
     */
    public function setPediprodstatEditavel($pediprodstatEditavel)
    {
        $this->pediprodstatEditavel = $pediprodstatEditavel;

        return $this;
    }

    /**
     * Get pediprodstatEditavel
     *
     * @return boolean 
     */
    public function getPediprodstatEditavel()
    {
        return $this->pediprodstatEditavel;
    }

    /**
     * Set pediprodstatRemovivel
     *
     * @param boolean $pediprodstatRemovivel
     * @return Pedidoprodutostatus
     */
    public function setPediprodstatRemovivel($pediprodstatRemovivel)
    {
        $this->pediprodstatRemovivel = $pediprodstatRemovivel;

        return $this;
    }

    /**
     * Get pediprodstatRemovivel
     *
     * @return boolean 
     */
    public function getPediprodstatRemovivel()
    {
        return $this->pediprodstatRemovivel;
    }

    /**
     * Set pediprodstatSubstituivel
     *
     * @param boolean $pediprodstatSubstituivel
     * @return Pedidoprodutostatus
     */
    public function setPediprodstatSubstituivel($pediprodstatSubstituivel)
    {
        $this->pediprodstatSubstituivel = $pediprodstatSubstituivel;

        return $this;
    }

    /**
     * Get pediprodstatSubstituivel
     *
     * @return boolean 
     */
    public function getPediprodstatSubstituivel()
    {
        return $this->pediprodstatSubstituivel;
    }

    /**
     * Set pediprodstatVisivel
     *
     * @param boolean $pediprodstatVisivel
     * @return Pedidoprodutostatus
     */
    public function setPediprodstatVisivel($pediprodstatVisivel)
    {
        $this->pediprodstatVisivel = $pediprodstatVisivel;

        return $this;
    }

    /**
     * Get pediprodstatVisivel
     *
     * @return boolean 
     */
    public function getPediprodstatVisivel()
    {
        return $this->pediprodstatVisivel;
    }
}
