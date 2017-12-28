<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade de mapeamento da configuração para a rotina de análise de problemas
 * 
 * Exemplo de uso:
 *      $configs = new Config;
 *      $configs->setName($name);
 *      $configs->setValue($value);
 * 
 * @ORM\Entity
 * @ORM\Table(name="troubleticket.configs")
 */
class Configs
{
    /**
     * Nome que define a configuração
     * 
     * @var string
     * @access protected
     * 
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    protected $name;

    /**
     * Valor referente a configuração
     * 
     * @var string
     * @access protected
     * 
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * Retorna o nome a configuração
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Retorna o valor da configuração
     *
     * @access public
     * @return mixed
     */
    public function getValue()
    {
        $value = $this->value;
        return $this->castValue($value);
    }

    /**
     * Define o valor da configuração
     * 
     * É obrigatório definir um nome antes de definir o valor
     *
     * @param mixed $value
     * @access public
     * @return $this
     */
    public function setValue($value)
    {
        if (!$this->getName()) {
            throw new \Exception('Valores somente podem ser setados para configurações com nome já definido');
        }

        $this->value = $this->castValue($value);

        return $this;
    }

    /**
     * Retorna o valor com o tipo conforme o nome da configuração
     *
     * @param mixed $value
     * @access protected
     * @return mixed
     */
    protected function castValue($value)
    {
        $name = $this->getName();
        switch($name) {
            case 'interval_days':
            case 'reports_amount':
                $value = (int)$value;
                break;
        }

        return $value;
    }
}
