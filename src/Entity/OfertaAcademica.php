<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaAcademica
 *
 * @ORM\Table(name="oferta_academica", indexes={@ORM\Index(name="fk_oferta_academica_nivel_academico1_idx", columns={"id_nivel_academico"})})
 * @ORM\Entity
 */
class OfertaAcademica
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_oferta_academica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOfertaAcademica;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_oferta_academica", type="string", length=90, nullable=false)
     */
    private $nombreOfertaAcademica;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    /**
     * @var \NivelAcademico
     *
     * @ORM\ManyToOne(targetEntity="NivelAcademico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel_academico", referencedColumnName="id_nivel_academico")
     * })
     */
    private $idNivelAcademico;

    public function getIdOfertaAcademica(): ?int
    {
        return $this->idOfertaAcademica;
    }

    public function getNombreOfertaAcademica(): ?string
    {
        return $this->nombreOfertaAcademica;
    }

    public function setNombreOfertaAcademica(string $nombreOfertaAcademica): self
    {
        $this->nombreOfertaAcademica = $nombreOfertaAcademica;

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

    public function getIdNivelAcademico(): ?NivelAcademico
    {
        return $this->idNivelAcademico;
    }

    public function setIdNivelAcademico(?NivelAcademico $idNivelAcademico): self
    {
        $this->idNivelAcademico = $idNivelAcademico;

        return $this;
    }


}
