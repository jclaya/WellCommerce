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

namespace WellCommerce\Bundle\CoreBundle\Form\Builder;

use WellCommerce\Bundle\CoreBundle\Form\FormInterface;
use WellCommerce\Bundle\CoreBundle\Form\Elements;
use WellCommerce\Bundle\CoreBundle\Form\Rules;
use WellCommerce\Bundle\CoreBundle\Form\Filters;
use WellCommerce\Bundle\CoreBundle\Form\Conditions;

/**
 * Interface FormBuilderInterface
 *
 * @package WellCommerce\Bundle\CoreBundle\Form
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface FormBuilderInterface
{
    /**
     * form.init event name
     */
    const FORM_INIT_EVENT = 'form.init';

    /**
     * Creates the form, triggers init event and then populates form with values
     *
     * @param FormInterface $form
     * @param array|object  $data
     * @param array         $options
     *
     * @return mixed
     */
    public function create(FormInterface $form, $data = null, array $options);

    /**
     * Returns Form object
     *
     * @return Elements\Form
     */
    public function init($options);

    /**
     * Returns form data
     *
     * @return object|null
     */
    public function getData();

    /**
     * Sets form options
     *
     * @param array $options
     *
     * @return void
     */
    public function setOptions(array $options);

    /**
     * Returns form options
     *
     * @return array
     */
    public function getOptions();

    /**
     * Sets new form data
     *
     * @return mixed
     */
    public function setData(array $data);
}