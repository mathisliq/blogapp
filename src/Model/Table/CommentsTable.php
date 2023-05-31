<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Articles');
         $this->belongsTo('Users');
    }

    public function validationDefault(Validator $validator): validator {
        $validator
                ->notEmptyString('title', message: "Vous devez renseigner un titre")
                ->maxLength('title', 255)
                ->notEmptyString('content', message: "Vous devez renseigner un contenu")
                ->nonNegativeInteger('article_id', message: "Vous devez renseigner un article correct");
        return $validator;
    }

}
