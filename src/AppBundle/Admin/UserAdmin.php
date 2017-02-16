<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 22.01.17
 * Time: 13:15
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper

            ->with('Content', array('class' => 'col-md-9'))
            ->add('username', 'text')
            ->add('email', 'textarea')
            ->add('password','text')

            ->end();




    }
    protected function configureListFields(ListMapper $listMapper)
    {


        $listMapper
            ->addIdentifier('username')



        ;
    }


}