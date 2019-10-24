<?php
/**
 * Created by PhpStorm.
 * User: nemza
 * Date: 2018-11-28
 * Time: 18:49
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class ConditionController extends AbstractController
{
	// @Route c'est la racine.
	/**
	 * @Route("/conditions", name="conditions")
	 */

	public function conditions()
	{
		return $this->render('conditions/conditions.html.twig');
	}
}