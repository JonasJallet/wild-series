<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProgramType extends AbstractType
{
    private int $year = 1970;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('synopsis', TextareaType::class)
            ->add('poster', TextType::class)
            ->add('country', CountryType::class)
            ->add('year', ChoiceType::class, [
                'choices' => $this->generateYears(),
            ])
            ->add('category', null, ['choice_label' => 'name'], CategoryType::class);
    }

    private function generateYears(): array
    {
        $years = [];
        for ($i = $this->year; $i <= 2029; $i++) {
            $years["$i"] = $i;
        }
        return $years;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
