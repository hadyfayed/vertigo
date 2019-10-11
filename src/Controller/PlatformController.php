<?php

namespace App\Controller;

use App\Entity\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatformController extends AbstractController
{
    /**
     * @Route("/platform", name="platform_grid")
     */
    public function list(){
        $form = $this->createFormBuilder(null, ['csrf_protection' => true,'attr' => ['id' => 'create-platform-form']])
            ->add('name', TextType::class)
            ->add('host', TextType::class)
            ->add('port', TextType::class)
            ->add('database', TextType::class)
            ->add('username', TextType::class)
            ->add('password', TextType::class)
            ->getForm();
        $entityManager = $this->getDoctrine()->getManager();
        $platform = $entityManager->getRepository(Platform::class)->findAll();
        return $this->render('platform_grid.html.twig', ['form' => $form->createView(), 'platforms' => $platform]);
    }

    /**
     * @Route("/platform/show/{id}", name="platform_show")
     */
    public function show(int $id){
        $entityManager = $this->getDoctrine()->getManager();
        $platform = $entityManager->getRepository(Platform::class)->find($id);
        return $this->render('platform_show.html.twig', ['platform' => $platform]);
    }


    /**
     * @Route("/platform/create", name="platform_create", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function createPlatform(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $data = $request->request->get('form');
        $platform = new Platform();
        $platform->setName($data['name']);
        $platform->setHost($data['host']);
        $platform->setPort($data['port']);
        $platform->setDbName($data['database']);
        $platform->setDbUsername($data['username']);
        $platform->setDbPassword($data['password']);

        $entityManager->persist($platform);
        $entityManager->flush();
        return new Response('Platform Created with id'.$platform->getId(), Response::HTTP_OK);
    }
}
