<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity.
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 * @property string $enrollment_number
 * @property string $roll_number
 * @property string $course_id
 * @property \App\Model\Entity\Course $course
 * @property string $branch_id
 * @property \App\Model\Entity\Branch $branch
 * @property \Cake\I18n\Time $year_of_passing
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Student extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
