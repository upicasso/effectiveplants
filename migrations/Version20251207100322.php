<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251207100322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fertiilizer_element (id INT AUTO_INCREMENT NOT NULL, fertilizer_id INT NOT NULL, name VARCHAR(255) NOT NULL, mg INT NOT NULL, INDEX IDX_6FF09398288BF5B (fertilizer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fertiilizer_element ADD CONSTRAINT FK_6FF09398288BF5B FOREIGN KEY (fertilizer_id) REFERENCES fertilizer (id)');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD nutrition_profile_id INT NOT NULL');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD CONSTRAINT FK_E4231E7E6B62BE2F FOREIGN KEY (nutrition_profile_id) REFERENCES nutrition_profile (id)');
        $this->addSql('CREATE INDEX IDX_E4231E7E6B62BE2F ON nutrition_profile_element (nutrition_profile_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fertiilizer_element DROP FOREIGN KEY FK_6FF09398288BF5B');
        $this->addSql('DROP TABLE fertiilizer_element');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP FOREIGN KEY FK_E4231E7E6B62BE2F');
        $this->addSql('DROP INDEX IDX_E4231E7E6B62BE2F ON nutrition_profile_element');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP nutrition_profile_id');
    }
}
