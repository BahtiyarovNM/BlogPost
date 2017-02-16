<?php

/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 04.02.17
 * Time: 1:28
 */
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('decode', array($this, 'decoder')),
            new \Twig_SimpleFilter('substr', array($this, 'substr')),
            new \Twig_SimpleFilter('check', array($this, 'check')),
        );
    }

    public function decoder($text)
    {
        $result = html_entity_decode($text);
       //$result2=htmlspecialchars_decode($result);
        return $result;
    }
    public function substr($text)
    {
        $result = substr($text,0,30);
        //$result2=htmlspecialchars_decode($result);
        return $result;
    }
    public function check($check,$array)
    {
        return in_array($check,$array);
    }

    public function getName()
    {
        return 'app_extension';
    }
}