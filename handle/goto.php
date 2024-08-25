<?php

require_once '../inc/connection.php';
require_once '../App.php';

if ($request->checkGet('id') && $request->checkGet('status')){
    $id = $request->filter($request->get('id'));
    $status = $request->filter($request->get('status'));

    $stmt = $conn->prepare("SELECT * FROM todo WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 1){
        $stmt = $conn->prepare("UPDATE todo SET `status` = :status WHERE id = :id");
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result){
            $session->set('success', 'Todo status updated successfully');
            $request->redirect('../index.php');
        }
        else{
            $session->set('error', ['Failed to update todo status']);
            $request->redirect('../index.php');
        }
    }
}
else{
    $request->redirect('../index.php');
}