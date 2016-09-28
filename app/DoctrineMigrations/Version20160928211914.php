<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160928211914 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, hall_movie_show_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, chair_number INT NOT NULL, INDEX IDX_54469DF4C9E05A30 (hall_movie_show_id_id), INDEX IDX_54469DF49D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4C9E05A30 FOREIGN KEY (hall_movie_show_id_id) REFERENCES hall_movie_show (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF49D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE halls CHANGE row_charis row_chairs INT NOT NULL');
        $this->addSql('ALTER TABLE hall_movie_show ADD price NUMERIC(10, 0) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tickets');
        $this->addSql('ALTER TABLE hall_movie_show DROP price');
        $this->addSql('ALTER TABLE halls CHANGE row_chairs row_charis INT NOT NULL');
    }
}
