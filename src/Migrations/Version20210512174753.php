<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512174753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD experiences_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet DROP experience_id');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_50159CA9423DE140 ON projet (experiences_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projet DROP CONSTRAINT FK_50159CA9423DE140');
        $this->addSql('DROP INDEX IDX_50159CA9423DE140');
        $this->addSql('ALTER TABLE projet ADD experience_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet DROP experiences_id');
    }
}
