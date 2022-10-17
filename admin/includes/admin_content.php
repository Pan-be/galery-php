
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                            <?php 
                            
                            // $ewelina = new User();
                            // $ewelina->username = 'Chad';
                            // $ewelina->password = '123';
                            // $ewelina->first_name = 'Chad';
                            // $ewelina->last_name = 'FromHighschool';
                            // $ewelina->create();

                            // $photo = new Photo();
                            // $photo->title = 'Chad';
                            // $photo->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi fugit esse, est, atque in optio ipsa quos voluptate tenetur quia perspiciatis doloribus magni animi! Eum porro rem vitae dolores accusamus.';
                            // $photo->filename = 'Chad.jpg';
                            // $photo->type = 'image';
                            // $photo->size = 16;
                            // $photo->create();

                            // $user = User::find_by_id(10);
                            // echo $user->id;
                            $user = Photo::find_by_id(1);
                            echo $user->title;

                            // $user = User::find_user_by_id(3);
                            // $user->username = 'Teodor';
                            // $user->update();

                            // $users = User::find_all();
                            // foreach ($users as $user) {
                            //     echo $user->username;
                            // }
                            // $photos = Photo::find_all();
                            // foreach ($photos as $photo) {
                            //     echo $photo->title;
                            // }

                            // echo INCLUDES_PATH;

                            ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>