<?php

namespace App\Controller;

use App\Entity\Cake;
use App\Entity\Ingredient;
use App\Repository\CakeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CakeController extends AbstractController
{


    /**
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createCake(EntityManagerInterface $entityManager): Response
    {
        $cake = new Cake();
        $cake->setName('fondant');
        $cake->setIsSweet(true);
        $entityManager->persist($cake);
        $entityManager->flush();
        return new Response('New cake saved with id '.$cake->getId());
    }
    public function getById(int $id,CakeRepository $cakeRepository):Response{
        $cake = $cakeRepository->find($id);
        return new Response('Cake with id '.$cake->getId().' is '.$cake->getName());
    }
    public function deleteById(int $id,CakeRepository $cakeRepository,EntityManagerInterface $entityManager):Response{
        $cakeRepository->remove($id);
        $entityManager->flush();
        return new Response('Cake with id '.$id.' is deleted');
    }
}
