<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260510114951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE website (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(2048) NOT NULL, has_http_auth TINYINT DEFAULT NULL, http_auth_username VARCHAR(255) DEFAULT NULL, http_auth_password VARCHAR(255) DEFAULT NULL, admin_login_url VARCHAR(2048) DEFAULT NULL, server VARCHAR(255) DEFAULT NULL, notes LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE website');
    }
}
