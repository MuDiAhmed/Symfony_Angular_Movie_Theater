<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161002062229 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F6852AFCFD6');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F688F93B6FC');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F68D0C1FC64');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F6852AFCFD6 FOREIGN KEY (hall_id) REFERENCES halls (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F688F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F68D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F688F93B6FC');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F6852AFCFD6');
        $this->addSql('ALTER TABLE hall_movie_show DROP FOREIGN KEY FK_3B031F68D0C1FC64');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F688F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F6852AFCFD6 FOREIGN KEY (hall_id) REFERENCES halls (id)');
        $this->addSql('ALTER TABLE hall_movie_show ADD CONSTRAINT FK_3B031F68D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id)');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }
}
