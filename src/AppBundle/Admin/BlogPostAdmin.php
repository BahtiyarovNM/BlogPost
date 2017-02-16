<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 20.01.17
 * Time: 8:30
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BlogPostAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }



    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper

            ->with('Content', array('class' => 'col-md-9'))
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('price','text')
            ->add('user', 'entity', array(
                'class' => 'AppBundle\Entity\User',
                'choice_label' => 'username',
            ))

            ->end()

            ->with('Meta data', array('class' => 'col-md-3'))
            ->add('category', 'sonata_type_model', array(
                'multiple' => true,
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name',
            ))
            ->end();


    }
    protected function configureListFields(ListMapper $listMapper)
    {


        $listMapper
            ->addIdentifier('title')
            ->add('draft')
            ->add('blog_post.category')
            ->add('price')
            ->add('blog_post.user')

        ;
    }
}