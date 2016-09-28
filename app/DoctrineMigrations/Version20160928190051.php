<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160928190051 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE halls (id INT AUTO_INCREMENT NOT NULL, row_charis INT NOT NULL, row_total INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hall_movie_show (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, hall_id INT DEFAULT NULL, show_id INT DEFAULT NULL, INDEX IDX_3B031F688F93B6FC (movie_id), INDEX IDX_3B031F6852AFCFD6 (hall_id), INDEX IDX_3B031F68D0C1FC64 (show_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shows (id INT AUTO_INCREMENT NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F688F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F6852AFCFD6 FOREIGN KEY (hall_id) REFERENCES halls (id)');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F68D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F6852AFCFD6');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F688F93B6FC');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F68D0C1FC64');
        $this->addSql('DROP TABLE halls');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE hall_movie_show');
        $this->addSql('DROP TABLE shows');
    }
}
