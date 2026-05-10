<?php

namespace App\Form;

use App\Entity\Website;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('url', UrlType::class)
            ->add('hasHttpAuth', CheckboxType::class, [
                'required' => false,
                'label' => 'Uses HTTP authentication',
            ])
            ->add('httpAuthUsername', null, [
                'required' => false,
                'label' => 'HTTP auth username',
            ])
            ->add('httpAuthPassword', PasswordType::class, [
                'required' => false,
                'label' => 'HTTP auth password',
            ])
            ->add('adminLoginUrl', UrlType::class, [
                'required' => false,
                'label' => 'Admin login URL',
            ])
            ->add('server', null, [
                'required' => false,
                'label' => 'Server hosted on',
            ])
            ->add('notes', TextareaType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Website::class,
        ]);
    }
}