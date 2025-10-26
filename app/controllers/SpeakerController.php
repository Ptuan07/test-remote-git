<?php

require_once '../vendor/autoload.php';
require_once '../app/models/SpeakerModel.php';


// require_once __DIR__ . '/../models/EventModel.php';

class SpeakerController
{
    private SpeakerModel $speakerModel;

    public function __construct(PDO $dbConnection)
    {
        $this->speakerModel = new SpeakerModel($dbConnection);
    }

    public function index()
    {
        $speakers = $this->speakerModel->getAllSpeakers();
        include __DIR__ . '/../views/speakers/manager-speakers.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/speakers/create.php';
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'profile_image' => $_FILES['profile_image']['name'] ?? '',
            'title' => $_POST['title'],
            'bio' => $_POST['bio']
        ];

     
        if (!empty($_FILES['profile_image']['name'])) {
            $targetDir = BASE_PATH . '/public/assets/images/speakers/';
            $targetFile = $targetDir . basename($_FILES['profile_image']['name']);
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile);
        }

        $this->speakerModel->createSpeaker($data);
        header('Location: /public/speakers/create');
    }

    public function edit($id)
    {
        $speaker = $this->speakerModel->getSpeakerById($id);
        include __DIR__ . '/../views/speakers/edit.php';
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'profile_image' => $_FILES['profile_image']['name'] ? '',
            'title' => $_POST['title'],
            'bio' => $_POST['bio']
        ];

        if (!empty($_FILES['profile_image']['name'])) {
            $targetDir = BASE_PATH . '/public/assets/images/speakers/';
            $targetFile = $targetDir . basename($_FILES['profile_image']['name']);
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile);
        }

        $this->speakerModel->updateSpeaker($id, $data);
        header('Location: /public/manager-speakers');
    }

    public function delete($id)
    {
        if ($this->speakerModel->deleteSpeaker($id)) {
            header('Location: /public/manager-speakers');
            exit;
        } else {
            echo "Failed to delete event";
        }
    }
}
//aaaaaaaaaaaaaaaaaaaaaaaaaa