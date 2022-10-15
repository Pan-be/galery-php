
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
                            // $ewelina->username = 'Konrad';
                            // $ewelina->password = 'Ewelinka';
                            // $ewelina->first_name = 'Konrad';
                            // $ewelina->last_name = 'Bieniek';
                            // $ewelina->create();

                            $user = User::find_user_by_id(8);
                            $user->delete();
                        
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