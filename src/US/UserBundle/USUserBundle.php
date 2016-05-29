<?php

namespace US\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class USUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
