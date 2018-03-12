<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Title Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $category_id
 * @property int $publisher_id
 * @property string $name
 * @property string $subtitle
 * @property string $url
 * @property string $note
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Publisher $publisher
 * @property \App\Model\Entity\Author[] $authors
 */
class Title extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'project_id' => true,
        'category_id' => true,
        'publisher_id' => true,
        'name' => true,
        'subtitle' => true,
        'url' => true,
        'note' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
        'category' => true,
        'publisher' => true,
        'authors' => true
    ];
}
