<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504101811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64992FC23A8 ON "user" (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A0D96FBF ON "user" (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649C05FB297 ON "user" (confirmation_token)');
        $this->addSql('COMMENT ON COLUMN "user".roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE client ADD username VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE client ADD username_canonical VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE client ADD email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE client ADD email_canonical VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE client ADD enabled BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE client ADD salt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD confirmation_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD roles TEXT NOT NULL');
        $this->addSql('ALTER TABLE client ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE client ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN client.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C744045592FC23A8 ON client (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A0D96FBF ON client (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455C05FB297 ON client (confirmation_token)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP INDEX UNIQ_C744045592FC23A8');
        $this->addSql('DROP INDEX UNIQ_C7440455A0D96FBF');
        $this->addSql('DROP INDEX UNIQ_C7440455C05FB297');
        $this->addSql('ALTER TABLE client DROP username');
        $this->addSql('ALTER TABLE client DROP username_canonical');
        $this->addSql('ALTER TABLE client DROP email');
        $this->addSql('ALTER TABLE client DROP email_canonical');
        $this->addSql('ALTER TABLE client DROP enabled');
        $this->addSql('ALTER TABLE client DROP salt');
        $this->addSql('ALTER TABLE client DROP password');
        $this->addSql('ALTER TABLE client DROP last_login');
        $this->addSql('ALTER TABLE client DROP confirmation_token');
        $this->addSql('ALTER TABLE client DROP password_requested_at');
        $this->addSql('ALTER TABLE client DROP roles');
        $this->addSql('ALTER TABLE client DROP created_at');
        $this->addSql('ALTER TABLE client DROP updated_at');
    }
}
