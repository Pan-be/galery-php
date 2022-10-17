
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                            <?php 
                            
                            $ewelina = new User();
                            $ewelina->username = 'Borys';
                            $ewelina->password = 'Ewelinka';
                            $ewelina->first_name = 'Borys';
                            $ewelina->last_name = 'Pies';
                            $ewelina->create();

                            // $user = User::find_user_by_id(9);
                            // $user->delete();

                            // $user = User::find_user_by_id(3);
                            // $user->username = 'Grzywacz';
                            // $user->update();

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