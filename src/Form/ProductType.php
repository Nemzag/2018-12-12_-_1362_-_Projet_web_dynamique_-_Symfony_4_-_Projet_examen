<?php
/*
 * Created by PhpStorm.
 * User: Nemzag aka Gazmen Arifi (Shkypi, 1979-09-30).
 * Date: 2018-12-10
 * Time: 14:45
*/

namespace App\Form;

use App\Entity\Product;
use App\Entity\User;

use phpDocumentor\Reflection\Types\Integer;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	        ->add('name', TextType::class, [
		        'label' => "Nom du produit :",
		        'required' => true,
	        ])

	        ->add('price', MoneyType::class, [
		        'label' => "Prix du produit (attention la décimal ce compose de un point et deux chiffre.) :",
		        'required' => true,
	        ])

	        ->add('description', TextareaType::class, [
		        'label' => "Description du produit :",
		        'required' => true,
	        ])

	        ->add('promotion', IntegerType::class, [
		        'required' => true,
		        'label' => "Promotion (un entier de 0 à 99%) : ",
	        ])

	        ->add('image', FileType::class, [
		        'label' => "Inséré une image",

		        'data_class' => null,

		        'required' => false,
	        ])

	        ->add('date_added', DateTimeType::class, [
		        'label' => "Date d'encodage :",
		        'data' => new \DateTime()
	        ])

	        ->add('url', UrlType::class, [
		        'label' => "Inséré l'U.R.L. du produit du site du constructeur :"
	        ])

	        ->add('category', EntityType::class, [
		        'label' => "La catégorie",
		        'class'  => 'App:Category',
		        // Clé : class…
		        'choice_label' => 'Categories'
		        // Choices & choice label sont des options.
	        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
