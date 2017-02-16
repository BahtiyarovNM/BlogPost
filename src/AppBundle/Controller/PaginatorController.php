<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 28.01.17
 * Time: 14:08
 */

namespace AppBundle\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UserLoginType;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class PaginatorController extends Controller
{



    /**
     * @Route("/{slug}", name="page", requirements={"slug": "\d+"})
     */

    public function ListAction(Request $request,$slug=0)
    {


        $selectionCount=2;

        $indexStart=$slug*$selectionCount;


        $entityManager = $this->getDoctrine()->getManager();

        $dql = "SELECT b FROM AppBundle:BlogPost b";
        $query = $entityManager->createQuery($dql)
            ->setFirstResult($indexStart)
            ->setMaxResults($selectionCount);

        $paginator = new Paginator($query, $fetchJoinCollection = false);
        $pagesCount =(int)(count($paginator)/$selectionCount);





        return $this->render('post/list.html.twig',
            [
                'posts'=>$paginator,
                 'pageCount'=>$pagesCount,
                  'count'=>$slug


            ]
            );

}


}