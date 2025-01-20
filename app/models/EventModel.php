<?php

class EventModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllEvents(): array
    {
        $query = $this->db->query("SELECT * FROM events ORDER BY start_date DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById(int $id): array
    {
        $query = $this->db->prepare(query: "SELECT * FROM events WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createEvent(array $data): bool
    {
        $query = $this->db->prepare(
            "INSERT INTO events (name, description, type, start_date, end_date, max_registration) 
             VALUES (:name, :description, :type, :start_date, :end_date, :max_registration)"
        );

        return $query->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'type' => $data['type'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'max_registration' => $data['max_registration']
        ]);
    }

    public function updateEvent(int $id, array $data): bool
    {
        $query = $this->db->prepare(
            "UPDATE events 
             SET name = :name, description = :description, type = :type, 
                 start_date = :start_date, end_date = :end_date, max_registration = :max_registration 
             WHERE id = :id"
        );

        return $query->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'type' => $data['type'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'max_registration' => $data['max_registration'],
            'id' => $id
        ]);
    }

    public function deleteEvent($id): bool
    {
        $query = $this->db->prepare("DELETE FROM events WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}
