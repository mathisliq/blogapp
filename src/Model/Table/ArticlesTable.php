<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
        $this->hasMany('Comments', [
            'dependent' => true,
        ]);
    }

    public function validationDefault(Validator $validator): validator {
        $validator
                ->notEmptyString('title', message: "Vous devez renseigner un titre")
                ->maxLength('title', 255)
                ->notEmptyString('content', message: "Vous devez renseigner un contenu");
        return $validator;
    }

}
