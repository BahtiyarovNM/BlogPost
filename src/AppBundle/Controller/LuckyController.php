<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 11.01.17
 * Time: 9:42
 */

namespace AppBundle\Controller;

use Doctrine\ORM\Query\ResultSetMapping;
use AppBundle\Entity\User;
use AppBundle\Form\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Form\TaskType;

use AppBundle\Entity\Task;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class LuckyController extends Controller
{
    function getConnection()
    {


    }




    public $s;
    /**
     * @Route("/lucky/number", name="task_success")
     */

     public function numberAction()
    {
//        $number = mt_rand(0, 100);
//        $number=$this->s;
//
//        return $this->render('lucky/number.html.twig', array(
//            'number' => $number,
//        ));
//

        $email="123";
//        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
//     $product = $repository->findAll();
//       // $product = $repository->findOneBy(["id"=>"1"]);
//   //     $product='12';
//     $t= var_dump($product);
//        $rsm = new ResultSetMapping();
//// build rsm here
//        $entityManager=$this->getDoctrine()->getManager();
//        $query = $entityManager->createNativeQuery('SELECT id FROM product WHERE id = ?', $rsm);
         $productId=1;

         $em = $this->getDoctrine()->getManager();
         $product = $em->getRepository('AppBundle:User')->findOneByUsername('New user name!222');

         $product->setUsername('New user name!333');
         $em->flush();
         $conn = $this->get('database_connection');
         $users = $conn->fetchAll('SELECT `id` FROM user');


     return (new Response());







    }
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
     */
    public function secondAction(Request $request){
        // create a task and give it some dummy data for this example
        // just setup a fresh $task object (remove the dummy data)




      //  $task = new Task();
        $user=new User();
        $form = $this->createFormBuilder($user)
            //->add('dueDate', DateType::class, array('widget' => 'single_text'))
            ->add('email', EmailType::class)
            ->add('nickName', TextType::class)
            ->add('pass', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))

            ->add('Registrate', SubmitType::class, array('label' => 'Registration'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->s=$form->get('email')->getData();
          //  return $this->redirectToRoute('task_success');
            return $this->render('lucky/number.html.twig', array(
                'number' => $form->get('pass')->getData(),
            ));

        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function thirdAction(Request $request){  // ...



    }



}