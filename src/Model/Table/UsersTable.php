<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->hasMany('Articles');
        $this->hasMany('Comments');
    }

    public function validationDefault(Validator $validator): validator {
        $validator
                ->notEmptyString('username', message: "Vous devez renseigner un username")
                ->notEmptyString('password', message: "Vous devez renseigner un mot de passe")
                ->notEmptyString('name', message: "Vous devez renseigner un prénom")
                ->notEmptyString('lastname', message: "Vous devez renseigner un nom")
                ->email('email', message: "Vous devez renseigner un email correct")
                ->nonNegativeInteger('age', message: "Vous devez renseigner un age correct")
                ->add('username', 'unique', 
                        ['rule' => 'validateUnique', 
                            'provider' => 'table',
                            'message'=> "le username doit etre unique"])
                ->add('email', 'unique', 
                        ['rule' => 'validateUnique', 
                            'provider' => 'table',
                            'message'=> "l'email doit etre unique"])
                ;
        return $validator;
    }

}
