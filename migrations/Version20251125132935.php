<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125132935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nutrition_profile (id INT AUTO_INCREMENT NOT NULL, name TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutrition_profile_element (id INT AUTO_INCREMENT NOT NULL, nutrition_profile_id INT NOT NULL, name VARCHAR(255) NOT NULL, mg INT NOT NULL, INDEX IDX_E4231E7E6B62BE2F (nutrition_profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD CONSTRAINT FK_E4231E7E6B62BE2F FOREIGN KEY (nutrition_profile_id) REFERENCES nutrition_profile (id)');
        $this->addSql('DROP TABLE nutrion_profile');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nutrion_profile (id INT AUTO_INCREMENT NOT NULL, name TINYINT(1) NOT NULL, phosphor TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP FOREIGN KEY FK_E4231E7E6B62BE2F');
        $this->addSql('DROP TABLE nutrition_profile');
        $this->addSql('DROP TABLE nutrition_profile_element');
    }
}
