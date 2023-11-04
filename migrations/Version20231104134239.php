<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231104134239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module_classe (module_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_2584FFB9AFC2B591 (module_id), INDEX IDX_2584FFB98F5EA509 (classe_id), PRIMARY KEY(module_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE module_classe ADD CONSTRAINT FK_2584FFB9AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_classe ADD CONSTRAINT FK_2584FFB98F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module_classe DROP FOREIGN KEY FK_2584FFB9AFC2B591');
        $this->addSql('ALTER TABLE module_classe DROP FOREIGN KEY FK_2584FFB98F5EA509');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE module_classe');
    }
}
