<?php 
use server\DB as DB;
$usersCountNomber = DB::table('users')->count();
echo jquery_write_text('#usersCountNomber', $usersCountNomber, 'sub-badge-primary sub-badge');
?>
<div class="content-page">
    <div class="content">
        <div class="">
            <div class="page-header-title">
                <h4 class="page-title"><span>USERS</span> 
                    <small id="usersCountNomberInPage">
                        <span title="" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="total no of users"> <i><?php echo $usersCountNomber; ?></i> </span>
                    </small>
                    
                        <a title="" 
                            data-placement="right" 
                            data-toggle="tooltip" 
                            class="tooltips waves-effect waves-light body-icon-box-md" 
                            href="?create-new-user" 
                            data-original-title="Create new user"
                            > <i class="mdi mdi-plus"></i>
                        </a>
                        
                </h4>
                <ol class="breadcrumb">
                    <li><a href="?home"><i class="mdi mdi-home"></i> Home</a></li>
                    <li class="active">user</li>
                </ol>
            </div>
        </div>
        <!-- Start page contant -->
        <div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="invoice-title">
                                        <h4 class="pull-right">Order # 12345</h4> 
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-xs-6"> 
                                    </div>    
                                </div>    
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>      
        </div>    
    </div>    
</div>    