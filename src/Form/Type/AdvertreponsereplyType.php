<?php

namespace BlogJF\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;



class AdvertreponsereplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
    
        $builder->add('advert', TextareaType::class);
    }

    public function getName()
    {
        return 'reponsereply';
    }
}

