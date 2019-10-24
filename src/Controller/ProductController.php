<?php
/*
 * Created by PhpStorm.
 * User: Nemzag aka Gazmen Arifi (Shkypi, 1979-09-30).
 * Date: 2018-12-10
 * Time: 14:45
*/

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Comment;
use App\Entity\Notation;
use App\Entity\User;

use App\Form\ProductType;
use App\Form\CommentType;

use App\Repository\CommentRepository;
use App\Repository\NotationRepository; // Je tente de l'implemênter sans succès.
use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/product")
 */
class ProductController extends AbstractController
{
	/**
	 * @Route("/", name="product_index", methods="GET")
	 * @param ProductRepository $productRepository
	 * @return Response
	 */
    public function index(ProductRepository $productRepository): Response
    {
	    // echo var_dump($productRepository);

	    $productsList = $productRepository
		                ->findAll();

	    $notationsList = $this->getDoctrine()->getRepository(Notation::class)->findAll();

	    /*
		   Je ne parviens pas à récupérer l'objet dans le tableau pour afficher chaque ligne indépendamment, ayant mit « $notation[0] », je n'ai que le premier record du array, je ne parviens pas à tous les afficher et ne connaît pas la syntaxe à employer pour array contenant des objets, $notation[] est refusé…

		   Je ne maîtrise pas assez l'objet pro savoir commênt bien l'invoquer de ce fait la notation n'apparait pas correctement et affiche toujours 5 étoiles bien que le script adapte la couleur et le nombre de étoile en fonction des points…

		   Que je ne suis pas parvenu à faiqe calculer bien que cette fonction semble soit correct. Je ne parviens à cibler tout les tableaux.
	   */

		/*

	    foreach($notationsList as $value) {

		   $total += $value->notation;
	    }

	    $averages = ceil(($total) / (count($notation))));
	    // echo var_dump($average);
	    */

		$averages = 5;

	    return $this->render('product/index.html.twig', [
		    'products' => $productsList,
		    'notations' => $averages, // Je ne suis pas parvenu à finaliser la requete AVG() dans le NotationRepository, ni à cibler le bon produit, ni à l'afficher cor‑recte‑mênt.
	    ]);
    }

	/**
	 * @Route("/new", name="product_new", methods="GET|POST")
	 * @param Request $request
	 * @return Response
	 */
    public function new(Request $request): Response
    {
    	// Autorisation de création…
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

	        if(!empty($product->getImage())) {

		        $file = $product->getImage();

		        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
		        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

		        $file->move($this->getParameter('products_directory'), $fileName);

	        } else {

		        // Le prof veut mettre une image par défaut en cas de non selectionnez personnel d'image.
		        $fileName = 'default.png';
	        }

	        $product->setImage($fileName);

	        // Phase de Data‑Basi‑fica‑tion
	        $em = $this->getDoctrine()->getManager();

	        // echo var_dump($user = $this->getUser());
            $product->setUser($this->getUser());

            $em->persist($product);
            $em->flush();

	        // Message Flash
	        $this->addFlash('product_success', 'Produit créé avec succès !');

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/{id}", name="product_show", methods="GET")
	 * @param Product $product
	 * @return Response
	 */
    public function show(Product $product): Response
    {
	    $notation = $this->getDoctrine()
		    ->getRepository(Notation::class)
		    ->findBy(['product' => $product->getId()]) // Quoi ???
	    ;

	    $comment = $this->getDoctrine()
		    ->getRepository(Comment::class)
		    ->findBy(['product' => $product->getId()])
		    // ->findBy(['product' => $product->getId()]) // Quoi ???
	    ;

	    // echo var_dump($notation);

	    $total = 0;

	    foreach($notation as $value) {

		    $total += $value->notation;
	    }

	    if($notation != null) {
	        $average = ceil(($total) / (count($notation)));
	    } else {
	    	$average = null;
	    }

	    // echo var_dump($average);

        return $this->render('product/show.html.twig', [
        	'product' => $product,
	        'notation' => $average,
	        'comments' => $comment, // Un seul
        ]);
    }

	/**
	 * @Route("/{id}/edit", name="product_edit", methods="GET|POST")
	 * @param Request $request
	 * @param Product $product
	 * @return Response
	 */
    public function edit(Request $request, Product $product): Response
    {
	    // Autorisation de édition…
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

	    // echo var_dump($imageFile = $product->getImage());
	    $imageFile = $product->getImage();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        	if(!empty($product->getImage())) {

		        // Supprimez l'image précedénte si nouvelle, cela fonctionne !!!
		        if($imageFile != 'default.png') {

			        unlink('img/products/' . $imageFile);
		        }

		        $file = $product->getImage();

		        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
		        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

		        $file->move($this->getParameter('products_directory'), $fileName);

		        $product->setImage($fileName);

	        } elseif ($product->getImage() == null) {

		        // $product->setImage('default.png');
		        $product->setImage($imageFile);
	        }

	        // Phase de Data‑Basi‑fica‑tion
	        $this->getDoctrine()->getManager()->flush();

	        // Message Flash
	        $this->addFlash('product_success', 'Modi‑fica‑tion réussi !');

            // return $this->redirectToRoute('product_edit', ['id' => $product->getId()]);
	        return $this->redirectToRoute('product_index');
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

	// CETTE METHODE FONCTIONNE !
	/**
	 * @Route("/delete/{id}", name="product_delete", methods="DELETE")
	 * @param Request $request
	 * @param Product $product
	 * @return Response
	 */
    public function delete(Request $request, Product $product): Response
    {
	    // Autorisation de suppression…
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

	    $imageFile = $product->getImage();

        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {

	        // Supprimez l'image, cela fonctionne !!!
	        if($imageFile != 'default.png') {

		        unlink('img/products/' . $imageFile);
	        }

	        // Phase de Data‑Basi‑fica‑tion
            $em = $this->getDoctrine()->getManager();

            $em->remove($product);

            $em->flush();

            // Message Flash
	        $this->addFlash('product_danger', 'Produit supprimé !');
        }

        return $this->redirectToRoute('product_index');
    }
}
