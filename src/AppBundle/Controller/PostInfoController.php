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


class PostInfoController extends Controller
{
    /**
     * @Route("/post/{slug}", name="postInfo", requirements={"slug": "\d+"})
     */
    public function postInfoAction(Request $request, $slug)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository('AppBundle:BlogPost')->findOneById($slug);

        $form = $this->createFormBuilder()
            ->add($post->getType()->getName(), 'submit')
            ->getForm();

        $form->handleRequest($request);
        $error = '';

//        if ($form->get('buy')->isClicked()) {
//            if($this->getUser()==null)
//            return $this->redirectToRoute('login');
//            else if($this->getUser()->getCash()>= $post->getType()->getCost()){
//                $this->getUser()->setCash(-($post->getType()->getCost()))->addBougthPost($post);
//                $post->getUser()->setCash($post->getType()->getRoyalties());
//                $entityManager->flush();
//                $this->redirect($request->getUri());
//
//            }
//            else $error="Not enough money";
//
//
//
//    }

        if ($form->get($post->getType()->getName())->isClicked()) {
            if ($this->getUser() == null)
                return $this->redirectToRoute('login');
            else if ($this->getUser()->getCash() >= $post->getType()->getCost()) {
                if ($post->getType()->getName() == 'Follow author'){
                    $author=$post->getUser();
                    $type=$post->getType();
                    $posts=$entityManager->getRepository('AppBundle:BlogPost')->findBy(array('type'=>$type,
                                                                                              'user'=>$author ));
                    foreach ($posts as $p)
                    $this->getUser()->setCash(-($post->getType()->getCost()))->addBougthPost($p);
                    $post->getUser()->setCash($post->getType()->getRoyalties());
                    $entityManager->flush();
                    $this->redirect($request->getUri());

                }

                else if ($post->getType()->getName() == 'Buy') {
                    $this->getUser()->setCash(-($post->getType()->getCost()))->addBougthPost($post);
                    $post->getUser()->setCash($post->getType()->getRoyalties());
                    $entityManager->flush();
                    $this->redirect($request->getUri());
                }

            } else $error = "Not enough money";


        }

        return $this->render('post/info.html.twig',
            [
                'form' => $form->createView(),
                'post' => $post,
                'error' => $error
            ]);


    }

}