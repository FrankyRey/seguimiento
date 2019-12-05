<?php

namespace App\Controller;

use App\Entity\Preinscripcion;
use App\Form\PreinscripcionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Exception\ServerException;

/**
 * @Route("/preinscripcion")
 */
class PreinscripcionController extends AbstractController
{
    /**
     * @Route("/", name="preinscripcion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $preinscripcions = $this->getDoctrine()
            ->getRepository(Preinscripcion::class)
            ->findAll();

        return $this->render('preinscripcion/index.html.twig', [
            'preinscripcions' => $preinscripcions,
        ]);
    }

    /**
     * @Route("/new", name="preinscripcion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $preinscripcion = new Preinscripcion();
        $form = $this->createForm(PreinscripcionType::class, $preinscripcion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($preinscripcion);

            try {
                
                $entityManager->flush();

                return $this->redirectToRoute('preinscripcion_index');
            }
            catch (ServerException $e) {
                
                if($e->getSQLState() == '23000')
                    $mensaje = 'El correo electrónico ya se encuentra registrado';

                return $this->render('preinscripcion/new.html.twig', [
                    'preinscripcion' => $preinscripcion,
                    'form' => $form->createView(),
                    'mensaje' => $mensaje
                ]);
            }
        }

        return $this->render('preinscripcion/new.html.twig', [
            'preinscripcion' => $preinscripcion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPreinscripcion}", name="preinscripcion_show", methods={"GET"})
     */
    public function show(Preinscripcion $preinscripcion): Response
    {
        return $this->render('preinscripcion/show.html.twig', [
            'preinscripcion' => $preinscripcion,
        ]);
    }

    /**
     * @Route("/{idPreinscripcion}/edit", name="preinscripcion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Preinscripcion $preinscripcion): Response
    {
        $form = $this->createForm(PreinscripcionType::class, $preinscripcion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('preinscripcion_index');
        }

        return $this->render('preinscripcion/edit.html.twig', [
            'preinscripcion' => $preinscripcion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPreinscripcion}", name="preinscripcion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Preinscripcion $preinscripcion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$preinscripcion->getIdPreinscripcion(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($preinscripcion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('preinscripcion_index');
    }
}
