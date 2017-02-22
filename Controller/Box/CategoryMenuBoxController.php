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

namespace WellCommerce\Bundle\CatalogBundle\Controller\Box;

use Symfony\Component\HttpFoundation\Response;
use WellCommerce\Component\Layout\Collection\LayoutBoxSettingsCollection;
use WellCommerce\Bundle\CoreBundle\Controller\Box\AbstractBoxController;

/**
 * Class CategoryMenuBoxController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class CategoryMenuBoxController extends AbstractBoxController
{
    public function indexAction(LayoutBoxSettingsCollection $boxSettings) : Response
    {
        return $this->displayTemplate('index', [
            'active' => $this->getCategoryStorage()->getCurrentCategoryIdentifier()
        ]);
    }
}
