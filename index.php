<?php 
        // defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
        // define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'galery');
        // defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
        


        // require_once('admin/includes/functions.php');
        // require_once('admin/includes/new_config.php');
        // require_once('admin/includes/database.php');
        // require_once('admin/includes/db_object.php');
        // require_once('admin/includes/user.php');
        // require_once('admin/includes/photo.php');
        // require_once('admin/includes/session.php');
        // require_once('admin/includes/comment.php');
        // require_once('admin/includes/paginate.php');
        require_once('admin/includes/init.php');

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page = 4;

$items_total_count = Photo::count_all();

// $photos =  Photo::find_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$base =  "SELECT * FROM photos ";
$base .= "LIMIT {$items_per_page} ";
$base .= "OFFSET {$paginate->offset()} ";

$photos = Photo::find_by_query($base);



?>
<?php include('includes/header.php') ?>
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
