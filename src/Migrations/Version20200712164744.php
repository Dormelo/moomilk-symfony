<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200712164744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cow (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(60) NOT NULL, born_at DATETIME NOT NULL, matricule VARCHAR(10) NOT NULL, INDEX IDX_99D43F9CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE milking (id INT AUTO_INCREMENT NOT NULL, cow_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, quantity DOUBLE PRECISION NOT NULL, INDEX IDX_87BD04FA4B28B8CC (cow_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cow ADD CONSTRAINT FK_99D43F9CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE milking ADD CONSTRAINT FK_87BD04FA4B28B8CC FOREIGN KEY (cow_id) REFERENCES cow (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE milking DROP FOREIGN KEY FK_87BD04FA4B28B8CC');
        $this->addSql('ALTER TABLE cow DROP FOREIGN KEY FK_99D43F9CA76ED395');
        $this->addSql('DROP TABLE cow');
        $this->addSql('DROP TABLE milking');
        $this->addSql('DROP TABLE user');
    }
}
