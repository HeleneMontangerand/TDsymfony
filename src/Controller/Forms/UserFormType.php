<?php


namespace App\Controller\Forms;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserFormType extends \Symfony\Component\Form\AbstractType
{
    public  function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class,['constraints'=>new Length(null,3,20)]);
        $builder->add('prenom',TextType::class,['constraints'=>new Length(null,3,20)]);
        $builder->add('dateN',DateType::class);
        $builder->add('login',TextType::class,['constraints'=>new Length(null,3,20)]);
        $builder->add('password',PasswordType::class,['constraints'=>new Length(null,8)]);
        $builder->add('submit',SubmitType::class);
    }

}