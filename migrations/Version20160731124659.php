<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160731124659 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs

        $pasar = $schema->createTable(Table::PASAR);

        $pasar->addColumn('id', 'string', ['length' => 36]);
        $pasar->addColumn('pasar_name', 'string', ['length' => 36]);
        $pasar->addColumn('description', 'text', [])->setNotnull(false);
        $pasar->addColumn('lat', 'string', ['length' => 36])->setNotnull(false);
        $pasar->addColumn('long', 'string', ['length' => 36])->setNotnull(false);
        $pasar->addColumn('image', 'text', [])->setNotnull(false);

        $pasar->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
