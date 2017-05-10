<?php

namespace BlogJF\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;




class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
    
        $builder->add('advert', TextareaType::class,array(
			        'attr' => array(
			            'class' => 'tinymce',
			            'data-theme' => 'medium' // simple, advanced, bbcode
			        )
    		));
    }

    public function getName()
    {
        return 'comment';
    }
}

