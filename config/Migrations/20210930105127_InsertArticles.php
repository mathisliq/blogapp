<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertArticles extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up() {
        $this->execute('INSERT INTO articles VALUES 
              (1, \'Mon super titre 1\', \'contenu 1\',1, now(), now()),
              (2, \'Mon super titre 2\', \'contenu 2\',1, now(), now()),
              (3, \'Mon super titre 3\', \'contenu 3\',1, now(), now()),
              (4, \'Mon super titre 4\', \'contenu 4\',1, now(), now()),
              (5, \'Mon super titre 5\', \'contenu 5\',1, now(), now())
         ');    
    }
    public function down(){
         $this->execute('DELETE from articles');
    }
}
