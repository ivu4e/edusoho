<?php
namespace AppBundle\Controller\Classroom;

use Symfony\Component\HttpFoundation\Request;
use Topxia\WebBundle\Controller\BaseController;

class ThreadMemberController extends BaseController
{
    public function becomeAction(Request $request, $classroomId, $threadId)
    {
        $user = $this->getCurrentUser();

        if (!$user->isLogin()) {
            throw $this->createAccessDeniedException($this->getServiceKernel()->trans('用户没有登录!不能加入活动!'));
        }

        $member = $this->getClassroomService()->getClassroomMember($classroomId, $user['id']);

        if (empty($member)) {
            throw $this->createAccessDeniedException($this->getServiceKernel()->trans('不是本班成员!不能加入活动!'));
        }

        return $this->forward('AppBundle:Thread/Member:become', array(
            'request'  => $request,
            'threadId' => $threadId
        ));
    }

    public function quitAction(Request $request, $threadId, $memberId)
    {
        return $this->forward('AppBundle:Thread/Member:quit', array(
            'request'  => $request,
            'threadId' => $threadId,
            'memberId' => $memberId
        ));
    }

    private function getClassroomService()
    {
        return $this->createService('Classroom:ClassroomService');
    }
}