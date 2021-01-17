<?php


namespace App\Controller\Forms;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompteController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /*public function creationFormulaireCompte():Form{
        //recup d'un constructeur de formulaire
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('nom',TextType::class);
        $formBuilder->add('prenom',TextType::class);
        $formBuilder->add('dateNaissance',DateType::class);
        $formBuilder->add('login',TextType::class);
        $formBuilder->add('password',PasswordType::class);
        $formBuilder->add('submit',SubmitType::class);
        //recup du formulaire
        $form2 = $formBuilder->getForm();
        return $form2;
    }*/

    public function creationCompteForm(Request $request): Response
    {
        //$form=$this->creationFormulaireCompte();
        $form = $this->createForm(UserFormType::class);
        $form->handleRequest($request);
        //verif si soumis et valide
        if($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $login = $data['login'];
            $password = $data['password'];
            $nom= $data['nom'];
            $prenom= $data['prenom'];
            $dateN= $data['dateN'];
            $returnMessage="Création réussie !";
            return $this->render('creation_result.html.twig', ['message' => $returnMessage]);
        }

        $formView = $form->createView();
        return $this->render('creation.html.twig',['form'=>$formView]);
    }


}