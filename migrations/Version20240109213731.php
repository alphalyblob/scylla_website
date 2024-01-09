<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109213731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD400FD02F13');
        $this->addSql('DROP INDEX IDX_E10AD400FD02F13 ON evenements');
        $this->addSql('ALTER TABLE evenements CHANGE evenement_id type_evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD40088939516 FOREIGN KEY (type_evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('CREATE INDEX IDX_E10AD40088939516 ON evenements (type_evenement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD40088939516');
        $this->addSql('DROP INDEX IDX_E10AD40088939516 ON evenements');
        $this->addSql('ALTER TABLE evenements CHANGE type_evenement_id evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD400FD02F13 FOREIGN KEY (evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('CREATE INDEX IDX_E10AD400FD02F13 ON evenements (evenement_id)');
    }
}
