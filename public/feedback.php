<?php 
include_once 'inc/header.php';
?>
<?php 
// Hard coded data
// class  FeedbackItem {
//     public $id;
//     public $name;
//     public $email;
//     public $content;

//     public function __construct($id, $name, $email, $content) {
//         $this->id = $id;
//         $this->name = $name;
//         $this->email = $email;
//         $this->content = $content;
//     }

// }


// $feedbackItems = [
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
//     new FeedbackItem( 1,'John Doe','johndoe@gmail.com','This website is amazing' ),
 
// ]

// Fetching this data from the Database
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($connection, $sql);
$feedbackItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<main>
    <div class="container d-flex flex-column align-items-center">

        <h2>Feedback</h2>

        <?php if(empty($feedbackItems)):?>
        <p class="text-center">No feedback yet.</p>
        <?php endif;?>
        <?php foreach($feedbackItems as $feedback ) :?>

        <div class="card my-3">
            <div class="card-header">
                <?php echo $feedback['name'];?> (<?php echo $feedback['email'];?>)
            </div>
            <div class="card-body">
                <?php echo $feedback['content']?>
            </div>
        </div>
        <?php endforeach;?>


    </div>
</main>
<?php include_once 'inc/footer.php'?>