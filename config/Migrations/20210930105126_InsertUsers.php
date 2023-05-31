<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertUsers extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up() {
        $this->execute('INSERT INTO users VALUES 
              (1, \'toto\', \'tata\', 18, \'tototata@gmail.com\', \'toto974\', \'tata\', now(), now())
         ');    
    }
    public function down(){
         $this->execute('DELETE from users');
    }
}
