<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206185233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE barrack (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, race VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_start DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE barrack_galaxy (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT DEFAULT NULL, barrack_id INT DEFAULT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_upgrade DATETIME NOT NULL, is_owned TINYINT(1) NOT NULL, INDEX IDX_45FC8088B61FAB2 (galaxy_id), INDEX IDX_45FC8088801FC371 (barrack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_start DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE building_user (id INT AUTO_INCREMENT NOT NULL, building_id INT NOT NULL, galaxy_id INT DEFAULT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_metals INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, research_required INT NOT NULL, level INT NOT NULL, time_upgrade INT NOT NULL, INDEX IDX_2BB7A11D4D2A7E12 (building_id), INDEX IDX_2BB7A11DB61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galaxy (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, metals TINYINT(1) NOT NULL, gold TINYINT(1) NOT NULL, orinia TINYINT(1) NOT NULL, orinium TINYINT(1) NOT NULL, exotium TINYINT(1) NOT NULL, energon TINYINT(1) NOT NULL, INDEX IDX_F6BB13768D93D649 (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gate_galaxy (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, galaxy_connected_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, date_open DATETIME DEFAULT NULL, date_actually DATETIME DEFAULT NULL, exploration TINYINT(1) NOT NULL, protected TINYINT(1) NOT NULL, INDEX IDX_8BED4A94B61FAB2 (galaxy_id), INDEX IDX_8BED4A9428FEBC42 (galaxy_connected_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hangar (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, race VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_start DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hangar_galaxy (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT DEFAULT NULL, hangar_id INT DEFAULT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_upgrade DATETIME NOT NULL, is_owned TINYINT(1) NOT NULL, INDEX IDX_EE63E560B61FAB2 (galaxy_id), INDEX IDX_EE63E5602FEFB5A5 (hangar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mine_galaxy (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT DEFAULT NULL, worker_metals INT DEFAULT NULL, slave_metals INT DEFAULT NULL, worker_gold INT DEFAULT NULL, slave_gold INT DEFAULT NULL, worker_orinia INT DEFAULT NULL, slave_orinia INT DEFAULT NULL, worker_orinium INT DEFAULT NULL, slave_orinium INT DEFAULT NULL, INDEX IDX_437B9A0BB61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE population (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, worker INT NOT NULL, slave INT NOT NULL, population INT NOT NULL, warrior INT NOT NULL, pilot INT NOT NULL, civil INT NOT NULL, scientist INT NOT NULL, UNIQUE INDEX UNIQ_B449A008B61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE population_production (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, product_population INT NOT NULL, UNIQUE INDEX UNIQ_83B0C70DB61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, galaxy_id INT NOT NULL, metals INT NOT NULL, gold INT NOT NULL, orinia INT NOT NULL, orinium INT NOT NULL, energy INT NOT NULL, UNIQUE INDEX UNIQ_BC91F416B61FAB2 (galaxy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, race VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, price_metals INT NOT NULL, time_start DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology_user (id INT AUTO_INCREMENT NOT NULL, technology_id INT NOT NULL, user_id INT NOT NULL, price_gold INT NOT NULL, price_orinia INT NOT NULL, price_metals INT NOT NULL, price_orinium INT NOT NULL, price_energy INT NOT NULL, research_required INT NOT NULL, level INT NOT NULL, time_upgrade INT NOT NULL, INDEX IDX_2B90AC434235D463 (technology_id), INDEX IDX_2B90AC43A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, planet_selected_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, race VARCHAR(255) NOT NULL, joy INT NOT NULL, points INT NOT NULL, user_rank VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649681FADBC (planet_selected_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE barrack_galaxy ADD CONSTRAINT FK_45FC8088B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE barrack_galaxy ADD CONSTRAINT FK_45FC8088801FC371 FOREIGN KEY (barrack_id) REFERENCES barrack (id)');
        $this->addSql('ALTER TABLE building_user ADD CONSTRAINT FK_2BB7A11D4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE building_user ADD CONSTRAINT FK_2BB7A11DB61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE galaxy ADD CONSTRAINT FK_F6BB13768D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE gate_galaxy ADD CONSTRAINT FK_8BED4A94B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE gate_galaxy ADD CONSTRAINT FK_8BED4A9428FEBC42 FOREIGN KEY (galaxy_connected_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE hangar_galaxy ADD CONSTRAINT FK_EE63E560B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE hangar_galaxy ADD CONSTRAINT FK_EE63E5602FEFB5A5 FOREIGN KEY (hangar_id) REFERENCES hangar (id)');
        $this->addSql('ALTER TABLE mine_galaxy ADD CONSTRAINT FK_437B9A0BB61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE population ADD CONSTRAINT FK_B449A008B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE population_production ADD CONSTRAINT FK_83B0C70DB61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE resource ADD CONSTRAINT FK_BC91F416B61FAB2 FOREIGN KEY (galaxy_id) REFERENCES galaxy (id)');
        $this->addSql('ALTER TABLE technology_user ADD CONSTRAINT FK_2B90AC434235D463 FOREIGN KEY (technology_id) REFERENCES technology (id)');
        $this->addSql('ALTER TABLE technology_user ADD CONSTRAINT FK_2B90AC43A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649681FADBC FOREIGN KEY (planet_selected_id) REFERENCES galaxy (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE barrack_galaxy DROP FOREIGN KEY FK_45FC8088B61FAB2');
        $this->addSql('ALTER TABLE barrack_galaxy DROP FOREIGN KEY FK_45FC8088801FC371');
        $this->addSql('ALTER TABLE building_user DROP FOREIGN KEY FK_2BB7A11D4D2A7E12');
        $this->addSql('ALTER TABLE building_user DROP FOREIGN KEY FK_2BB7A11DB61FAB2');
        $this->addSql('ALTER TABLE galaxy DROP FOREIGN KEY FK_F6BB13768D93D649');
        $this->addSql('ALTER TABLE gate_galaxy DROP FOREIGN KEY FK_8BED4A94B61FAB2');
        $this->addSql('ALTER TABLE gate_galaxy DROP FOREIGN KEY FK_8BED4A9428FEBC42');
        $this->addSql('ALTER TABLE hangar_galaxy DROP FOREIGN KEY FK_EE63E560B61FAB2');
        $this->addSql('ALTER TABLE hangar_galaxy DROP FOREIGN KEY FK_EE63E5602FEFB5A5');
        $this->addSql('ALTER TABLE mine_galaxy DROP FOREIGN KEY FK_437B9A0BB61FAB2');
        $this->addSql('ALTER TABLE population DROP FOREIGN KEY FK_B449A008B61FAB2');
        $this->addSql('ALTER TABLE population_production DROP FOREIGN KEY FK_83B0C70DB61FAB2');
        $this->addSql('ALTER TABLE resource DROP FOREIGN KEY FK_BC91F416B61FAB2');
        $this->addSql('ALTER TABLE technology_user DROP FOREIGN KEY FK_2B90AC434235D463');
        $this->addSql('ALTER TABLE technology_user DROP FOREIGN KEY FK_2B90AC43A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649681FADBC');
        $this->addSql('DROP TABLE barrack');
        $this->addSql('DROP TABLE barrack_galaxy');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE building_user');
        $this->addSql('DROP TABLE galaxy');
        $this->addSql('DROP TABLE gate_galaxy');
        $this->addSql('DROP TABLE hangar');
        $this->addSql('DROP TABLE hangar_galaxy');
        $this->addSql('DROP TABLE mine_galaxy');
        $this->addSql('DROP TABLE population');
        $this->addSql('DROP TABLE population_production');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE technology_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
