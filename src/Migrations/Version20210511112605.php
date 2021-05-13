<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511112605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE projet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE projet (id INT NOT NULL, experience_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, sujet VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_50159CA946E90E27 ON projet (experience_id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA946E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE projet_id_seq CASCADE');
        $this->addSql('DROP TABLE projet');
    }
}
