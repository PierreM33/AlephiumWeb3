<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125110550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE galaxy (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_F6BB13768D93D649 (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE population (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, worker INT NOT NULL, slave INT NOT NULL, population INT NOT NULL, warrior INT NOT NULL, pilot INT NOT NULL, civil INT NOT NULL, scientist INT NOT NULL, UNIQUE INDEX UNIQ_B449A008B61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, metals INT NOT NULL, gold INT NOT NULL, orinia INT NOT NULL, orinium INT NOT NULL, energy INT NOT NULL, UNIQUE INDEX UNIQ_BC91F416B61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, race VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_start DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology_user (id INT AUTO_INCREMENT NOT NULL, technology_id INT NOT NULL, user_id INT NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_metals INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, research_required INT NOT NULL, level INT NOT NULL, time_upgrade INT NOT NULL, INDEX IDX_2B90AC434235D463 (technology_id), INDEX IDX_2B90AC43A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, planet_selected_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, race VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649681FADBC (planet_selected_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE galaxy ADD CONSTRAINT FK_F6BB13768D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE population ADD CONSTRAINT FK_B449A008B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE resource ADD CONSTRAINT FK_BC91F416B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE technology_user ADD CONSTRAINT FK_2B90AC434235D463 FOREIGN KEY (technology_id) REFERENCES technology (id)');
        $this->addSql('ALTER TABLE technology_user ADD CONSTRAINT FK_2B90AC43A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649681FADBC FOREIGN KEY (planet_selected_id) REFERENCES galaxy (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galaxy DROP FOREIGN KEY FK_F6BB13768D93D649');
        $this->addSql('ALTER TABLE population DROP FOREIGN KEY FK_B449A008B61FAB2');
        $this->addSql('ALTER TABLE resource DROP FOREIGN KEY FK_BC91F416B61FAB2');
        $this->addSql('ALTER TABLE technology_user DROP FOREIGN KEY FK_2B90AC434235D463');
        $this->addSql('ALTER TABLE technology_user DROP FOREIGN KEY FK_2B90AC43A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649681FADBC');
        $this->addSql('DROP TABLE galaxy');
        $this->addSql('DROP TABLE population');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE technology_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
