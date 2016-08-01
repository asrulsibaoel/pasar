<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160731125240 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $lapak = $schema->createTable(Table::LAPAK);

        $lapak->addColumn('id', 'string', ['length' => 36]);
        $lapak->addColumn('pasar_id', 'string', ['length' => 36]);
        $lapak->addColumn('user_id', 'string', ['length' => 36]);
        $lapak->addColumn('lapak_name', 'string', ['length' => 30]);
        $lapak->addColumn('description', 'text', []);

        $lapak->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable(Table::LAPAK);
    }
}
