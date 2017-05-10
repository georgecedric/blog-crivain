<?php

namespace BlogJF\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder  

        ->add('title', TextType::class)
        ->add('content', TextareaType::class)
        ->add('email', EmailType::class)
        ->add('author', TextType::class);
       
    }

    public function getName()
    {
        return 'contact';
    }
}

