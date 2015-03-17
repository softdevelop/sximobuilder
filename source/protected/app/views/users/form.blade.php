
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
    

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
		<li><a href="{{ URL::to('users') }}">{{ $pageTitle }}</a></li>
        <li class="active"> Add </li>
      </ul>
	</div>  
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	
	<div class="page-content-wrapper m-t">
		
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h5> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small></h5>
		<div class="sbox-tools" >
		@if(Session::get('gid') ==1)
			<a href="{{ URL::to('module/config/'.$pageModule) }}" class="btn btn-xs btn-white tips" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa fa-cog"></i></a>
		@endif 
		</div>
	</div>
	<div class="sbox-content"> 
	<div class="row"> 
		 {{ Form::open(array('url'=>'users/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true ,'parsley-validate novalidate'=>'')) }}
		 
		 <div class="col-md-6">
									
				  <div class="form-group hidethis " style="display:none;">
					<label for="ipt" class=" control-label col-md-4 text-right"> Id </label>
					<div class="col-md-8">
					  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> {{ Lang::get('core.group') }} </label>
					<div class="col-md-8">
					  <select name='group_id' rows='5' id='group_id' code='{$group_id}' 
							class='select2 '  required  ></select> 
					 </div> 
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right">  {{ Lang::get('core.username') }} </label>
					<div class="col-md-8">
					  {{ Form::text('username', $row['username'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> {{ Lang::get('core.firstname') }} </label>
					<div class="col-md-8">
					  {{ Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> {{ Lang::get('core.lastname') }} </label>
					<div class="col-md-8">
					  {{ Form::text('last_name', $row['last_name'],array('class'=>'form-control ')) }} 
					 </div> 
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> {{ Lang::get('core.email') }} </label>
					<div class="col-md-8">
					  {{ Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'' )) }} 
					 </div> 
				  </div> 										
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> Status </label>
					<div class="col-md-8">
					  
					<label class='checked'>
					<input type='radio' name='active' value ='0' required @if($row['active'] == '0') checked="checked" @endif > Inactive </label>
					<label class='checked'>
					<input type='radio' name='active' value ='1' required @if($row['active'] == '1') checked="checked" @endif > Active </label> 
					 </div> 
				  </div> 					

			
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_savechanges') }} </button>
				</div>	  
		
			  </div> 
			
			</div>
			
			
			<div class="col-md-6">	  
		
	<div class="form-group">
		
		<label for="ipt" class=" control-label col-md-4 text-left" > </label>
		<div class="col-md-8">
			@if($row['id'] !='')
				{{ Lang::get('core.notepassword') }}
			@else
				Create Password
			@endif	 
		</div>
		</div>		  
		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>
			<div class="col-md-8">
			<input name="password" type="password" id="password" class="form-control input-sm" value=""
			@if($row['id'] =='')
				required
			@endif
			 /> 
			 </div> 
		  </div>  
		  
		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>
			<div class="col-md-8">
			<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" value=""
			@if($row['id'] =='')
				required
			@endif		
			 />  
			 </div> 
		  </div>  				  
				  
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_savechanges') }} </button>
				</div>	  
		
			  </div> 
		 
		 </div>
		 {{ Form::close() }}
		</div>
		</div>
	</div>
	</div>
</div>	
	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		$("#group_id").jCombo("<?php echo URL::to("users/comboselect?filter=tb_groups:group_id:name&limit=WHERE:level:>=:".$level);?>",
		{  selected_value : '{{ $row['group_id'] }}' });
		 
	});
	</script>		 