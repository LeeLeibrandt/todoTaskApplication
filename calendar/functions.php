<?php

    $connect = new PDO('mysql:host=localhost;dbname=application', 'root', 'root');

    //load
    $data = array();
    $query = "SELECT * FROM events ORDER BY id";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
        $data[] = array(
            'id'   => $row["id"],
            'title'   => $row["title"],
            'start'   => $row["start_event"],
            'end'   => $row["end_event"]
        );
    }
    echo json_encode($data);

    //update
    if(isset($_POST["id"]))
    {
        $query = "
            UPDATE events 
            SET title=:title, start_event=:start_event, end_event=:end_event 
            WHERE id=:id
        ";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':title'  => $_POST['title'],
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end'],
                ':id'   => $_POST['id']
            )
        );
    }

    //insert 
    if(isset($_POST["title"]))
    {
        $query = "
            INSERT INTO events 
            (title, start_event, end_event) 
            VALUES (:title, :start_event, :end_event)
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':title'  => $_POST['title'],
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end']
            )
        );
    }

    //delete
    if(isset($_POST["id"]))
    {
        $query = "
            UPDATE events 
            SET title=:title, start_event=:start_event, end_event=:end_event 
            WHERE id=:id
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end'],
            ':id'   => $_POST['id']
            )
        );
    }

