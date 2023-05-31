<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertComments extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up() {
        $this->execute('INSERT INTO comments VALUES 
              (1, \'Mon titre 1\', \'contenu 1\',1 ,1,now())
         ');    
    }
    public function down(){
         $this->execute('DELETE from comments');
    }
}
