<?php

namespace App\Form;

use App\Entity\Jeu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// types de données
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
// relations
use App\Entity\Genre;
use App\Repository\GenreRepository;
use App\Entity\Console;
use App\Repository\ConsoleRepository;
use App\Entity\Editeur;
use App\Repository\EditeurRepository;

class JeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                "attr"=>["placeholder"=>"Saisir le nom du jeu"],
                "required"=>true
            ])
            ->add('prix', MoneyType::class, [
                "attr"=>["placeholder"=>"Saisir le prix du jeu"],
                "currency"=>"EUR",
                "required"=>true
            ])
            ->add('image', UrlType::class, [
                "attr"=>["placeholder"=>"Url vers l'image du jeu"],
                "required"=>false
            ])
            ->add('description', TextAreaType::class, [
                "attr"=>["placeholder"=>"Description du jeu"],
                "required"=>false
            ])
            ->add('date', IntegerType::class, [
                "required"=>true
            ])
            ->add('genre', EntityType::class, [
                "class"=>Genre::class,
                "choice_label"=>"libelle",
                "required"=>true
            ])
            ->add('editeur', EntityType::class, [
                "class"=>Editeur::class,
                "choice_label"=>"nom",
                "required"=>true
            ])
            ->add('consoles', EntityType::class, [
                "class"=>Console::class,
                // "query_builder"=>function(ConsoleRepository $rep){
                //     return $rep->findAllQ();
                // },
                "choice_label"=>"nom",
                "multiple" => true,
                "expanded" => false,
                "required"=>true,
                "by_reference"=>false,
                "attr"=>["class"=>"selection"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,
        ]);
    }
}
