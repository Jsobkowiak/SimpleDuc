<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003134649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe_projet (equipe_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_5D22FA016D861B89 (equipe_id), INDEX IDX_5D22FA01C18272 (projet_id), PRIMARY KEY(equipe_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe_projet ADD CONSTRAINT FK_5D22FA016D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe_projet ADD CONSTRAINT FK_5D22FA01C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe_projet DROP FOREIGN KEY FK_5D22FA016D861B89');
        $this->addSql('ALTER TABLE equipe_projet DROP FOREIGN KEY FK_5D22FA01C18272');
        $this->addSql('DROP TABLE equipe_projet');
    }
}
