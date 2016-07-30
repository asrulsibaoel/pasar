<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160713042926 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $konten = $schema->createTable(Table::KONTEN);
        $konten->addColumn('id', 'string', ['length' => 36]);
        $konten->addColumn('judul_posting', 'string', ['length' => 30]);
        $konten->addColumn('detail_posting', 'text', []);
        $konten->addColumn('tgl_posting', 'datetime');
        $konten->addColumn('harga', 'integer', ['length' => 30]);
        $konten->addColumn('id_kategori', 'string', ['length' => 36]);
        $konten->addColumn('id_register', 'string', ['length' => 36]);
        $konten->addColumn('media', 'text', []);
        $konten->addColumn('likers', 'text', []);
        $konten->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable(Table::KONTEN);
    }
}
