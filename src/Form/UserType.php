<?php
/*
 * Created by PhpStorm.
 * User: Nemzag aka Gazmen Arifi (Shkypi, 1979-09-30).
 * Date: 2018-12-10
 * Time: 14:45
*/

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

	        ->add('username', TextType::class, [

	        	'label' => "Choisissez votre pseudonyme :"
	        ])

	        ->add('email', EmailType::class, [

	        	'label' => "Insérez votre email (valide) :"
	        ])

	        ->add('password', PasswordType::class, [

	        	'label' => "Insérez votre mot de passe :"
	        ])

	        ->add('confirmPassword', PasswordType::class, [

	        	'label' => "Confirmer votre mot de passe :"
	        ])

	        ->add('first_name', TextType::class, [

	        	'label' => "Votre prénom :"
	        ])

	        ->add('last_name', TextType::class, ['label' => "Votre nom :"])

	        ->add('birth_day', BirthdayType::class, ['label' => "Votre date de naissance :"])

	        ->add('presentation', TextareaType::class, ['label' => "Présentez‑vous briève‑mênt :"])

	        ->add('role', ChoiceType::class, [

		        'label' => 'Rôle',

		        'multiple' => true,
		        'choices' => [
			        'Utilisateur' => 'ROLE_USER',
			        'Modérateur' => 'ROLE_MODERATOR',
			        'Contributeur' => 'ROLE_CONTRIBUTOR',
			        'Administrateur' => 'ROLE_ADMIN'
		        ]
	        ])

	        /*
	        ->add('roles', ChoiceType::class, [

					'choices' => [
						'Utilisateur' => 5,
						'Modérateur' => 4,
						'Contributeur' => 3,
						'Administrateur' => 2,
						'Super‑Administrateur' => 1,
						],
					'preferred_choices' => ['Utilisateur' => 5],

			        // Methode GrafikArt.fr
	        	'choices' => $this->getChoices(),
				        'preferred_choices' => ['Utilisateur' => 5],
	            ]

	        ) // Voir la doc et ajouté de paramètre
            */

	        ->add('inscription_date', DateType::class, [

		        'label' => false,
		        /* Pour ne pas l'afficher dans le new, sinon : "Date de inscription :" */

		        'data' => new \DateTime(),

		        'attr' => ['style' => 'display:none;']
	        ])
	        ->add('image', FileType::class, [
		        'label' => "Inséré votre image",

		        'data_class' => null,

		        'required' => false
	        ])
	        /*->add('submit', SubmitType::class)*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    /*
	// Methode de GrafikArt.fr
    private function getChoices() {

    	$choices = User::ROLES;
    	$output = [];
    	foreach($choices as $key => $value) {
    		$output[$value] = $key;
	    }
    	return $output;
    }
    */
}