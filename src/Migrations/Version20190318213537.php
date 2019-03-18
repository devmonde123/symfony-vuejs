<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318213537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mode_temps (mode_id INT NOT NULL, temps_id INT NOT NULL, INDEX IDX_92289EDF77E5854A (mode_id), INDEX IDX_92289EDF3984CC5A (temps_id), PRIMARY KEY(mode_id, temps_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_conjugaisons (users_id INT NOT NULL, conjugaisons_id INT NOT NULL, INDEX IDX_474AC20067B3B43D (users_id), INDEX IDX_474AC200B2F127AF (conjugaisons_id), PRIMARY KEY(users_id, conjugaisons_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mode_temps ADD CONSTRAINT FK_92289EDF77E5854A FOREIGN KEY (mode_id) REFERENCES mode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mode_temps ADD CONSTRAINT FK_92289EDF3984CC5A FOREIGN KEY (temps_id) REFERENCES temps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_conjugaisons ADD CONSTRAINT FK_474AC20067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_conjugaisons ADD CONSTRAINT FK_474AC200B2F127AF FOREIGN KEY (conjugaisons_id) REFERENCES conjugaisons (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_conjugaisons DROP FOREIGN KEY FK_474AC20067B3B43D');
        $this->addSql('CREATE TABLE name (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE mode_temps');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_conjugaisons');
    }
}
