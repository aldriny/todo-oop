<?php

require_once '../inc/connection.php';
require_once '../App.php';


if ($request->checkPost('submit')){
    $title = $request->filter($request->post('title'));
    
    $validator->validator('title', $title,['Required','Str','Max:255']);
    $errors = $validator->getError();
    
    if (empty($errors)){
        $query = "INSERT INTO todo(`title`) VALUES (:title)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            $session->set('success','todo added successfully');
            $request->redirect('../index.php');
        }
        else{
            $session->set('error',['Failed to add todo']);
            $request->redirect('../index.php');
        }
    }
    else{
        $session->set('errors',$errors);
        $request->redirect('../index.php');
    }

}
else{
    $request->redirect('../index.html');
}

