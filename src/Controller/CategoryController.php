<?php
/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi.
 * Date: 2018-12-09
 * Time: 20:55
 */

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
	/**
	 * @Route("/", name="category_index", methods="GET")
	 * @param CategoryRepository $categoryRepository
	 * @return Response
	 */
    public function index(CategoryRepository $categoryRepository): Response
    {
    	// SÉCURISATION DE ACCÈS, AU RÔLE'S PRÉDÉFINIE…
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        return $this->render('category/index.html.twig', ['categories' => $categoryRepository->findAll()]);
    }

	/**
	 * @Route("/new", name="category_new", methods="GET|POST")
	 * @param Request $request
	 * @return Response
	 */
    public function new(Request $request): Response
    {
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

			// Phase de DataBasi‑fica‑tion.
            $em = $this->getDoctrine()->getManager();

            $em->persist($category);

            $em->flush();

	        // Message Flash
	        $this->addFlash('category_success', 'Catégorie créé avec succès !');

            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/{id}", name="category_show", methods="GET")
	 * @param Category $category
	 * @return Response
	 */
    public function show(Category $category): Response
    {
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        return $this->render('category/show.html.twig', ['category' => $category]);
    }

	/**
	 * @Route("/{id}/edit", name="category_edit", methods="GET|POST")
	 * @Assert\Type("string")
	 * @param Request $request
	 * @param Category $category
	 * @return Response
	 */
    public function edit(Request $request, Category $category): Response
    {
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

	        // Phase de Data‑Basi‑fica‑tion
            $this->getDoctrine()->getManager()->flush();

	        // Message Flash
	        $this->addFlash('category_success', 'Modi‑fica‑tion réussi !');

            return $this->redirectToRoute('category_edit', ['id' => $category->getId()]);
        }

        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/{id}", name="category_delete", methods="DELETE")
	 * @param Request $request
	 * @param Category $category
	 * @return Response
	 */
    public function delete(Request $request, Category $category): Response
    {
	    $this->denyAccessUnlessGranted(["ROLE_ADMIN", "ROLE_SUPER_ADMIN", "ROLE_CONTRIBUTOR"]);

        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {

	        // Phase de Data‑Basi‑fica‑tion
            $em = $this->getDoctrine()->getManager();

            $em->remove($category);

            $em->flush();

	        // Message Flash
	        $this->addFlash('category_danger', 'Catégorie supprimé !');
        }

        return $this->redirectToRoute('category_index');
    }
}
