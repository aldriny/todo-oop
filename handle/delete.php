<?php

require_once '../inc/connection.php';
require_once '../App.php';

if ($request->checkGet('id')){
    $id = $request->filter($request->get('id'));

    $query = "SELECT id FROM todo WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() === 1) {
        $query = "delete FROM todo WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            $session->set('success','todo deleted successfully');
            $request->redirect('../index.php');
        }
        else{
            $session->set('error','Failed to delete todo');
            $request->redirect('../index.php');
        }
    }

}