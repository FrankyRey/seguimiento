<?php

namespace App\Form;

use App\Entity\Preinscripcion;
use App\Entity\NivelAcademico;
use App\Entity\OfertaAcademica;
use App\Entity\NivelUdal;
use App\Entity\Medio;
use App\Entity\Empresa;
use App\Entity\OfertaUdal;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PreinscripcionType extends AbstractType
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno')
            ->add('nacionalidad', ChoiceType::class, [
                'choices' => [
                    'Mexicana' => 'Mexicana',
                    'Extranjera' => 'Extranjera'
                ],
                'placeholder' => '--Seleccione--',
            ])
            ->add('curpIdentidad')
            ->add('sexo', ChoiceType::class, [
                'choices' => [
                    'Masculino' => 'M',
                    'Femenino' => 'F'
                ],
                'placeholder' => '--Seleccione--',
            ])
            ->add('fechaNacimiento', DateType::class, [
                'widget' => 'single_text',

                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => false,
                'empty_data' => '-',

                // adds a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'datepicker-here',
                    'data-language' => 'es',
                    'data-date-format' => 'yyyy-mm-dd',
                    'data-auto-close' => 'true',
                ],
            ])
            ->add('edad')
            ->add('paisNacimiento')
            ->add('lugarNacimiento')
            ->add('correoElectronico')
            ->add('paisActual')
            ->add('estadoProvinciaActual')
            ->add('direccionActual')
            ->add('colonia')
            ->add('codigoPostal')
            ->add('telefonoFijo')
            ->add('telefonoMovil')
            ->add('ocupacion')
            ->add('empresaLabora')
            ->add('egresadoUdal')
            ->add('nombreResponsable')
            ->add('apellidoPaternoResponsable')
            ->add('apellidoMaternoResponsable')
            ->add('correoElectronicoResponsable')
            ->add('telefonoFijoResponsable')
            ->add('telefonoMovilResponsable')
            ->add('parentesco')
            ->add('idEmpresa', EntityType::class, [
                'required' => false,
                'placeholder' => '--Seleccione--',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('e')
                    ->where('e.estatus = :estatus')
                    ->setParameter('estatus', 'A');
                },
                'class' => Empresa::class,
                'choice_label' => 'nombreEmpresa'
            ])
            ->add('idMedio', EntityType::class, [
                'placeholder' => '--Seleccione--',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                    ->where('m.estatus = :estatus')
                    ->setParameter('estatus', 'A');
                },
                'class' => Medio::class,
                'choice_label' => 'nombreMedio'
            ])
            ->add('idNivelAcademico', EntityType::class, [
                'placeholder' => '--Seleccione--',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                    ->where('n.estatus = :estatus')
                    ->setParameter('estatus', 'A');
                },
                'class' => NivelAcademico::class,
                'choice_label' => 'nombreNivelAcademico'
            ])
            ->add('idNivelUdal', EntityType::class, [
                'placeholder' => '--Seleccione--',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                    ->where('n.estatus = :estatus')
                    ->setParameter('estatus', 'A');
                },
                'class' => NivelUdal::class,
                'choice_label' => 'nombreNivelUdal',
                'required' => false,
            ])
        ;

        $formModifier = function (FormInterface $form, NivelAcademico $nivelAcademico = null) {            

            $ofertaAcademica = null === $nivelAcademico ? [] : $result = $this->em
                ->getRepository(OfertaAcademica::class)
                ->findBy([
                    'idNivelAcademico' => $nivelAcademico->getIdNivelAcademico()
                ]);

            $form->add('idOfertaAcademica', EntityType::class, [
                'class' => OfertaAcademica::class,
                'placeholder' => '--Seleccione--',
                'choice_label' => 'nombreOfertaAcademica',
                'choices' => $ofertaAcademica,
            ]);
        };

        $formModifierUdal = function (FormInterface $form, NivelUdal $nivelUdal = null) {            

            $ofertaUdal = null === $nivelUdal ? [] : $result = $this->em
                ->getRepository(ofertaUdal::class)
                ->findBy([
                    'idNivelUdal' => $nivelUdal->getIdNivelUdal()
                ]);

            $form->add('idOfertaUdal', EntityType::class, [
                'class' => OfertaUdal::class,
                'placeholder' => '--Seleccione--',
                'choice_label' => 'nombreOfertaUdal',
                'choices' => $ofertaUdal,
                'required' => false
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier, $formModifierUdal) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getIdNivelAcademico());
                $formModifierUdal($event->getForm(), $data->getIdNivelUdal());
            }
        );

        $builder->get('idNivelAcademico')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {

                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $nivelAcademico = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $nivelAcademico);
 
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                /*$data = $event->getData();

                if(isset($data['idNivelAcademico'])) {
                    $nivelAcademico = $this->em
                        ->getRepository(NivelAcademico::class)
                        ->findOneBy([
                            'idNivelAcademico' => $data['idNivelAcademico']
                    ]);

                    $formModifier($event->getForm()->getParent(), $nivelAcademico);
                }
                else {
                    if(isset($data['idNivelAcademico'])) {
                        $nivelUdal = $this->em
                            ->getRepository(NivelUdal::class)
                            ->findOneBy([
                                'idNivelUdal' => $data['idNivelAcademico']
                        ]);

                    $formModifierUdal($event->getForm()->getParent(), $nivelUdal);
                    }
                }*/
            }
        );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Preinscripcion::class,
        ]);
    }
}
