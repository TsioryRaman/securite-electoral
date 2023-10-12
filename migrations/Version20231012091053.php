<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012091053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate ADD electeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44E0557D80 FOREIGN KEY (electeur_id) REFERENCES electeur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E44E0557D80 ON candidate (electeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44E0557D80');
        $this->addSql('DROP INDEX UNIQ_C8B28E44E0557D80 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP electeur_id');
    }
}
