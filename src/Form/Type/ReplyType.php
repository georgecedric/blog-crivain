<?php

namespace BlogJF\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('author',  TextareaType::class)
                ->add('content', TextareaType::class);
    }

    public function getName()
    {
        return 'reply';
    }
}