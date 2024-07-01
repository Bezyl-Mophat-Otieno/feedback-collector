<?php include 'inc/header.php'?>
<?php
 $message = '';
 if(isset($_POST['submit'])){
     $id = random_int(10,20);
     $name = $_POST['name'];
     $email = $_POST['email'];
     $content = $_POST['content'];
     if(empty($name) || empty($email) || empty($content)){
         $message = "<div class='alert alert-danger'>All fields are required</div>";
         return;
     }
     // Sanitize input
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $content = filter_var($content, FILTER_SANITIZE_STRING);
        
     $sql = "INSERT INTO feedback (id, name, email, content) VALUES ('$id', '$name', '$email', '$content')";

     try{
       $result = mysqli_query($connection, $sql);

     
        if($result){
            $message = "<div class='alert alert-success'>Feedback sent successfully</div>";
            // delay the page before redirecting
            header('refresh:2;url=/public/feedback.php');
            
        }else{
            $message= "<div class='alert alert-danger'>Failed to send feedback</div>";
        }
        
     }catch(Exception $e){
         $message = "<div class='alert alert-danger'>An error occured</div>";
         echo $e->getMessage();
     }
 
 }

?>
<main>
    <div class="container d-flex flex-column align-items-center">
        <img src="/public/img/logo.png" class="w-25 mb-3" alt="">
        <?php echo $message ?? null ?>
        <h2>Feedback</h2>
        <p class="lead text-center">Leave feedback for Mophat.Dev</p>
        <form action="" class="mt-4 w-75" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Feedback</label>
                <textarea class="form-control" id="body" name="content" placeholder="Enter your feedback"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
            </div>
        </form>
    </div>
</main>
<?php include_once 'inc/footer.php'?>