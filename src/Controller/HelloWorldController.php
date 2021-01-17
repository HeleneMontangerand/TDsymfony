<?php


namespace App\Controller;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    //affichage "Hello world!" sans template
    function helloWorld(){
        $message = "Hello world !";
        return new Response($message);
    }

    //affichage sans template
    /*function hello($prenom):Response{
        $message = "Hello $prenom";
        return new Response($message);
    }*/

    //affichage avec template syntaxe 1
    /*function hello($prenom){
        return $this->render('hello.html.twig',['prenom'=>$prenom]);
    }*/

    //affichage avec template syntaxe 2 objet Response
    function hello($prenom):Response{
        return $this->render('hello.html.twig',['prenom'=>$prenom]);
    }

    //affichage d'un formulaire
    /**
     * @return Response
     */
    function form():Response{
        return new Response(
            "<html><body>
        <form method='post'>
        Nom:<input name='name'/>
        <input type = 'submit'/>
        </form>
        </body>
        </html>");
    }
    /**
     * @param Request $request
     * @return Response
     */
    function formReceive(Request $request):Response{
        $formData = $request->request->get('name');
        return new Response("Merci $formData");
    }


    //affichage liste donnee dans le template
    function liste():Response{
        return $this->render('liste.html.twig');
    }

    //affichage liste declaree avant transmission au template
    function liste2():Response{
        $liste = ['Bernard','Jean','Daniel','Patrick'];
        return $this->render('liste2.html.twig',['liste'=>$liste]);
    }
}