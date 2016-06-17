<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160617165817 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE note ADD place_id INT NOT NULL, ADD image_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA143DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14DA6A219 ON note (place_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA143DA5256D ON note (image_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14DA6A219');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA143DA5256D');
        $this->addSql('DROP INDEX IDX_CFBDFA14DA6A219 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA143DA5256D ON note');
        $this->addSql('ALTER TABLE note DROP place_id, DROP image_id');
    }
}
