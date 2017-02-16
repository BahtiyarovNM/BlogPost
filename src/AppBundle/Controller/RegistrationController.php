<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.01.17
 * Time: 13:55
 */

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UserLoginType;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
class RegistrationController extends Controller
{


    private function authenticateUser(User $user)
    {
        $providerKey = 'main';
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        $this->get('security.token_storage')->setToken($token);
        $this->get('session')->set('_security_main', serialize($token));
    }


    /**
     * @Route("/register", name="user_registration")
     *
     */
    public function registerAction(Request $request)
    {

        $user = new User();
        $validator = $this->get('validator');
        $errors = $validator->validate($user);
        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);

        if (count($errors) > 0) {

            $errorsString = (string)$errors;

            return new Response($errorsString);
        }


        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this
                ->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setIsActive(1);

            $em = $this->getDoctrine()->getManager();
            $user->getUserRoles()->add($em->getRepository('AppBundle:Role')->findOneByName("ROLE_USER"));
            $em->persist($user);
            $em->flush();
            $this->authenticateUser($user);
           return $this->redirectToRoute('page');
        }

        return $this->render(
            'user/registration/register.html.twig',
            array('form' => $form->createView()

            )
        );
    }


}