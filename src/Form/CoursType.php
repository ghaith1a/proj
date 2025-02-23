<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\File;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du cours',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le titre du cours ne peut pas être vide.',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le titre du cours doit comporter au moins {{ limit }} caractères.',
                    ]),
                ],
                'empty_data' => '',  // Valeur par défaut vide
            ])
            ->add('descrC', TextType::class, [
                'label' => 'Description',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description ne peut pas être vide.',
                    ]),
                ],
                'empty_data' => '',  // Valeur par défaut vide
            ])
            ->add('matiereC', TextType::class, [
                'label' => 'Matière',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'La matière ne peut pas être vide.',
                    ]),
                ],
                'empty_data' => '',  // Valeur par défaut vide
            ])
            ->add('dateC', DateTimeType::class, [
                'label' => 'Date du cours',
                'widget' => 'single_text',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date du cours ne peut pas être vide.',
                    ]),
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image (JPG, PNG file)',
                'mapped' => false,  // Not mapped to entity directly
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG ou PNG)',
                    ])
                ],
                'empty_data' => '',  // Remplacer par une chaîne vide
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
