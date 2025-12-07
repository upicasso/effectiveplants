<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251207095729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nutrition_profile_element DROP FOREIGN KEY FK_E4231E7E6B62BE2F');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP FOREIGN KEY FK_E4231E7E8288BF5B');
        $this->addSql('DROP INDEX IDX_E4231E7E6B62BE2F ON nutrition_profile_element');
        $this->addSql('DROP INDEX IDX_E4231E7E8288BF5B ON nutrition_profile_element');
        $this->addSql('ALTER TABLE nutrition_profile_element DROP nutrition_profile_id, DROP fertilizer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nutrition_profile_element ADD nutrition_profile_id INT DEFAULT NULL, ADD fertilizer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD CONSTRAINT FK_E4231E7E6B62BE2F FOREIGN KEY (nutrition_profile_id) REFERENCES nutrition_profile (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nutrition_profile_element ADD CONSTRAINT FK_E4231E7E8288BF5B FOREIGN KEY (fertilizer_id) REFERENCES fertilizer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E4231E7E6B62BE2F ON nutrition_profile_element (nutrition_profile_id)');
        $this->addSql('CREATE INDEX IDX_E4231E7E8288BF5B ON nutrition_profile_element (fertilizer_id)');
    }
}
