<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/04/2016
 * Time: 14:29
 */

namespace App\AppUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppUserBundle extends Bundle
{
    public function getParent()
    {
       return 'FOSUserBundle';
    }
}