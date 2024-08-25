<?php

require_once '../inc/connection.php';
require_once '../App.php';

if ($request->checkPost('submit') && $request->checkGet('id') && $request->checkPost('title') && $request->checkGet('title')){
    $id = $request->filter($request->get('id'));
    $title = $request->filter($request->post('title'));
    $oldTitle = $request->get('title');

    $validator->validator('id', $id, ['Required','Number']);
    $validator->validator('title', $title, ['Required','Str','Max:255']);
    $errors = $validator->getError();

    if (empty($errors)){
        $stmt = $conn->prepare("SELECT * FROM todo WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() === 1){
            $stmt = $conn->prepare("UPDATE todo SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if($stmt->execute()){
                $session->set('success','todo updated successfully');
                $request->redirect('../index.php');
            }
            else{
                $session->set('error',['Failed to update todo']);
                $request->redirect('../index.php');
            }
        }
    }
    else{
        $session->set('errors',$errors);
        $request->redirect("../edit.php?id=$id&title=$oldTitle");
    }
}
else{
    $request->redirect('../index.php');
}