<?php

namespace SON\Event;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;

class Exemplo implements EventManagerAwareInterface
{
    protected $events;

    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(
            __CLASS__,
            get_called_class()
        ));

        $this->events = $events;
        return $this;
    }

    public function getEventManager()
    {
        if(null == $this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }

    public function metodo()
    {
        echo "metodo executou.<br>";

        //Gatilho
        $this->getEventManager()->trigger(
            __FUNCTION__,
            $this,
            array('valor' => 10)
        );
    }

    public function metodo2()
    {
        $this->getEventManager()->trigger(
            __FUNCTION__,
            $this,
            array('valor' => 100)
        );
    }
    
    public function metodo3($valor)
    {
    	$arg = compact('valor');
    	$results = $this->getEventManager()->triggerUntil(
			        	__FUNCTION__,
			    		$this,
    					$arg,
			    		function() use($valor) {
			    			if($valor == 1) {
			    				return true;
			    			}
			    		}
			    	);
    	
    	if($results->stopped()) {
    		echo "Parou a execução.";
    		return $results->last();
    	}
    	
    	echo "Execução continuando...";
    }

    public function teste()
    {
        $this->getEventManager()->trigger(
            __FUNCTION__,
            $this,
            array('valor' => 'metodo de teste')
        );
    }
}
