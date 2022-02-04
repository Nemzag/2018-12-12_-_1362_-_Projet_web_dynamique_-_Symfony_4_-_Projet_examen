<?php
/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi.
 * Date: 2018-12-10
 * Time: 14:09
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Product;

use App\Form\CommentType;

use App\Repository\CommentRepository;

use App\Repository\NotationRepository;
use App\Repository\ProductRepository;
use Exception;
use PhpParser\Node\Expr\Array_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{
	/**
	 * @Route("/", name="comment_index", methods="GET")
	 * @param CommentRepository $commentRepository
	 * @return Response
	 */
	public function index(CommentRepository $commentRepository): Response
	{
		$this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_MODERATOR"]);

		// $comments = $commentRepository->findAll();
		$comments = $commentRepository->findCommentsNotations();

		// $productId = $productRepository->findBy(['product' => $commentId->getProduct()]);

		return $this->render('comment/index.html.twig', [
			'comments' => $comments,
			// 'notations' => '5',
		]);
	}

	/**
	 * @Route("/{id}", name="comment_index_id", methods="GET")
	 * @param Comment $comment
	 * @return Response
	 */
	public function indexId(Comment $comment): Response
	{
		$this->denyAccessUnlessGranted(["ROLE_USER"]);

		$comment = $this->getDoctrine()
			->getRepository(Comment::class)
			->findBy(['user' => $comment]) // Quoi ???
			// ->findBy(['user' => 5]) // Quoi ???
		;

		// Si vous êtes les bon USER vous pouvez modifer votre commêntaires. Sinon rien ne s'affiche !!! Et vous obtenez une erreur 404…
		if ($comment) { // == ??? Je ne sais quoi écrire en PHP pour remplacer le TWIG app.user.id, pour récupéré la variable ID de environnement Symfony ??? Pour empêcher l'affichage des autres profils et leurs commêntaires si l'on change l'adresse manuellement !!!

			// http://localhost/symfony2018/projet/public/comment/4
			// http://localhost/symfony2018/projet/public/comment/3
			// …

			return $this->render('comment/index.html.twig', [
				'comments' => $comment,
				'notations' => 5,
				]
			);

		} else {
			return $this->render('error.html.twig', [
			
				'comments' => $comment,
				'notations' => 5,
				]
			);
		}
	}

	//=======================================================================================

	/**
	 * @Route("/new", name="comment_new", methods="GET|POST")
	 * @param Request $request
	 * @param ProductRepository $productRepository
	 * @return Response
	 * @throws Exception
	 */
	public function new(Request $request): Response
	{

		$this->denyAccessUnlessGranted(["ROLE_USER"]);

		$comment = new Comment();
		$form = $this->createForm(CommentType::class, $comment)
			->add('comment', TextareaType::class)
			->add('date_added', DateType::class, [
				'label' => "Date du com‑mêntaire :",
				'data' => new \DateTime()
			])
			->add('user', EntityType::class, [
				'class' => 'App:User',
				// Clé : class…

				// Choices & choice label sont des options.
				'choice_label' => 'Username'
			])
			->add('product', IntegerType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			// Phase de DataBasi‑fica‑tion.
			$em = $this->getDoctrine()->getManager();

			$em->persist($comment);

			$em->flush();

			// Message Flash
			$this->addFlash('comment_success', 'Com‑mêntaire créé avec succès !');

			return $this->redirectToRoute('comment_index');
		}

		return $this->render('comment/new.html.twig', [
			'comment' => $comment,
			'form' => $form->createView(),
		]);
	}

	//=======================================================================================

	/**
	 * @Route("/{id}/show", name="comment_show", methods="GET")
	 * @param Comment $comment
	 * @return Response
	 */
	public function show(Comment $comment): Response
	{
		$this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_MODERATOR"]);

		return $this->render('comment/show.html.twig', ['comment' => $comment]);
	}

	// L'Édition des commêntaires fonctionne, dans mon test en tout cas !!!

	/**
	 * @Route("/{id}/edit", name="comment_edit", methods="GET|POST")
	 * @param Request $request
	 * @param Comment $comment
	 * @return Response
	 */
	public function edit(Request $request, Comment $comment): Response
	{
		$this->denyAccessUnlessGranted(["ROLE_USER", "ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_MODERATOR"]);

		$form = $this->createForm(CommentType::class, $comment);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			// Phase de Data‑Basi‑fica‑tion
			$this->getDoctrine()->getManager()->flush();

			// Message Flash
			$this->addFlash('comment_success', 'Modi‑fica‑tion réussi !');

			return $this->redirectToRoute('comment_index', ['id' => $comment->getId()]);
		}

		return $this->render('comment/edit.html.twig', [
			'comment' => $comment,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route("/{id}/delete", name="comment_delete", methods="DELETE")
	 * @param Request $request
	 * @param Comment $comment
	 * @return Response
	 */
	public function delete(Request $request, Comment $comment): Response
	{
		$this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_MODERATOR"]);

		if ($this->isCsrfTokenValid('delete' . $comment->getId(), $request->request->get('_token'))) {

			// Phase de Data‑Basi‑fica‑tion
			$em = $this->getDoctrine()->getManager();

			$em->remove($comment);

			$em->flush();

			// Message Flash
			$this->addFlash('comment_danger', 'Com‑mêntaire supprimé !');
		}

		return $this->redirectToRoute('comment_index');
	}
}
