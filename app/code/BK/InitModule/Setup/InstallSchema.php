<?php

namespace BK\InitModule\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $context->getVersion();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('bk_labels')
        )->addColumn(
            'label_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true],
            'ID'
        )->addColumn(
            'label_title',
            Table::TYPE_TEXT,
            255,
            [],
            'Title'
        )->addColumn(
            'label_content',
            Table::TYPE_TEXT,
            255,
            [],
            'Content'
        )->setComment(
            'table related comments'
        );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}
