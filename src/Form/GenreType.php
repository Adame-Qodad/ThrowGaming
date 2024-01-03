<?php

namespace App\Form;

use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GenreType extends AbstractType
{
    private $defaultinp = "w-full border p-2 rounded";

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                "attr"=>[
                    "placeholder"=>"Saisir le nom du genre",
                    "class"=>$this->defaultinp
                ],
                "required" => true,
            ])
            ->add('couleur', TextType::class, [
                "attr"=>[
                    "placeholder"=>"ex: red",
                    "class"=>$this->defaultinp
                ],
                "required" => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Genre::class,
        ]);
    }
}
