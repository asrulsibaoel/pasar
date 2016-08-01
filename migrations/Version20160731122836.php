<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160731122836 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $product = $schema->createTable(Table::PRODUCT);

        $product->addColumn('id', 'string', ['length' => 36]);
        $product->addColumn('product_name', 'string', ['length' => 30])->setNotnull(false);
        $product->addColumn('category_id', 'string', ['length' => 36]);
        $product->addColumn('lapak_id', 'string', ['length' => 36]);
        $product->addColumn('price', 'integer', ['length' => 15]);
        $product->addColumn('description', 'text', [])->setNotnull(false);
        $product->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable(Table::PRODUCT);
    }
}
