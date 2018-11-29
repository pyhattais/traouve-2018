<?php

namespace App\Form;

use App\Entity\Traobject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;


class TraobjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state')
            ->add('title')
            ->add('pictureFile', VichFileType::class, [
                'attr' => [
                    'placeholder' => '.jpg',
                ]])
            ->add('description')
            ->add('eventAt', DateType::class, ['widget' => 'single_text'])
            ->add('city')
            ->add('address')
            ->add('category')
            ->add('county');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}
