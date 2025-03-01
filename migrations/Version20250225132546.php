<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225132546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours ADD rating INT NOT NULL, CHANGE support_c support_c VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE devoir CHANGE support_d support_d VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP rating, CHANGE support_c support_c VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE devoir CHANGE support_d support_d VARCHAR(255) DEFAULT NULL');
    }
}
