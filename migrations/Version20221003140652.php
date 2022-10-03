<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003140652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE developpeur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developpeur_equipe (developpeur_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_8727D5CF84E66085 (developpeur_id), INDEX IDX_8727D5CF6D861B89 (equipe_id), PRIMARY KEY(developpeur_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE developpeur_equipe ADD CONSTRAINT FK_8727D5CF84E66085 FOREIGN KEY (developpeur_id) REFERENCES developpeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE developpeur_equipe ADD CONSTRAINT FK_8727D5CF6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developpeur_equipe DROP FOREIGN KEY FK_8727D5CF84E66085');
        $this->addSql('ALTER TABLE developpeur_equipe DROP FOREIGN KEY FK_8727D5CF6D861B89');
        $this->addSql('DROP TABLE developpeur');
        $this->addSql('DROP TABLE developpeur_equipe');
    }
}
