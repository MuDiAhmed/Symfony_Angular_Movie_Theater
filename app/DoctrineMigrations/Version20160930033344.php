<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160930033344 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF49D86650F');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4C9E05A30');
        $this->addSql('DROP INDEX IDX_54469DF4C9E05A30 ON tickets');
        $this->addSql('DROP INDEX IDX_54469DF49D86650F ON tickets');
        $this->addSql('ALTER TABLE tickets ADD hall_movie_show_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP user_id_id, DROP hall_movie_show_id_id');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF474D600B7 FOREIGN KEY (hall_movie_show_id) REFERENCES hall_movie_show (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_54469DF474D600B7 ON tickets (hall_movie_show_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4A76ED395 ON tickets (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF474D600B7');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('DROP INDEX IDX_54469DF474D600B7 ON tickets');
        $this->addSql('DROP INDEX IDX_54469DF4A76ED395 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD user_id_id INT DEFAULT NULL, ADD hall_movie_show_id_id INT DEFAULT NULL, DROP hall_movie_show_id, DROP user_id');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF49D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4C9E05A30 FOREIGN KEY (hall_movie_show_id_id) REFERENCES hall_movie_show (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4C9E05A30 ON tickets (hall_movie_show_id_id)');
        $this->addSql('CREATE INDEX IDX_54469DF49D86650F ON tickets (user_id_id)');
    }
}
