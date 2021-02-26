<?php

declare(strict_types=1);

namespace DoctrineMigrations;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200729101330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_year (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_school_year (student_id INT NOT NULL, school_year_id INT NOT NULL, INDEX IDX_2D4AA1D9CB944F1A (student_id), INDEX IDX_2D4AA1D9D2EECC3F (school_year_id), PRIMARY KEY(student_id, school_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_tag (student_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_95F4B225CB944F1A (student_id), INDEX IDX_95F4B225BAD26311 (tag_id), PRIMARY KEY(student_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_project (student_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_C2856516CB944F1A (student_id), INDEX IDX_C2856516166D1F9C (project_id), PRIMARY KEY(student_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_school_year ADD CONSTRAINT FK_2D4AA1D9CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_school_year ADD CONSTRAINT FK_2D4AA1D9D2EECC3F FOREIGN KEY (school_year_id) REFERENCES school_year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_tag ADD CONSTRAINT FK_95F4B225CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_tag ADD CONSTRAINT FK_95F4B225BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_project ADD CONSTRAINT FK_C2856516CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_project ADD CONSTRAINT FK_C2856516166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
    }
    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_project DROP FOREIGN KEY FK_C2856516166D1F9C');
        $this->addSql('ALTER TABLE student_school_year DROP FOREIGN KEY FK_2D4AA1D9D2EECC3F');
        $this->addSql('ALTER TABLE student_school_year DROP FOREIGN KEY FK_2D4AA1D9CB944F1A');
        $this->addSql('ALTER TABLE student_tag DROP FOREIGN KEY FK_95F4B225CB944F1A');
        $this->addSql('ALTER TABLE student_project DROP FOREIGN KEY FK_C2856516CB944F1A');
        $this->addSql('ALTER TABLE student_tag DROP FOREIGN KEY FK_95F4B225BAD26311');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE school_year');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_school_year');
        $this->addSql('DROP TABLE student_tag');
        $this->addSql('DROP TABLE student_project');
        $this->addSql('DROP TABLE tag');
    }
}
