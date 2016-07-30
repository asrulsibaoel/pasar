<?php

namespace App\Migrations;

use App\Projection\Table;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160712014332 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $user = $schema->createTable(Table::USER);

        $user->addColumn('id', 'string', ['length' => 36]);
        $user->addColumn('nama_perusahaan', 'string', [
            'length' => 40,
        ])->setNotnull(false);
        $user->addColumn('alamat', 'string', ['length' => 50])->setNotnull(false);
        $user->addColumn('no_tlp', 'integer', ['length' => 12])->setNotnull(false);
        $user->addColumn('no_hp', 'integer', ['length' => 12])->setNotnull(false);
        $user->addColumn('npwp', 'string', ['length' => 50])->setNotnull(false);
        $user->addColumn('profile_usaha', 'string', ['length' => 100])->setNotnull(false);
        $user->addColumn('email', 'string', ['length' => 30]);
        $user->addColumn('username', 'string', ['length' => 30])->setNotnull(false);
        $user->addColumn('password', 'string', ['length' => 64]);
        $user->addColumn('status', 'string', ['length' => 10])->setNotnull(false);
        $user->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable(Table::USER);
    }
}
