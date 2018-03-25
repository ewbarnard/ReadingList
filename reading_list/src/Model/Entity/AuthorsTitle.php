<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthorsTitle Entity
 *
 * @property int $id
 * @property int $author_id
 * @property int $title_id
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Title $title
 */
class AuthorsTitle extends Entity
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
        'author_id' => true,
        'title_id' => true,
        'author' => true,
        'title' => true
    ];
}
