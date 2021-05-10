<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210512203149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD titre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE projet DROP date_debut');
        $this->addSql('ALTER TABLE projet DROP date_fin');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projet ADD date_debut DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD date_fin DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE projet DROP titre');
        $this->addSql('ALTER TABLE projet DROP description');
    }
}
