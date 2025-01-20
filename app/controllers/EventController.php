<?php

require_once '../vendor/autoload.php';
require_once '../app/models/UserModel.php';
require_once '../app/models/EventModel.php';

// require_once __DIR__ . '/../models/EventModel.php';

class EventController
{
    private EventModel $eventModel;

    public function __construct(PDO $dbConnection)
    {
        $this->eventModel = new EventModel($dbConnection);
    }

    public function index()
    {
        $events = $this->eventModel->getAllEvents();
        include __DIR__ . '/../views/events/manager-events.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/events/create.php';
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'max_registration' => $_POST['max_registration']
        ];

        if ($this->eventModel->createEvent($data)) {
            header('Location: /public/manager-events');
            exit;
        } else {
            echo "Failed to create event";
        }
    }

    public function edit($id)
    {
        $event = $this->eventModel->getEventById($id);
        include __DIR__ . '/../views/events/edit.php';
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'max_registration' => $_POST['max_registration']
        ];

        if ($this->eventModel->updateEvent($id, $data)) {
            header('Location: /public/manager-events');
            exit;
        } else {
            echo "Failed to update event";
        }
    }

    public function delete($id)
    {
        if ($this->eventModel->deleteEvent($id)) {
            header('Location: /public/manager-events');
            exit;
        } else {
            echo "Failed to delete event";
        }
    }
}

