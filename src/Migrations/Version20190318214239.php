<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318214239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users_verbs (users_id INT NOT NULL, verbs_id INT NOT NULL, INDEX IDX_928DD49767B3B43D (users_id), INDEX IDX_928DD4979301BF8B (verbs_id), PRIMARY KEY(users_id, verbs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_verbs ADD CONSTRAINT FK_928DD49767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_verbs ADD CONSTRAINT FK_928DD4979301BF8B FOREIGN KEY (verbs_id) REFERENCES verbs (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE users_conjugaisons');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users_conjugaisons (users_id INT NOT NULL, conjugaisons_id INT NOT NULL, INDEX IDX_474AC20067B3B43D (users_id), INDEX IDX_474AC200B2F127AF (conjugaisons_id), PRIMARY KEY(users_id, conjugaisons_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users_conjugaisons ADD CONSTRAINT FK_474AC20067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_conjugaisons ADD CONSTRAINT FK_474AC200B2F127AF FOREIGN KEY (conjugaisons_id) REFERENCES conjugaisons (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE users_verbs');
    }
}
