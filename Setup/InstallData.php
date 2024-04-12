<?php

namespace Bonecki\CustomOrderType\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Quote\Setup\QuoteSetup;
use Magento\Sales\Setup\SalesSetup;
use Magento\Sales\Setup\SalesSetupFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetup
     */
    protected $eavSetupFactory;

    /**
     * @var QuoteSetup
     */
    protected $quoteSetupFactory;

    /**
     * @var SalesSetupFactory
     */
    protected $salesSetupFactory;

    /**
     * @var ModuleDataSetupInterface
     */
    protected $setup;

    /**
     * @param EavSetup          $eavSetupFactory
     * @param QuoteSetup        $quoteSetupFactory
     * @param SalesSetupFactory $salesSetupFactory
     */
    public function __construct(
        EavSetup $eavSetupFactory,
        QuoteSetup $quoteSetupFactory,
        SalesSetup $salesSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->quoteSetupFactory = $quoteSetupFactory;
        $this->salesSetupFactory = $salesSetupFactory;
    }

    protected function getCustomOrderType()
    {
        return [
            'label' => 'Custom order type',
            'type' => 'int',
            'input' => 'boolean',
            'required' => false,
            'sort_order' => 125,
            'position' => 125,
            'system' => false,
            'is_user_defined',
            'visible' => false,
            'visible_on_front' => false,
        ];
    }

    protected function addAttributeToAllForm($attributeId)
    {
        foreach ([
                     'adminhtml_customer_address',
                     'customer_address_edit',
                     'customer_register_address',
                 ] as $formCode) {
            $this->setup->getConnection()
                ->insertMultiple(
                    $this->setup->getTable('customer_form_attribute'),
                    ['form_code' => $formCode, 'attribute_id' => $attributeId]
                );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $this->setup = $setup;
        $setup->startSetup();

        $this->eavSetupFactory->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'custom_order_type',
            $this->getCustomOrderType()
        );
        $this->quoteSetupFactory->addAttribute(
            'quote_address',
            'custom_order_type',
            ['type' => Table::TYPE_INTEGER,             'visible' => false,
                'visible_on_front' => false, ]
        );
        $this->salesSetupFactory->addAttribute(
            'order_address',
            'custom_order_type',
            ['type' => Table::TYPE_INTEGER,             'visible' => false,
                'visible_on_front' => false, ]
        );
    }
}
