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

    public function creationFormulaireCompte():Form{
        //recup d'un constructeur de formulaire
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('Nom',TextType::class);
        $formBuilder->add('Prenom',TextType::class);
        $formBuilder->add('DateNaissance',DateType::class);
        $formBuilder->add('Login',TextType::class);
        $formBuilder->add('Password',PasswordType::class);
        $formBuilder->add('submit',SubmitType::class);
        //recup du formulaire
        $form = $formBuilder->getForm();
        return $form;
    }

    public function creationCompteForm():Response{
        $form=$this->creationFormulaireCompte();
        $formView= $form->createView();
        return $this->render('creation.html.twig',['form'=>$formView]);
    }
    public function creationPost(Request $request):Response{
        $form=$this->creationFormulaireCompte();
        $form->handleRequest($request);

        $correct = true;

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $nom = $data['Nom'];
            $login = $data['login'];
            $password = $data['password'];

        }
        if ($correct)
            $returnMessage = "Création réussie !";
        else
            $returnMessage = 'Désolé, veuillez réessayer !';

        return $this->render('creation_result.html.twig',['message'=>$returnMessage]);
    }
}