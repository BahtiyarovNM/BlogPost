<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 10.02.17
 * Time: 22:20
 */

namespace AppBundle\Controller;
use AppBundle\Entity\PaymentHistory;
use AppBundle\Form\PaymentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class PaymentController extends Controller
{
    /**
     * @Route("/payment", name="payment")
     */
    public function paymentAction(Request $request){

        $history = new PaymentHistory();
        $validator = $this->get('validator');
        $errors = $validator->validate($history);
        $form=$this->createForm(PaymentType::class,$history);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $user=$this->getUser();
            $history->setUser($user);
            $user->setCash($history->getSumm());
            $em = $this->getDoctrine()->getManager();
            $em->persist($history);
            $em->flush();



            return $this->redirectToRoute('payment');
        }
        return $this->render('payment/pay.html.twig',
            [
                'form'=>$form->createView(),
                'history'=>$this->getUser()->getPaymentHistory()

            ]);


    }

}