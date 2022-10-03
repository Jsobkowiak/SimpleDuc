<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003140934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD salarié_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15C7AE7FF3 FOREIGN KEY (salarié_id) REFERENCES salarié (id)');
        $this->addSql('CREATE INDEX IDX_2449BA15C7AE7FF3 ON equipe (salarié_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15C7AE7FF3');
        $this->addSql('DROP INDEX IDX_2449BA15C7AE7FF3 ON equipe');
        $this->addSql('ALTER TABLE equipe DROP salarié_id');
    }
}
