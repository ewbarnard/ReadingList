<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Titles Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\PublishersTable|\Cake\ORM\Association\BelongsTo $Publishers
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsToMany $Authors
 *
 * @method \App\Model\Entity\Title get($primaryKey, $options = [])
 * @method \App\Model\Entity\Title newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Title[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Title|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Title patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Title[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Title findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TitlesTable extends Table
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

        $this->setTable('titles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Authors', [
            'foreignKey' => 'title_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'authors_titles'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('subtitle')
            ->maxLength('subtitle', 255)
            ->requirePresence('subtitle', 'create')
            ->notEmpty('subtitle');

        $validator
            ->scalar('url')
            ->maxLength('url', 1000)
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->scalar('note')
            ->maxLength('note', 2000)
            ->requirePresence('note', 'create')
            ->notEmpty('note');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));

        return $rules;
    }
}
