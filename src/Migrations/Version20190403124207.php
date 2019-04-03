<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190403124207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE picture (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', sharer_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, deleted TINYINT(1) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_16DB4F89B548B0F (path), INDEX IDX_16DB4F894EE63723 (sharer_id), INDEX creation_date (created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_user (picture_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', user_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_327353DCEE45BDBF (picture_id), INDEX IDX_327353DCA76ED395 (user_id), PRIMARY KEY(picture_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_tag (picture_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', tag_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_336D34B0EE45BDBF (picture_id), INDEX IDX_336D34B0BAD26311 (tag_id), PRIMARY KEY(picture_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', label VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_389B783EA750E8 (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, term_accepted TINYINT(1) DEFAULT NULL, active TINYINT(1) DEFAULT NULL, activation_token CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', deleted TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649B1B4826B (activation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894EE63723 FOREIGN KEY (sharer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE picture_user ADD CONSTRAINT FK_327353DCEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture_user ADD CONSTRAINT FK_327353DCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture_tag ADD CONSTRAINT FK_336D34B0EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture_tag ADD CONSTRAINT FK_336D34B0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture_user DROP FOREIGN KEY FK_327353DCEE45BDBF');
        $this->addSql('ALTER TABLE picture_tag DROP FOREIGN KEY FK_336D34B0EE45BDBF');
        $this->addSql('ALTER TABLE picture_tag DROP FOREIGN KEY FK_336D34B0BAD26311');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F894EE63723');
        $this->addSql('ALTER TABLE picture_user DROP FOREIGN KEY FK_327353DCA76ED395');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE picture_user');
        $this->addSql('DROP TABLE picture_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
