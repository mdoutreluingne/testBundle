<?php

namespace KnpU\LoremIpsumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use KnpU\LoremIpsumBundle\DependencyInjection\KnpULoremIpsumExtension;

class KnpULoremIpsumBundle extends Bundle 
{
    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new KnpULoremIpsumExtension();
        }
        return $this->extension;
    }
}
?>