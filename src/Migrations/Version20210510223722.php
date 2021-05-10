<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510223722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE competence_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE competence (id INT NOT NULL, client_id INT DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_94D4687F19EB6921 ON competence (client_id)');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, client_id INT NOT NULL, deplome VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, ecole VARCHAR(255) DEFAULT NULL, enabled BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_404021BF19EB6921 ON formation (client_id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE competence_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE formation');
    }
}
