<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ProductBundle\Controller\Front;

use WellCommerce\Bundle\CoreBundle\Controller\Front\AbstractFrontController;
use WellCommerce\Bundle\CoreBundle\Controller\Front\FrontControllerInterface;
use WellCommerce\Bundle\ProductBundle\Entity\ProductInterface;
use WellCommerce\Bundle\WebBundle\Breadcrumb\BreadcrumbItem;

/**
 * Class ProductController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductController extends AbstractFrontController implements FrontControllerInterface
{
    public function indexAction(ProductInterface $product)
    {
        $this->addBreadCrumbItem(new BreadcrumbItem([
            'name' => $product->translate()->getName(),
        ]));

        $this->manager->getProductProvider()->setResource($product);

        return $this->displayTemplate('index', [
            'product' => $product
        ]);
    }

    public function viewAction(ProductInterface $product)
    {
        $this->manager->getProductProvider()->setResource($product);

        $defaultTemplateData = $this->manager->getProductProvider()->getProductDefaultTemplateData();
        $basketModalContent  = $this->renderView('WellCommerceProductBundle:Front/Product:view.html.twig', $defaultTemplateData);

        return $this->jsonResponse([
            'basketModalContent' => $basketModalContent,
            'attributes'         => $defaultTemplateData['attributes']
        ]);
    }
}
