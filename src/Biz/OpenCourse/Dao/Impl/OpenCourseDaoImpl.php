<?php

namespace Topxia\Service\OpenCourse\Dao\Impl;

use Codeages\Biz\Framework\Dao\GeneralDaoImpl;
use Topxia\Service\OpenCourse\Dao\OpenCourseDao;

class OpenCourseDaoImpl extends GeneralDaoImpl implements OpenCourseDao
{
    protected $table = 'open_course';

    public function declares()
    {
        return array(
            'timestamps' => array(),
            'serializes' => array('teacherIds' => 'delimiter'),
            'orderbys'   => array('createdTime', 'recommendedSeq', 'studentNum', 'hitNum'),
            'conditions' => array(
                'updatedTime >= :updatedTime_GE',
                'status = :status',
                'type = :type',
                'title LIKE :titleLike',
                'userId = :userId',
                'startTime >= :startTimeGreaterThan',
                'startTime < :startTimeLessThan',
                'rating > :ratingGreaterThan',
                'createdTime >= :startTime',
                'createdTime <= :endTime',
                'categoryId = :categoryId',
                'smallPicture = :smallPicture',
                'categoryId IN ( :categoryIds )',
                'parentId = :parentId',
                'parentId > :parentId_GT',
                'parentId IN ( :parentIds )',
                'id NOT IN ( :excludeIds )',
                'id IN ( :courseIds )',
                'id IN ( :openCourseIds )',
                'recommended = :recommended',
                'locked = :locked'
            )
        );
    }

    public function findCoursesByIds(array $ids)
    {
        return $this->findInField('id', $ids);
    }

    public function waveCourse($id, $field, $diff)
    {
        return $this->wave(array($id), array($field => $diff));
    }

}
