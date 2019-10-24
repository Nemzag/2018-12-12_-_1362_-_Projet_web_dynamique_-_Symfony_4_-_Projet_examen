<?php
/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi.
 * Date: 2018-10-05
 * Time: 13:29
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */

    public function index()
    {
	    return $this->render('index.html.twig');
    }
}