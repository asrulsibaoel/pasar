<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160713041827 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $kategori = $schema->createTable(Table::KATEGORI);
        $kategori->addColumn('id', 'string', ['length' => 36]);
        $kategori->addColumn('nama_kategori', 'string', ['length' => 30]);
        $kategori->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable(Table::KATEGORI);
    }
}
