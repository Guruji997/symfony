<?php

namespace App\Controller;

use App\Entity\UserCredentials;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewUserController extends AbstractController
{
    /**
     * @Route("/new/user", name="new_user")
     */
    public function createUser(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $user = new UserCredentials();
        $user->setName('Guru');
        $user->setEmail('gpmohanty@gmail.com');
        // test git
        $user->setPassword('isha@123');

        // tell Doctrine you want to (eventually) save the User (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('New user created with id '.$user->getId());
    }

    public function index()
    {
        var $fname;
        $femail,$fpassword;

        $user = new UserCredentials();
        $user->setName('Guru');
        $user->setEmail('gpmohanty@gmail.com');
        $user->setPassword('isha@123');
        
        return $this->render('new_user/index.html.twig', [
            'controller_name' => 'NewUserController',
            'name' => $fname,
            'email' => $femail,
            'password' => $fpassword
        ]);
    }
}
