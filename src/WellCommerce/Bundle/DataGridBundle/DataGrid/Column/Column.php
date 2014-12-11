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

namespace WellCommerce\Bundle\DataGridBundle\DataGrid\Column;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Appearance;
use WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Filter;
use WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Sorting;
use WellCommerce\Bundle\DataGridBundle\DataGrid\DataGridInterface;

/**
 * Class Column
 *
 * @package WellCommerce\Bundle\DataGridBundle\DataGrid\Column
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Column implements ColumnInterface
{
    private $options = [];

    public function __construct(array $options)
    {
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
        $this->options = $this->optionsResolver->resolve($options);
    }

    private function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'id',
            'source',
            'caption',
            'sorting',
            'appearance',
            'filter',
            'aggregated',
        ]);

        $resolver->setOptional([
            'editable',
            'selectable',
            'process_function',
            'aggregated',
        ]);

        $resolver->setDefaults([
            'appearance'       => new Appearance(),
            'sorting'          => new Sorting(),
            'filter'           => new Filter(),
            'process_function' => null,
            'editable'         => false,
            'selectable'       => false,
            'aggregated'       => false
        ]);

        $resolver->setAllowedTypes([
            'appearance' => 'WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Appearance',
            'sorting'    => 'WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Sorting',
            'filter'     => 'WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options\Filter',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->options['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function getEditable()
    {
        return $this->options['editable'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSelectable()
    {
        return $this->options['selectable'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSource()
    {
        return $this->options['source'];
    }

    /**
     * {@inheritdoc}
     */
    public function getRawSelect()
    {
        return sprintf('%s AS %s', $this->getSource(), $this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function isAggregated()
    {
        return $this->options['aggregated'];
    }

    /**
     * {@inheritdoc}
     */
    public function getCaption()
    {
        return $this->options['caption'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSorting()
    {
        return $this->options['sorting'];
    }

    /**
     * {@inheritdoc}
     */
    public function getAppearance()
    {
        return $this->options['appearance'];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilter()
    {
        return $this->options['filter'];
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function getProcessFunction()
    {
        return $this->options['process_function'];
    }
} 