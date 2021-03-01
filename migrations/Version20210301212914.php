<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301212914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE electricity (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created DATE NOT NULL, address VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, INDEX IDX_FBF9C3DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE installation (id INT AUTO_INCREMENT NOT NULL, material_id INT DEFAULT NULL, user_id INT DEFAULT NULL, created DATETIME NOT NULL, comment LONGTEXT DEFAULT NULL, code INT NOT NULL, INDEX IDX_1CBA6AB1E308AC6F (material_id), INDEX IDX_1CBA6AB1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, type_material_id INT DEFAULT NULL, user_id INT DEFAULT NULL, serial VARCHAR(255) NOT NULL, state TINYINT(1) DEFAULT NULL, INDEX IDX_7CBE7595A8117BFE (type_material_id), INDEX IDX_7CBE7595A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE electricity ADD CONSTRAINT FK_FBF9C3DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE installation ADD CONSTRAINT FK_1CBA6AB1E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE installation ADD CONSTRAINT FK_1CBA6AB1A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595A8117BFE FOREIGN KEY (type_material_id) REFERENCES type_material (id)');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE installation DROP FOREIGN KEY FK_1CBA6AB1E308AC6F');
        $this->addSql('ALTER TABLE material DROP FOREIGN KEY FK_7CBE7595A8117BFE');
        $this->addSql('ALTER TABLE electricity DROP FOREIGN KEY FK_FBF9C3DA76ED395');
        $this->addSql('ALTER TABLE installation DROP FOREIGN KEY FK_1CBA6AB1A76ED395');
        $this->addSql('ALTER TABLE material DROP FOREIGN KEY FK_7CBE7595A76ED395');
        $this->addSql('DROP TABLE electricity');
        $this->addSql('DROP TABLE installation');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE type_material');
        $this->addSql('DROP TABLE `user`');
    }
}
