<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_empresa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_empresa", type="string", length=180, nullable=false)
     */
    private $nombreEmpresa;

    /**
     * @var bool
     *
     * @ORM\Column(name="convenio", type="boolean", nullable=false)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentaje", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $porcentaje;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    public function getIdEmpresa(): ?int
    {
        return $this->idEmpresa;
    }

    public function getNombreEmpresa(): ?string
    {
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa(string $nombreEmpresa): self
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    public function getConvenio(): ?bool
    {
        return $this->convenio;
    }

    public function setConvenio(bool $convenio): self
    {
        $this->convenio = $convenio;

        return $this;
    }

    public function getPorcentaje(): ?string
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(string $porcentaje): self
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    public function getEstatus(): ?string
    {
        return $this->estatus;
    }

    public function setEstatus(string $estatus): self
    {
        $this->estatus = $estatus;

        return $this;
    }


}
