<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Model\Project;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Event;
class Detail extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $project = Project::findOne(['id'=>$id]);
        $events = Event::findAll(['project_id'=>$project->id]);
        
        $this->loadPublisherMenu($id);
        $this->addParticle('Project/Detail', array(
            'project' => $project,
            'events' => $events,
        ), 'right');
    }
}