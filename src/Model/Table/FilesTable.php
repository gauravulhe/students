<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


class FilesTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
	}

}

?>