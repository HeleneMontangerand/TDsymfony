<?php


namespace App\Controller\Forms;


use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private $accounts = [['login'=>'admin','password'=>'Azerty123456!'],['login'=>'user','password'=>'987654uioP!']];

    //remplacee par la creation d une classe LoginFormType
    /*private function creationFormulaire():Form{
        //recup d'un constructeur de formulaire
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('login',TextType::class);
        $formBuilder->add('password',PasswordType::class);
        $formBuilder->add('submit',SubmitType::class);
        //recup du formulaire
        $form = $formBuilder->getForm();
        return $form;
    }*/

    public function loginForm(Request $request):Response{
        //$form=$this->creationFormulaire();//si utilisation fonction
        $form=$this->createForm(LoginFormType::class);
        $form->handleRequest($request);
        //verif si soumis et valide
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $login = $data['login'];
            $password = $data['password'];

            //return $this->redirectToRoute('hello');
            return $this->redirectToRoute('hello',['prenom'=>$data['login']]);
        }
        //sinon s'il est soumis et non valide
        else if($form->isSubmitted()){
            $message='Login ou mot de passe mal formé';
        }
        $formView = $form->createView();
        return $this->render('login.html.twig',['form'=>$formView]);
    }

    public function loginPost(Request $request):Response{
        //$form=$this->creationFormulaire();
        $form=$this->createForm(LoginFormType::class);
        $form->handleRequest($request);
        $correct=false;

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $login = $data['login'];
            $password = $data['password'];

            $returnMessage = "Bienvenue $login!";
        }else{
            $returnMessage = 'Désolé, veuillez réessayer !';
        }
        return $this->render('login_result.html.twig',['message'=>$returnMessage]);
    }
}