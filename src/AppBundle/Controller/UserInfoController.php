<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 05.02.17
 * Time: 15:50
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserInfoController extends Controller
{
    /**
     * @Route("/user/{slug}", name="userInfo")
     */
    public function UserInfoAction(Request $request,$slug)
    {
        $entityManager=$this->getDoctrine()->getManager();
        $user=$entityManager->getRepository('AppBundle:User')->findOneByUsername($slug);
        return $this->render('user/info/info.html.twig',
            [
                'user'=>$user
            ]);



    }

}