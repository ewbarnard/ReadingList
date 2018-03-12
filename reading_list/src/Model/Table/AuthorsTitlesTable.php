<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthorsTitles Model
 *
 * @property \App\Model\Table\TitlesTable|\Cake\ORM\Association\BelongsTo $Titles
 *
 * @method \App\Model\Entity\AuthorsTitle get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuthorsTitle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuthorsTitle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsTitle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuthorsTitle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsTitle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsTitle findOrCreate($search, callable $callback = null, $options = [])
 */
class AuthorsTitlesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('authors_titles');
        $this->setDisplayField('author_id');
        $this->setPrimaryKey(['author_id', 'title_id']);

        $this->belongsTo('Titles', [
            'foreignKey' => 'title_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('author_id')
            ->allowEmpty('author_id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['title_id'], 'Titles'));

        return $rules;
    }
}
