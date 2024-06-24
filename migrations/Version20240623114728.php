<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240623114728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(180) NOT NULL, description CLOB NOT NULL, image_url CLOB DEFAULT NULL, video_url CLOB DEFAULT NULL, is_published BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , news_category VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE product_categories (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_name VARCHAR(180) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , product_category VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_category_id INTEGER DEFAULT NULL, name VARCHAR(180) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, is_published BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_B3BA5A5ABE6903FD FOREIGN KEY (product_category_id) REFERENCES product_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5ABE6903FD ON products (product_category_id)');
        $this->addSql('CREATE TABLE promotions (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , limit_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , image_url CLOB DEFAULT NULL, video_url CLOB DEFAULT NULL, is_published BOOLEAN NOT NULL, promotion_limit_date VARCHAR(255) NOT NULL, CONSTRAINT FK_EA1B30344584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EA1B30344584665A ON promotions (product_id)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE product_categories');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP TABLE "user"');
    }
}
