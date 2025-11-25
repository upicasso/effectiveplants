<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125140402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fertilizer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD fertilizer_id INT DEFAULT NULL, CHANGE nutrition_profile_id nutrition_profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD CONSTRAINT FK_E4231E7E8288BF5B FOREIGN KEY (fertilizer_id) REFERENCES fertilizer (id)');
        $this->addSql('CREATE INDEX IDX_E4231E7E8288BF5B ON nutrition_profile_element (fertilizer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nutrition_profile_element DROP FOREIGN KEY FK_E4231E7E8288BF5B');
        $this->addSql('DROP TABLE fertilizer');
        $this->addSql('DROP INDEX IDX_E4231E7E8288BF5B ON nutrition_profile_element');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP fertilizer_id, CHANGE nutrition_profile_id nutrition_profile_id INT NOT NULL');
    }
}
