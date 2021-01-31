<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128124617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE electricity ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE electricity ADD CONSTRAINT FK_FBF9C3DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_FBF9C3DA76ED395 ON electricity (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE electricity DROP FOREIGN KEY FK_FBF9C3DA76ED395');
        $this->addSql('DROP INDEX IDX_FBF9C3DA76ED395 ON electricity');
        $this->addSql('ALTER TABLE electricity DROP user_id');
    }
}
