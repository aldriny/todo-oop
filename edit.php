<?php
require_once 'inc/header.php';
require_once 'App.php';
?>

<body class="d-flex flex-column min-vh-100 bg-dark text-white">
    <div class="container w-50 flex-grow-1"> 
    <?php
            require_once 'inc/success.php';
            require_once 'inc/error.php';
            ?>
        <h2 class="mb-5 text-secondary">Edit Your Todo</h2>

        <form action="handle/edit.php?id=<?php echo $request->get('id') . "&title=" . $request->get('title')?>" method="post">
            <textarea class="form-control" name="title" rows="5" placeholder="Enter your note here"><?php echo $request->get('title')?></textarea>
            
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-primary mt-3">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
