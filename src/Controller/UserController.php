<?php
/**
 * Created by PhpStorm.
 * User: nemza
 * Date: 2018-12-02
 * Time: 10:01
 */

namespace App\Controller;

use App\Entity\User;

use App\Form\UserType;

use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
	/**
	 * @Route("/user/", name="user_index", methods="GET")
	 * @param UserRepository $userRepository
	 * @return Response
	 */
    public function index(UserRepository $userRepository): Response
    {
	    $this->denyAccessUnlessGranted(['ROLE_MODERATOR', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);

        return $this->render('user/index.html.twig', ['users' => $userRepository->findAll()]);
    }

	// localhost/symfony2018/projet/public/profile/profile-5
	/**
	 * @Route("/user/profile-{id}", name="user_profile")
	 * @param int $id
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function profile($id) {

		$this->denyAccessUnlessGranted(['ROLE_USER', 'ROLE_MODERATOR', 'ROLE_CONTRIBUTOR', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);

		$profile = $this->getDoctrine()
			->getRepository(User::class)
			->find($id);

		// dump($profile);

		return $this->render('user/user_profile.html.twig', ['user' => $profile]);
	}

	/**
	 * @Route("/user/new", name="user_new", methods="GET|POST")
	 * @param Request $request
	 * @return Response
	 * @param UserPasswordEncoderInterface $encoder
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
	// On ajoute le cryptage aussi.
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

	        if(!empty($user->getImage())) {

		        $file = $user->getImage();

		        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
		        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

		        $file->move($this->getParameter('users_directory'), $fileName);

	        } else {

		        // Le prof veut mettre une image par défaut en cas de non selectionnez personnel d'image.
		        $fileName = 'default.png';
	        }

	    $user->setImage($fileName);

	    // Phase de Data‑Basi‑fica‑tion
            $em = $this->getDoctrine()->getManager();

	        // Phase de cryptage
	        $crypt = $encoder->encodePassword($user, $user->getPassword()); // -> = methode.

	        $user->setPassword($crypt);

	        // Phase de DataBasi‑fica‑tion.
            $em->persist($user);

            $em->flush();

	        // Message Flash
	        $this->addFlash('user_success', 'Utilisateur créé avec succès !');

            return $this->redirectToRoute('home');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/user/show/{id}", name="user_show", methods="GET")
	 * @param User $user
	 * @return Response
	 */
    public function show(User $user): Response
    // public function show($id)
    {
	    $this->denyAccessUnlessGranted(['ROLE_ADMIN', 'ROLE_CONTRIBUTOR', 'ROLE_SUPER_ADMIN', 'ROLE_USER', 'ROLE_MODERATOR']);

	    /*
	    $user = $this->getDoctrine()
		    ->getRepository(User::class)
		    ->find($id);
	    */

        return $this->render('user/show.html.twig', ['user' => $user]);
    }

	/**
	 * @Route("/user/{id}/edit", name="user_edit", methods="GET|POST")
	 * @param Request $request
	 * @param User $user
	 * @param UserPasswordEncoderInterface $encoder
	 * @return Response
	 */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {
	    $this->denyAccessUnlessGranted(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN', 'ROLE_USER', 'ROLE_MODERATOR', 'ROLE_CONTRIBUTOR']);

	    // echo var_dump($imageFile = $product->getImage());
	    $imageFile = $user->getImage();

	    // $form = $this->createForm(UserType::class, $user->setRoles($this->getUser()));
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { // Le test.

	        if(!empty($user->getImage())) {

		        // Supprimez l'image précedénte si nouvelle, cela fonctionne !!!
		        if($imageFile != 'default.png') {

			        unlink('img/users/' . $imageFile);
		        }

		        $file = $user->getImage();

		        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
		        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

		        $file->move($this->getParameter('users_directory'), $fileName);

		        $user->setImage($fileName);

	        } elseif ($user->getImage() == null) {

		        // $product->setImage('default.png');
		        $user->setImage($imageFile);
	        }

	        // Phase de cryptage
	        $crypt = $encoder->encodePassword($user, $user->getPassword()); // -> = methode.

	        $user->setPassword($crypt);

	        // Phase de Data‑Basi‑fica‑tion
            $this->getDoctrine()->getManager()->flush();

            // Message Flash
	        $this->addFlash('user_success', 'Modi‑fica‑tion réussi !');

            // return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
	        return $this->redirectToRoute('user_profile', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/user/{id}/delete", name="user_delete", methods="DELETE")
	 * @param Request $request
	 * @param User $user
	 * @return Response
	 */
    public function delete(Request $request, User $user): Response
    {
    	// Autorisation de suppression… Tous les gestions de qui peut dans le formulaire ce fait dans le TWIG avec vérification de APP.USER.ID & USER.ID & DE LEVEL…
	    // Je n'aurais peut être pas le temps de tout implémenter.
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR", "ROLE_USER", "ROLE_MODERATOR"]);

	    $imageFile = $user->getImage();

	    if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {

		    // Supprimez l'image, cela fonctionne !!!
		    if($imageFile != 'default.png') {

			    unlink('img/users/' . $imageFile);
		    }

			// Phase de Data‑Basi‑fica‑tion
            $em = $this->getDoctrine()->getManager();

            $em->remove($user);

            $em->flush();

		    // Message Flash
            $this->addFlash('user_danger', 'Utilisateur supprimé !');
        }
	    // Tentative de correction de l'erreur affiché lorsque l'on supprime l'user en loggé ! Peut‑être faiqe un log‑out ???
	    return $this->redirectToRoute('user_logout');
	    // return $this->redirectToRoute('home');
    }

	/**
	 * @Route("/login", name="user_login")
	 * @param AuthenticationUtils $authenticationUtils
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function login (AuthenticationUtils $authenticationUtils) {

		// 2018-12-12
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		// 2018-12-12

		return $this -> render('index.html.twig', [
			'last_username' => $lastUsername,
			'error' => $error,
			]
		);
	}

	// Pour le checker
	/**
	 * @Route("/logout", name="user_logout")
	 */
	public function logout() {

		// 		return $this -> render('index.html.twig');
		return $this->redirectToRoute('home');
	}
}
