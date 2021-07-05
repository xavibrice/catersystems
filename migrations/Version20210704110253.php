<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704110253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE state_electricity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE electricity ADD state_electricity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE electricity ADD CONSTRAINT FK_FBF9C3D655760A8 FOREIGN KEY (state_electricity_id) REFERENCES state_electricity (id)');
        $this->addSql('CREATE INDEX IDX_FBF9C3D655760A8 ON electricity (state_electricity_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE electricity DROP FOREIGN KEY FK_FBF9C3D655760A8');
        $this->addSql('DROP TABLE state_electricity');
        $this->addSql('DROP INDEX IDX_FBF9C3D655760A8 ON electricity');
        $this->addSql('ALTER TABLE electricity DROP state_electricity_id');
    }
}
