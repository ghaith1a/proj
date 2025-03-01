<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250301121757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ratings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, cours_id INT NOT NULL, value INT NOT NULL, INDEX IDX_CEB607C9A76ED395 (user_id), INDEX IDX_CEB607C97ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C97ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE cours DROP rating, CHANGE support_c support_c VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C9A76ED395');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C97ECF78B0');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('ALTER TABLE cours ADD rating INT NOT NULL, CHANGE support_c support_c VARCHAR(255) NOT NULL');
    }
}
