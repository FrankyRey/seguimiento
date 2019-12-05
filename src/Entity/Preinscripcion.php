<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preinscripcion
 *
 * @ORM\Table(name="preinscripcion", uniqueConstraints={@ORM\UniqueConstraint(name="correo", columns={"correo_electronico"})}, indexes={@ORM\Index(name="fk_preincripcion_nivel_academico_idx", columns={"id_nivel_academico"}), @ORM\Index(name="fk_preincripcion_nivel_udal1_idx", columns={"id_nivel_udal"}), @ORM\Index(name="fk_preincripcion_medio1_idx", columns={"id_medio"}), @ORM\Index(name="fk_preinscripcion_empresa1_idx", columns={"id_empresa"}), @ORM\Index(name="fk_preincripcion_oferta_academica1_idx", columns={"id_oferta_academica"}), @ORM\Index(name="fk_preincripcion_oferta_udal1_idx", columns={"id_oferta_udal"})})
 * @ORM\Entity
 */
class Preinscripcion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_preinscripcion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPreinscripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_paterno", type="string", length=60, nullable=false)
     */
    private $apellidoPaterno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido_materno", type="string", length=60, nullable=true)
     */
    private $apellidoMaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=15, nullable=false)
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="curp_identidad", type="string", length=30, nullable=false)
     */
    private $curpIdentidad;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="pais_nacimiento", type="string", length=200, nullable=false)
     */
    private $paisNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lugar_nacimiento", type="string", length=200, nullable=true)
     */
    private $lugarNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=200, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="pais_actual", type="string", length=200, nullable=false)
     */
    private $paisActual;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_provincia_actual", type="string", length=200, nullable=false)
     */
    private $estadoProvinciaActual;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_actual", type="string", length=300, nullable=false)
     */
    private $direccionActual;

    /**
     * @var string|null
     *
     * @ORM\Column(name="colonia", type="string", length=200, nullable=true)
     */
    private $colonia;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_postal", type="string", length=20, nullable=false)
     */
    private $codigoPostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_fijo", type="string", length=15, nullable=true)
     */
    private $telefonoFijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_movil", type="string", length=15, nullable=false)
     */
    private $telefonoMovil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocupacion", type="string", length=70, nullable=true)
     */
    private $ocupacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="empresa_labora", type="string", length=200, nullable=true)
     */
    private $empresaLabora;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="egresado_udal", type="boolean", nullable=true)
     */
    private $egresadoUdal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_responsable", type="string", length=60, nullable=true)
     */
    private $nombreResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido_paterno_responsable", type="string", length=60, nullable=true)
     */
    private $apellidoPaternoResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido_materno_responsable", type="string", length=60, nullable=true)
     */
    private $apellidoMaternoResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo_electronico_responsable", type="string", length=200, nullable=true)
     */
    private $correoElectronicoResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_fijo_responsable", type="string", length=15, nullable=true)
     */
    private $telefonoFijoResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_movil_responsable", type="string", length=15, nullable=true)
     */
    private $telefonoMovilResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parentesco", type="string", length=45, nullable=true)
     */
    private $parentesco;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $fechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    /**
     * @var \Medio
     *
     * @ORM\ManyToOne(targetEntity="Medio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_medio", referencedColumnName="id_medio")
     * })
     */
    private $idMedio;

    /**
     * @var \NivelAcademico
     *
     * @ORM\ManyToOne(targetEntity="NivelAcademico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel_academico", referencedColumnName="id_nivel_academico")
     * })
     */
    private $idNivelAcademico;

    /**
     * @var \NivelUdal
     *
     * @ORM\ManyToOne(targetEntity="NivelUdal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel_udal", referencedColumnName="id_nivel_udal")
     * })
     */
    private $idNivelUdal;

    /**
     * @var \OfertaAcademica
     *
     * @ORM\ManyToOne(targetEntity="OfertaAcademica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oferta_academica", referencedColumnName="id_oferta_academica")
     * })
     */
    private $idOfertaAcademica;

    /**
     * @var \OfertaUdal
     *
     * @ORM\ManyToOne(targetEntity="OfertaUdal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oferta_udal", referencedColumnName="id_oferta_udal")
     * })
     */
    private $idOfertaUdal;

    /**
     * @var \Empresa
     *
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empresa", referencedColumnName="id_empresa")
     * })
     */
    private $idEmpresa;

    public function __construct()
    {
        $this->setFechaRegistro(new \DateTime());
    }

    public function getIdPreinscripcion(): ?int
    {
        return $this->idPreinscripcion;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidoPaterno(): ?string
    {
        return $this->apellidoPaterno;
    }

    public function setApellidoPaterno(string $apellidoPaterno): self
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    public function getApellidoMaterno(): ?string
    {
        return $this->apellidoMaterno;
    }

    public function setApellidoMaterno(?string $apellidoMaterno): self
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(string $nacionalidad): self
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    public function getCurpIdentidad(): ?string
    {
        return $this->curpIdentidad;
    }

    public function setCurpIdentidad(string $curpIdentidad): self
    {
        $this->curpIdentidad = $curpIdentidad;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getPaisNacimiento(): ?string
    {
        return $this->paisNacimiento;
    }

    public function setPaisNacimiento(string $paisNacimiento): self
    {
        $this->paisNacimiento = $paisNacimiento;

        return $this;
    }

    public function getLugarNacimiento(): ?string
    {
        return $this->lugarNacimiento;
    }

    public function setLugarNacimiento(?string $lugarNacimiento): self
    {
        $this->lugarNacimiento = $lugarNacimiento;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico(string $correoElectronico): self
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    public function getPaisActual(): ?string
    {
        return $this->paisActual;
    }

    public function setPaisActual(string $paisActual): self
    {
        $this->paisActual = $paisActual;

        return $this;
    }

    public function getEstadoProvinciaActual(): ?string
    {
        return $this->estadoProvinciaActual;
    }

    public function setEstadoProvinciaActual(string $estadoProvinciaActual): self
    {
        $this->estadoProvinciaActual = $estadoProvinciaActual;

        return $this;
    }

    public function getDireccionActual(): ?string
    {
        return $this->direccionActual;
    }

    public function setDireccionActual(string $direccionActual): self
    {
        $this->direccionActual = $direccionActual;

        return $this;
    }

    public function getColonia(): ?string
    {
        return $this->colonia;
    }

    public function setColonia(?string $colonia): self
    {
        $this->colonia = $colonia;

        return $this;
    }

    public function getCodigoPostal(): ?string
    {
        return $this->codigoPostal;
    }

    public function setCodigoPostal(string $codigoPostal): self
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    public function getTelefonoFijo(): ?string
    {
        return $this->telefonoFijo;
    }

    public function setTelefonoFijo(?string $telefonoFijo): self
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    public function getTelefonoMovil(): ?string
    {
        return $this->telefonoMovil;
    }

    public function setTelefonoMovil(string $telefonoMovil): self
    {
        $this->telefonoMovil = $telefonoMovil;

        return $this;
    }

    public function getOcupacion(): ?string
    {
        return $this->ocupacion;
    }

    public function setOcupacion(?string $ocupacion): self
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    public function getEmpresaLabora(): ?string
    {
        return $this->empresaLabora;
    }

    public function setEmpresaLabora(?string $empresaLabora): self
    {
        $this->empresaLabora = $empresaLabora;

        return $this;
    }

    public function getEgresadoUdal(): ?bool
    {
        return $this->egresadoUdal;
    }

    public function setEgresadoUdal(?bool $egresadoUdal): self
    {
        $this->egresadoUdal = $egresadoUdal;

        return $this;
    }

    public function getNombreResponsable(): ?string
    {
        return $this->nombreResponsable;
    }

    public function setNombreResponsable(?string $nombreResponsable): self
    {
        $this->nombreResponsable = $nombreResponsable;

        return $this;
    }

    public function getApellidoPaternoResponsable(): ?string
    {
        return $this->apellidoPaternoResponsable;
    }

    public function setApellidoPaternoResponsable(?string $apellidoPaternoResponsable): self
    {
        $this->apellidoPaternoResponsable = $apellidoPaternoResponsable;

        return $this;
    }

    public function getApellidoMaternoResponsable(): ?string
    {
        return $this->apellidoMaternoResponsable;
    }

    public function setApellidoMaternoResponsable(?string $apellidoMaternoResponsable): self
    {
        $this->apellidoMaternoResponsable = $apellidoMaternoResponsable;

        return $this;
    }

    public function getCorreoElectronicoResponsable(): ?string
    {
        return $this->correoElectronicoResponsable;
    }

    public function setCorreoElectronicoResponsable(?string $correoElectronicoResponsable): self
    {
        $this->correoElectronicoResponsable = $correoElectronicoResponsable;

        return $this;
    }

    public function getTelefonoFijoResponsable(): ?string
    {
        return $this->telefonoFijoResponsable;
    }

    public function setTelefonoFijoResponsable(?string $telefonoFijoResponsable): self
    {
        $this->telefonoFijoResponsable = $telefonoFijoResponsable;

        return $this;
    }

    public function getTelefonoMovilResponsable(): ?string
    {
        return $this->telefonoMovilResponsable;
    }

    public function setTelefonoMovilResponsable(?string $telefonoMovilResponsable): self
    {
        $this->telefonoMovilResponsable = $telefonoMovilResponsable;

        return $this;
    }

    public function getParentesco(): ?string
    {
        return $this->parentesco;
    }

    public function setParentesco(?string $parentesco): self
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

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

    public function getIdMedio(): ?Medio
    {
        return $this->idMedio;
    }

    public function setIdMedio(?Medio $idMedio): self
    {
        $this->idMedio = $idMedio;

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

    public function getIdNivelUdal(): ?NivelUdal
    {
        return $this->idNivelUdal;
    }

    public function setIdNivelUdal(?NivelUdal $idNivelUdal): self
    {
        $this->idNivelUdal = $idNivelUdal;

        return $this;
    }

    public function getIdOfertaAcademica(): ?OfertaAcademica
    {
        return $this->idOfertaAcademica;
    }

    public function setIdOfertaAcademica(?OfertaAcademica $idOfertaAcademica): self
    {
        $this->idOfertaAcademica = $idOfertaAcademica;

        return $this;
    }

    public function getIdOfertaUdal(): ?OfertaUdal
    {
        return $this->idOfertaUdal;
    }

    public function setIdOfertaUdal(?OfertaUdal $idOfertaUdal): self
    {
        $this->idOfertaUdal = $idOfertaUdal;

        return $this;
    }

    public function getIdEmpresa(): ?Empresa
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa(?Empresa $idEmpresa): self
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }


}
