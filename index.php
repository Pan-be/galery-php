<?php 
        defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
        define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'galery');
        defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
        


        require_once('admin/includes/functions.php');
        require_once('admin/includes/new_config.php');
        require_once('admin/includes/database.php');
        require_once('admin/includes/db_object.php');
        require_once('admin/includes/user.php');
        require_once('admin/includes/photo.php');
        require_once('admin/includes/session.php');
        require_once('admin/includes/comment.php');

$photos =  Photo::find_all();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>



    <!-- Navigation -->
<?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <div class="thumbnails row">
                        <?php 
                
                        foreach ($photos as $photo): ?>

                        <div class="col-xs-6 col-md-3">
                            <a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                                <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                            </a>
                        </div>
                        
                        <?php endforeach ;?>
                    </div>
            
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
           
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
