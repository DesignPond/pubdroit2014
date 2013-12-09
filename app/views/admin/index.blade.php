@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">
				<ol class="breadcrumb">
					<li class="active"><a href="index.htm">Dashboard</a></li>
				</ol>
				<h1>Dashboard</h1>
			</div>
			<div class="container">
			
			<!-- row -->
				<div class="row">
	                <div class="col-md-12">
	                    <div class="row">
	                        <div class="col-md-3 col-xs-12 col-sm-6">
	                            <a class="info-tiles tiles-toyo" href="#">
	                                <div class="tiles-heading">Profit</div>
	                                <div class="tiles-body-alt">
	                                    <!--i class="fa fa-bar-chart-o"></i-->
	                                    <div class="text-center"><span class="text-top">$</span>854</div>
	                                    <small>+8.7% from last period</small>
	                                </div>
	                                <div class="tiles-footer">more info</div>
	                            </a>
	                        </div>
	                        <div class="col-md-3 col-xs-12 col-sm-6">
	                            <a class="info-tiles tiles-success" href="#">
	                                <div class="tiles-heading">Revenue</div>
	                                <div class="tiles-body-alt">
	                                    <!--i class="fa fa-money"></i-->
	                                    <div class="text-center"><span class="text-top">$</span>22.7<span class="text-smallcaps">k</span></div>
	                                    <small>-13.5% from last week</small>
	                                </div>
	                                <div class="tiles-footer">go to accounts</div>
	                            </a>
	                        </div>
	                        <div class="col-md-3 col-xs-12 col-sm-6">
	                            <a class="info-tiles tiles-orange" href="#">
	                                <div class="tiles-heading">Members</div>
	                                <div class="tiles-body-alt">
	                                    <i class="fa fa-group"></i>
	                                    <div class="text-center">109</div>
	                                    <small>new users registered</small>
	                                </div>
	                                <div class="tiles-footer">manage members</div>
	                            </a>
	                        </div>
	                        <div class="col-md-3 col-xs-12 col-sm-6">
	                            <a class="info-tiles tiles-alizarin" href="#">
	                                <div class="tiles-heading">Orders</div>
	                                <div class="tiles-body-alt">
	                                    <i class="fa fa-shopping-cart"></i>
	                                    <div class="text-center">57</div>
	                                    <small>new orders received</small>
	                                </div>
	                                <div class="tiles-footer">manage orders</div>
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        <!-- end row -->
	        <!-- Start row -->
	                    <div class="row">        
                <div class="col-md-6">
                    <div class="panel panel-indigo">
                        <div class="panel-heading">
                            <h4>User Accounts</h4>
                            <div class="options">
                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
                                <a href="javascript:;"><i class="fa fa-wrench"></i></a> 
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" style="margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th class="col-xs-1 col-sm-1"><input type="checkbox" id="select-all"></th>
                                            <th class="col-xs-9 col-sm-3">User ID</th>
                                            <th class="col-sm-6 hidden-xs">Email Address</th>
                                            <th class="col-xs-2 col-sm-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="selects">
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>cranston</td>
                                            <td class="hidden-xs">cranstonb@gnail.com</td>
                                            <td><span class="label label-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>aaron</td>
                                            <td class="hidden-xs">ppaul@lime.com</td>
                                            <td><span class="label label-grape">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>norris</td>
                                            <td class="hidden-xs">j.norris@gnail.com</td>
                                            <td><span class="label label-warning">Suspended</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>gunner</td>
                                            <td class="hidden-xs">gunner@outluk.com</td>
                                            <td><span class="label label-danger">Blocked</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>mrford</td>
                                            <td class="hidden-xs">fordm@gnail.com</td>
                                            <td><span class="label label-grape">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class=""></td>
                                            <td>stewrtt</td>
                                            <td class="hidden-xs">swttrs@outluk.com</td>
                                            <td><span class="label label-danger">Blocked</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="active">
                                            <td colspan="4" class="text-left">
                                                <label for="action" style="margin-bottom:0">Action </label>
                                                <select name="action">
                                                    <option value="Edit">Edit</option>
                                                    <option value="Aprove">Aprove</option>
                                                    <option value="Move">Move</option>
                                                    <option value="Delete">Delete</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-grape">
                        <div class="panel-heading">
                              <h4><i class="icon-highlight fa fa-check"></i> To-do List</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="panel-tasks">
                                <li class="item-danger">
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Write documentation for theme</span>
                                        <span class="label label-info">6 Days</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="item-primary">
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Compile code</span>
                                        <span class="label label-primary">3 Days</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="item-info">
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Upload files to server</span>
                                        <span class="label label-orange">Tomorrow</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="item-success">
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Call client</span>
                                        <span class="label label-danger">Today</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Buy some milk</span>
                                        <span class="label label-danger">Today</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Setup meeting with client</span>
                                        <span class="label label-sky">2 Weeks</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label>
                                        <i class="fa fa-ellipsis-v icon-dragtask"></i>
                                        <input type="checkbox"> 
                                        <span class="task-description">Pay office rent and bills</span>
                                        <span class="label label-sky">3 Weeks</span>
                                    </label>
                                    <div class="options todooptions">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                            <a href="#" class="btn btn-success btn-sm pull-left">Add Tasks</a>
                            <a href="#" class="btn btn-default-alt btn-sm pull-right">See All Tasks</a>
                        </div>
                    </div>
                </div>
            </div>

	        <!-- end row -->
	        			
		        <!-- Start row -->
	            <div class="row">
	              <div class="col-md-12">
	                    <div class="panel panel-sky">
	                    
	                        <div class="panel-heading">
	                            <h4>Data Tables</h4>
	                            <div class="options">   
	                                <a href="javascript:;"><i class="fa fa-cog"></i></a>
	                                <a href="javascript:;"><i class="fa fa-wrench"></i></a>
	                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
	                            </div>
	                        </div>
	                        
	                        <div class="panel-body collapse in">
	                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
	                                <thead>
	                                    <tr>
	                                        <th>Rendering engine</th>
	                                        <th>Browser</th>
	                                        <th>Platform(s)</th>
	                                        <th>Engine version</th>
	                                        <th>CSS grade</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <tr class="odd gradeX">
	                                        <td>Trident</td>
	                                        <td>Internet
	                                           Explorer 4.0</td>
	                                           <td>Win 95+</td>
	                                           <td class="center"> 4</td>
	                                           <td class="center">X</td>
	                                       </tr>
	                                       <tr class="even gradeC">
	                                        <td>Trident</td>
	                                        <td>Internet
	                                           Explorer 5.0</td>
	                                           <td>Win 95+</td>
	                                           <td class="center">5</td>
	                                           <td class="center">C</td>
	                                       </tr>
	                                       <tr class="odd gradeA">
	                                        <td>Trident</td>
	                                        <td>Internet
	                                           Explorer 5.5</td>
	                                           <td>Win 95+</td>
	                                           <td class="center">5.5</td>
	                                           <td class="center">A</td>
	                                       </tr>
	                                       <tr class="even gradeA">
	                                        <td>Trident</td>
	                                        <td>Internet
	                                           Explorer 6</td>
	                                           <td>Win 98+</td>
	                                           <td class="center">6</td>
	                                           <td class="center">A</td>
	                                       </tr>
	                                       <tr class="odd gradeA">
	                                        <td>Trident</td>
	                                        <td>Internet Explorer 7</td>
	                                        <td>Win XP SP2+</td>
	                                        <td class="center">7</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="even gradeA">
	                                        <td>Trident</td>
	                                        <td>AOL browser (AOL desktop)</td>
	                                        <td>Win XP</td>
	                                        <td class="center">6</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Firefox 1.0</td>
	                                        <td>Win 98+ / OSX.2+</td>
	                                        <td class="center">1.7</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Firefox 1.5</td>
	                                        <td>Win 98+ / OSX.2+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Firefox 2.0</td>
	                                        <td>Win 98+ / OSX.2+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Firefox 3.0</td>
	                                        <td>Win 2k+ / OSX.3+</td>
	                                        <td class="center">1.9</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Camino 1.0</td>
	                                        <td>OSX.2+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Camino 1.5</td>
	                                        <td>OSX.3+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Netscape 7.2</td>
	                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
	                                        <td class="center">1.7</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Netscape Browser 8</td>
	                                        <td>Win 98SE+</td>
	                                        <td class="center">1.7</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Netscape Navigator 9</td>
	                                        <td>Win 98+ / OSX.2+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.0</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.1</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.1</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.2</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.2</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.3</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.3</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.4</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.4</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.5</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.5</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.6</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">1.6</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.7</td>
	                                        <td>Win 98+ / OSX.1+</td>
	                                        <td class="center">1.7</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Mozilla 1.8</td>
	                                        <td>Win 98+ / OSX.1+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Seamonkey 1.1</td>
	                                        <td>Win 98+ / OSX.2+</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Gecko</td>
	                                        <td>Epiphany 2.20</td>
	                                        <td>Gnome</td>
	                                        <td class="center">1.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>Safari 1.2</td>
	                                        <td>OSX.3</td>
	                                        <td class="center">125.5</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>Safari 1.3</td>
	                                        <td>OSX.3</td>
	                                        <td class="center">312.8</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>Safari 2.0</td>
	                                        <td>OSX.4+</td>
	                                        <td class="center">419.3</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>Safari 3.0</td>
	                                        <td>OSX.4+</td>
	                                        <td class="center">522.1</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>OmniWeb 5.5</td>
	                                        <td>OSX.4+</td>
	                                        <td class="center">420</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>iPod Touch / iPhone</td>
	                                        <td>iPod</td>
	                                        <td class="center">420.1</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Webkit</td>
	                                        <td>S60</td>
	                                        <td>S60</td>
	                                        <td class="center">413</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 7.0</td>
	                                        <td>Win 95+ / OSX.1+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 7.5</td>
	                                        <td>Win 95+ / OSX.2+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 8.0</td>
	                                        <td>Win 95+ / OSX.2+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 8.5</td>
	                                        <td>Win 95+ / OSX.2+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 9.0</td>
	                                        <td>Win 95+ / OSX.3+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 9.2</td>
	                                        <td>Win 88+ / OSX.3+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera 9.5</td>
	                                        <td>Win 88+ / OSX.3+</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Opera for Wii</td>
	                                        <td>Wii</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Nokia N800</td>
	                                        <td>N800</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Presto</td>
	                                        <td>Nintendo DS browser</td>
	                                        <td>Nintendo DS</td>
	                                        <td class="center">8.5</td>
	                                        <td class="center">C/A<sup>1</sup></td>
	                                    </tr>
	                                    <tr class="gradeC">
	                                        <td>KHTML</td>
	                                        <td>Konqureror 3.1</td>
	                                        <td>KDE 3.1</td>
	                                        <td class="center">3.1</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>KHTML</td>
	                                        <td>Konqureror 3.3</td>
	                                        <td>KDE 3.3</td>
	                                        <td class="center">3.3</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>KHTML</td>
	                                        <td>Konqureror 3.5</td>
	                                        <td>KDE 3.5</td>
	                                        <td class="center">3.5</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeX">
	                                        <td>Tasman</td>
	                                        <td>Internet Explorer 4.5</td>
	                                        <td>Mac OS 8-9</td>
	                                        <td class="center">-</td>
	                                        <td class="center">X</td>
	                                    </tr>
	                                    <tr class="gradeC">
	                                        <td>Tasman</td>
	                                        <td>Internet Explorer 5.1</td>
	                                        <td>Mac OS 7.6-9</td>
	                                        <td class="center">1</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeC">
	                                        <td>Tasman</td>
	                                        <td>Internet Explorer 5.2</td>
	                                        <td>Mac OS 8-X</td>
	                                        <td class="center">1</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Misc</td>
	                                        <td>NetFront 3.1</td>
	                                        <td>Embedded devices</td>
	                                        <td class="center">-</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeA">
	                                        <td>Misc</td>
	                                        <td>NetFront 3.4</td>
	                                        <td>Embedded devices</td>
	                                        <td class="center">-</td>
	                                        <td class="center">A</td>
	                                    </tr>
	                                    <tr class="gradeX">
	                                        <td>Misc</td>
	                                        <td>Dillo 0.8</td>
	                                        <td>Embedded devices</td>
	                                        <td class="center">-</td>
	                                        <td class="center">X</td>
	                                    </tr>
	                                    <tr class="gradeX">
	                                        <td>Misc</td>
	                                        <td>Links</td>
	                                        <td>Text only</td>
	                                        <td class="center">-</td>
	                                        <td class="center">X</td>
	                                    </tr>
	                                    <tr class="gradeX">
	                                        <td>Misc</td>
	                                        <td>Lynx</td>
	                                        <td>Text only</td>
	                                        <td class="center">-</td>
	                                        <td class="center">X</td>
	                                    </tr>
	                                    <tr class="gradeC">
	                                        <td>Misc</td>
	                                        <td>IE Mobile</td>
	                                        <td>Windows Mobile 6</td>
	                                        <td class="center">-</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeC">
	                                        <td>Misc</td>
	                                        <td>PSP browser</td>
	                                        <td>PSP</td>
	                                        <td class="center">-</td>
	                                        <td class="center">C</td>
	                                    </tr>
	                                    <tr class="gradeU">
	                                        <td>Other browsers</td>
	                                        <td>All others</td>
	                                        <td>-</td>
	                                        <td class="center">-</td>
	                                        <td class="center">U</td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
            
	        	<!-- end row -->
			</div>
		</div>
	</div>
    	
@stop