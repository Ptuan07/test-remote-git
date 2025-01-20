<?php

class SpeakerModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllSpeakers()
    {
        $stmt = $this->db->prepare("SELECT * FROM speakers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSpeakerById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM speakers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createSpeaker($data)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO speakers (name, email, phone, profile_image, title, bio) VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['profile_image'],
            $data['title'],
            $data['bio']
        ]);
    }

    public function updateSpeaker($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE speakers SET name = ?, email = ?, phone = ?, profile_image = ?, title = ?, bio = ? WHERE id = ?"
        );
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['profile_image'],
            $data['title'],
            $data['bio'],
            $id
        ]);
    }

    public function deleteSpeaker($id)
    {
        $stmt = $this->db->prepare("DELETE FROM speakers WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
