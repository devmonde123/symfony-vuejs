<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190317235128 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mode ADD langues_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mode ADD CONSTRAINT FK_97CA47AB28EAE92 FOREIGN KEY (langues_id) REFERENCES language (id)');
        $this->addSql('CREATE INDEX IDX_97CA47AB28EAE92 ON mode (langues_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mode DROP FOREIGN KEY FK_97CA47AB28EAE92');
        $this->addSql('DROP INDEX IDX_97CA47AB28EAE92 ON mode');
        $this->addSql('ALTER TABLE mode DROP langues_id');
    }
}
