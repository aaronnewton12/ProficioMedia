<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704121627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_valuation ADD year_established VARCHAR(255) NOT NULL, ADD company_name VARCHAR(255) NOT NULL, CHANGE business_sector business_sector VARCHAR(255) NOT NULL, CHANGE reason_for_valuation reason_for_valuation VARCHAR(255) NOT NULL, CHANGE tenure tenure VARCHAR(255) NOT NULL, CHANGE annual_turnover annual_turnover INT NOT NULL, CHANGE net_profit net_profit INT NOT NULL, CHANGE assets_value assets_value INT NOT NULL, CHANGE property_freehold_value property_freehold_value INT NOT NULL, CHANGE business_postcode business_postcode VARCHAR(255) NOT NULL, CHANGE metric_data_serialised metric_data_serialised VARCHAR(255) NOT NULL, CHANGE estimated_value_lower estimated_value_lower INT NOT NULL, CHANGE estimated_value_upper estimated_value_upper INT NOT NULL, CHANGE estimated_value_met_expectations estimated_value_met_expectations VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_valuation DROP year_established, DROP company_name, CHANGE business_sector business_sector VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reason_for_valuation reason_for_valuation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tenure tenure VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annual_turnover annual_turnover INT DEFAULT NULL, CHANGE net_profit net_profit INT DEFAULT NULL, CHANGE assets_value assets_value INT DEFAULT NULL, CHANGE property_freehold_value property_freehold_value INT DEFAULT NULL, CHANGE business_postcode business_postcode VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE metric_data_serialised metric_data_serialised VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE estimated_value_lower estimated_value_lower INT DEFAULT NULL, CHANGE estimated_value_upper estimated_value_upper INT DEFAULT NULL, CHANGE estimated_value_met_expectations estimated_value_met_expectations VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
