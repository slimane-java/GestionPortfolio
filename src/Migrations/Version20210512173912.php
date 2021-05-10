<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512173912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP CONSTRAINT fk_50159ca946e90e27');
        $this->addSql('DROP SEQUENCE experience_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE experiences_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE experiences (id INT NOT NULL, client_id INT NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, actuellement BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_82020E7019EB6921 ON experiences (client_id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E7019EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP INDEX idx_50159ca946e90e27');
        $this->addSql('ALTER TABLE projet ADD experiences_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet DROP experience_id');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_50159CA9423DE140 ON projet (experiences_id)');
        $this->addSql('ALTER TABLE type_competence DROP CONSTRAINT fk_89d7be5a15761dab');
        $this->addSql('DROP INDEX idx_89d7be5a15761dab');
        $this->addSql('ALTER TABLE type_competence RENAME COLUMN competence_id TO competences_id');
        $this->addSql('ALTER TABLE type_competence ADD CONSTRAINT FK_89D7BE5AA660B158 FOREIGN KEY (competences_id) REFERENCES competence (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_89D7BE5AA660B158 ON type_competence (competences_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projet DROP CONSTRAINT FK_50159CA9423DE140');
        $this->addSql('DROP SEQUENCE experiences_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE experience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE experience (id INT NOT NULL, client_id INT NOT NULL, post VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, nom_entreprise VARCHAR(255) DEFAULT NULL, email_entreprise VARCHAR(255) DEFAULT NULL, description_entreprise VARCHAR(255) DEFAULT NULL, function VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_590c10319eb6921 ON experience (client_id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT fk_590c10319eb6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP INDEX IDX_50159CA9423DE140');
        $this->addSql('ALTER TABLE projet ADD experience_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet DROP experiences_id');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT fk_50159ca946e90e27 FOREIGN KEY (experience_id) REFERENCES experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_50159ca946e90e27 ON projet (experience_id)');
        $this->addSql('ALTER TABLE type_competence DROP CONSTRAINT FK_89D7BE5AA660B158');
        $this->addSql('DROP INDEX IDX_89D7BE5AA660B158');
        $this->addSql('ALTER TABLE type_competence RENAME COLUMN competences_id TO competence_id');
        $this->addSql('ALTER TABLE type_competence ADD CONSTRAINT fk_89d7be5a15761dab FOREIGN KEY (competence_id) REFERENCES competence (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_89d7be5a15761dab ON type_competence (competence_id)');
    }
}
