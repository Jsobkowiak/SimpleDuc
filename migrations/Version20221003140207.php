<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003140207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD taches_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9B8A61670 FOREIGN KEY (taches_id) REFERENCES tache (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9B8A61670 ON projet (taches_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9B8A61670');
        $this->addSql('DROP INDEX IDX_50159CA9B8A61670 ON projet');
        $this->addSql('ALTER TABLE projet DROP taches_id');
    }
}
