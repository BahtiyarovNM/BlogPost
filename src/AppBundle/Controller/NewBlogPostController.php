<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 30.01.17
 * Time: 20:34
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\BlogPost;
use AppBundle\Form\BlogPostType;
class NewBlogPostController extends Controller
{
    /**
     * @Route("/post", name="create_post")
     */

public function createPostAction(Request $request)
{
    $post = new BlogPost();
    $validator = $this->get('validator');
    $errors = $validator->validate($post);
    $form = $this->createForm(BlogPostType::class, $post);
    $form->handleRequest($request);

    if (count($errors) > 0) {

        $errorsString = (string) $errors;

        return new Response($errorsString);
    }
    if ($form->isSubmitted() && $form->isValid()) {

        $post->setBody(htmlspecialchars($post->getBody()));
        $post->setUser($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();



        return $this->redirectToRoute('page');
    }
    return $this->render(
        'post/create.html.twig',
        array('form' => $form->createView()

        )
    );

}


}