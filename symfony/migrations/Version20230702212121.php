<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230702212121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_valuation (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL, business_sector VARCHAR(255) NOT NULL, reason_for_valuation VARCHAR(255) NOT NULL, tenure VARCHAR(255) NOT NULL, annual_turnover INT NOT NULL, net_profit INT NOT NULL, assets_value INT NOT NULL, property_freehold_value INT NOT NULL, business_postcode VARCHAR(255) NOT NULL, metric_data_serialised VARCHAR(255) NOT NULL, estimated_value_lower INT NOT NULL, estimated_value_upper INT NOT NULL, estimated_value_met_expectations VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE business_valuation');
    }
}
