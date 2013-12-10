@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Colloque</li>
				<li class="active">Créer</li>
			</ol>
	
			<h1>Créer un colloque</h1>
		</div>
		
		<div id="content" class="inner">
		    <div class="row">
				<div class="large-12 columns">	
				
					<form class="form-horizontal">
					
					  <div class="form-group">
						  <label for="focusedinput" class="col-sm-3 control-label">Focused Input</label>
						  <div class="col-sm-6">
						      <input type="text" class="form-control" id="focusedinput" placeholder="Default Input">
						  </div>
						  <div class="col-sm-3">
						    	<p class="help-block">Your help text!</p>
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="disabledinput" class="col-sm-3 control-label">Disabled Input</label>
						  <div class="col-sm-6">
						      <input disabled type="text" class="form-control" id="disabledinput" placeholder="Disabled Input">
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="inputPassword" class="col-sm-3 control-label">Password</label>
						  <div class="col-sm-6">
						      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="checkbox" class="col-sm-3 control-label">Checkbox</label>
						  <div class="col-sm-6">
						  	 <div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
						  	 <div class="checkbox block"><label><input type="checkbox" checked> Checked</label></div>
						  	 <div class="checkbox block"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
						  	 <div class="checkbox block"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="selector1" class="col-sm-3 control-label">Multiple Select</label>
						  <div class="col-sm-6"><select name="selector1" id="selector1" class="form-control">
						  	 <option>Lorem ipsum dolor sit amet.</option>
						  	 <option>Dolore, ab unde modi est!</option>
						  	 <option>Illum, fuga minus sit eaque.</option>
						  	 <option>Consequatur ducimus maiores voluptatum minima.</option>
						  </select></div>
					  </div>
					  
					  <div class="form-group">
					  	  <label for="txtarea1" class="col-sm-3 control-label">Textarea</label>
					  	  <div class="col-sm-6"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control"></textarea></div>
					  </div>
					  
					  <div class="form-group">
						  <label for="radio" class="col-sm-3 control-label">Radio</label>
						  <div class="col-sm-6">
						  	 <div class="radio block"><label><input type="radio"> Unchecked</label></div>
						  	 <div class="radio block"><label><input type="radio" checked> Checked</label></div>
						  	 <div class="radio block"><label><input type="radio" disabled> Disabled Unchecked</label></div>
						  	 <div class="radio block"><label><input type="radio" disabled checked> Disabled Checked</label></div>
						  </div>
					  </div>
			
					  <div class="form-group">
						  <label for="smallinput" class="col-sm-3 control-label">Small Input</label>
						  <div class="col-sm-6">
						      <input type="text" class="form-control input-sm" id="smallinput" placeholder="Small Input">
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="mediuminput" class="col-sm-3 control-label">Medium Input</label>
						  <div class="col-sm-6">
						      <input type="text" class="form-control" id="mediuminput" placeholder="Medium Input">
						  </div>
					  </div>
					  
					  <div class="form-group">
						  <label for="largeinput" class="col-sm-3 control-label">Large Input</label>
						  <div class="col-sm-6">
						      <input type="text" class="form-control input-lg" id="largeinput" placeholder="Large Input">
						  </div>
					  </div>
			
					</form>
	
				</div>
			</div>
	    </div>
    
	</div>
</div>
    
@stop