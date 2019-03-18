<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190317234430 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mode DROP FOREIGN KEY FK_97CA47AB2AADBACD');
        $this->addSql('DROP INDEX IDX_97CA47AB2AADBACD ON mode');
        $this->addSql('ALTER TABLE mode DROP langue_id');
        $this->addSql('ALTER TABLE temps DROP FOREIGN KEY FK_60B4B72077E5854A');
        $this->addSql('DROP INDEX IDX_60B4B72077E5854A ON temps');
        $this->addSql('ALTER TABLE temps DROP mode_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mode ADD langue_id INT NOT NULL');
        $this->addSql('ALTER TABLE mode ADD CONSTRAINT FK_97CA47AB2AADBACD FOREIGN KEY (langue_id) REFERENCES language (id)');
        $this->addSql('CREATE INDEX IDX_97CA47AB2AADBACD ON mode (langue_id)');
        $this->addSql('ALTER TABLE temps ADD mode_id INT NOT NULL');
        $this->addSql('ALTER TABLE temps ADD CONSTRAINT FK_60B4B72077E5854A FOREIGN KEY (mode_id) REFERENCES mode (id)');
        $this->addSql('CREATE INDEX IDX_60B4B72077E5854A ON temps (mode_id)');
    }
}
