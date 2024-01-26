<?php

namespace EasyCreditHideForB2b;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin EasyCreditHideForB2b.
 */
class EasyCreditHideForB2b extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('easy_credit_hide_for_b2b.plugin_dir', $this->getPath());
        parent::build($container);
    }

}
