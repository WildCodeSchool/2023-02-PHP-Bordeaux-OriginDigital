<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612090110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED929C1004E');
        $this->addSql('DROP INDEX IDX_68C58ED929C1004E ON favorite');
        $this->addSql('ALTER TABLE favorite DROP video_id, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE video ADD favorite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CAA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CAA17481D ON video (favorite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite ADD video_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED929C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_68C58ED929C1004E ON favorite (video_id)');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CAA17481D');
        $this->addSql('DROP INDEX IDX_7CC7DA2CAA17481D ON video');
        $this->addSql('ALTER TABLE video DROP favorite_id');
    }
}
