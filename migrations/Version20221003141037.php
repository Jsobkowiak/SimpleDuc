<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003141037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salarié ADD bulletin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salarié ADD CONSTRAINT FK_78B598EED1AAB236 FOREIGN KEY (bulletin_id) REFERENCES bulletin_de_paie (id)');
        $this->addSql('CREATE INDEX IDX_78B598EED1AAB236 ON salarié (bulletin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salarié DROP FOREIGN KEY FK_78B598EED1AAB236');
        $this->addSql('DROP INDEX IDX_78B598EED1AAB236 ON salarié');
        $this->addSql('ALTER TABLE salarié DROP bulletin_id');
    }
}
