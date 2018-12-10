<?php
namespace X\Module\Api\Action;
use X\Module\Api\Component\ApiAction;
use X\Model\ProcessQueue;
use X\Model\Project;
use X\Model\Event;
use X\Model\Processor;
use X\Model\User;
class Trigger extends ApiAction {
    /**
     * @param $processor string specify processor, default to all. example: username.processorder_name
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    protected function runAction( $project, $event, $data, $processor=null ) {
        $project = Project::findOne(['identifier'=>$project,'user_id'=>$this->getUser()->id]);
        if ( null === $project ) {
            return $this->error('project does not exists.');
        }
        
        $event = Event::findOne(['project_id' => $project->id,'identifier' => $event]);
        if ( null === $event ) {
            return $this->error('event does not exists');
        }
        
        $queueItem = new ProcessQueue();
        $queueItem->project_id = $project->id;
        $queueItem->event_id = $event->id;
        $queueItem->parameters = $data;
        
        # parse processor
        if ( null !== $processor ) {
            $processorLocation = explode('.', $processor);
            if ( 2 !== count($processorLocation) ) {
                throw new \Exception("failed to specify processor name");
            }
            $user = User::findOne(['name'=>$processorLocation[0]]);
            if ( null === $user ) {
                throw new \Exception("faile to specify processor name, unable to location user");
            }
            $processor = Processor::findOne(['identifier'=>$processorLocation[1], 'user_id'=>$user->id]);
            if ( null === $processor ) {
                throw new \Exception("failed to spicify processor name, unable to location processor");
            }
            $queueItem->processor_id = $processor->id;
        }
        
        $queueItem->save();
        $this->success();
    }
}