<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109135418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_90D3F060E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ateliers (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, label VARCHAR(50) NOT NULL, descriptif LONGTEXT NOT NULL, niveau VARCHAR(150) NOT NULL, horaire VARCHAR(100) NOT NULL, lieu VARCHAR(255) NOT NULL, debut_saison DATETIME NOT NULL, fin_saison DATETIME NOT NULL, INDEX IDX_FDCA8C9C82E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, titre VARCHAR(50) NOT NULL, descriptif LONGTEXT NOT NULL, date DATETIME NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, INDEX IDX_E10AD400FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos_adherent (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, nom VARCHAR(150) NOT NULL, prenom VARCHAR(100) NOT NULL, telephone VARCHAR(20) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, pratique VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_4602EB6325F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos_asso (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, telephone VARCHAR(20) NOT NULL, mail VARCHAR(200) NOT NULL, siege VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, cours_id INT NOT NULL, evenement_id INT NOT NULL, titre VARCHAR(70) NOT NULL, chemin VARCHAR(255) NOT NULL, taille INT NOT NULL, INDEX IDX_12D2AF817ECF78B0 (cours_id), INDEX IDX_12D2AF81FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membres_equipe (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, fonction VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_C184283225F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participants (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_7169709225F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participants_cours (participants_id INT NOT NULL, cours_id INT NOT NULL, INDEX IDX_CD938D69838709D5 (participants_id), INDEX IDX_CD938D697ECF78B0 (cours_id), PRIMARY KEY(participants_id, cours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participants_evenements (participants_id INT NOT NULL, evenements_id INT NOT NULL, INDEX IDX_65494F84838709D5 (participants_id), INDEX IDX_65494F8463C02CD4 (evenements_id), PRIMARY KEY(participants_id, evenements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seances (id INT AUTO_INCREMENT NOT NULL, cours_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, infos LONGTEXT DEFAULT NULL, INDEX IDX_FC699FF17ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifs (id INT AUTO_INCREMENT NOT NULL, formule VARCHAR(255) NOT NULL, prix VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C82E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers (id)');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD400FD02F13 FOREIGN KEY (evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE infos_adherent ADD CONSTRAINT FK_4602EB6325F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF817ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF81FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE membres_equipe ADD CONSTRAINT FK_C184283225F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT FK_7169709225F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE participants_cours ADD CONSTRAINT FK_CD938D69838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_cours ADD CONSTRAINT FK_CD938D697ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_evenements ADD CONSTRAINT FK_65494F84838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_evenements ADD CONSTRAINT FK_65494F8463C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seances ADD CONSTRAINT FK_FC699FF17ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C82E2CF35');
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD400FD02F13');
        $this->addSql('ALTER TABLE infos_adherent DROP FOREIGN KEY FK_4602EB6325F06C53');
        $this->addSql('ALTER TABLE medias DROP FOREIGN KEY FK_12D2AF817ECF78B0');
        $this->addSql('ALTER TABLE medias DROP FOREIGN KEY FK_12D2AF81FD02F13');
        $this->addSql('ALTER TABLE membres_equipe DROP FOREIGN KEY FK_C184283225F06C53');
        $this->addSql('ALTER TABLE participants DROP FOREIGN KEY FK_7169709225F06C53');
        $this->addSql('ALTER TABLE participants_cours DROP FOREIGN KEY FK_CD938D69838709D5');
        $this->addSql('ALTER TABLE participants_cours DROP FOREIGN KEY FK_CD938D697ECF78B0');
        $this->addSql('ALTER TABLE participants_evenements DROP FOREIGN KEY FK_65494F84838709D5');
        $this->addSql('ALTER TABLE participants_evenements DROP FOREIGN KEY FK_65494F8463C02CD4');
        $this->addSql('ALTER TABLE seances DROP FOREIGN KEY FK_FC699FF17ECF78B0');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE ateliers');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE infos_adherent');
        $this->addSql('DROP TABLE infos_asso');
        $this->addSql('DROP TABLE medias');
        $this->addSql('DROP TABLE membres_equipe');
        $this->addSql('DROP TABLE participants');
        $this->addSql('DROP TABLE participants_cours');
        $this->addSql('DROP TABLE participants_evenements');
        $this->addSql('DROP TABLE seances');
        $this->addSql('DROP TABLE tarifs');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
