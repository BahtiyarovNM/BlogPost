<?php

/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 02.02.17
 * Time: 12:50
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\Category;
use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Role;
use AppBundle\Entity\Character;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\DependencyInjection\ContainerInterface;






class LoadUserData implements FixtureInterface,ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $type=new Character();
        $type->setName("free")->setCost(0);
        $manager->persist($type);
        $type=new Character();
        $type->setName("paid")->setCost(30);
        $manager->persist($type);
        $role = new Role();
        $role->setName('ROLE_USER');
        $manager->persist($role);
        $role = new Role();
        $role->setName('ROLE_ADMIN');

        $manager->persist($role);


        $user = new User();
        $user->setIsActive(1);
        $user->setEmail('john@example.com');
        $user->setUsername('johndoe');

        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, '123');
        $user->setPassword($password);



        $user->getUserRoles()->add($role);

        $manager->persist($user);
        $manager->flush();
    }
}