<div class="sbox ">
	<div class="sbox-title">
			
				<h3 >{{ CNF_APPNAME }} <small> {{ CNF_APPDESC }} </small></h3>
				
	</div>
	<div class="sbox-content">
	<div class="text-center  animated fadeInDown delayp1">
		<img src="{{ asset('sximo/images/logo-sximo.png')}}" width="70" height="70" />
	</div>	
 
	    	@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>		
		
	<ul class="nav nav-tabs" >
	  <li class="active"><a href="#tab-sign-in" data-toggle="tab">  {{ Lang::get('core.signin'); }} </a></li>
	   <li ><a href="#tab-forgot" data-toggle="tab"> Forgot Password  ID </a></li>
	   @if(CNF_REGIST =='true') 			
	   <li><a href="{{ URL::TO('user/register')}}" >  Sign Up </a></li>
	   @endif	
	 
	</ul>	
	<div class="tab-content" >
	<div class="tab-pane active m-t" id="tab-sign-in">
	{{ Form::open(array('url'=>'user/signin', 'class'=>'form-vertical')) }}

	<div class="form-group has-feedback animated fadeInLeft delayp1">
		<label>{{ Lang::get('core.email'); }}	</label>
		{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address' ,'required'=>'email')) }}
		<i class="icon-users form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback  animated fadeInRight delayp1">
		<label>{{ Lang::get('core.password'); }}	</label>
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password' ,'required'=>'')) }}
		<i class="icon-lock form-control-feedback"></i>
	</div>
	@if(CNF_MULTILANG =='1') 
	<div class="form-group has-feedback  animated fadeInLeft delayp1">
		<label class="text-left"> Language </label>	
		<select class="form-control" name="language">
			@foreach(SiteHelpers::langOption() as $lang)
			<option value="{{ $lang['folder'] }}">  {{  $lang['name'] }}</option>
			@endforeach

		</select>	
		
		<div class="clr"></div>
	</div>	
 	@endif	


	@if(CNF_RECAPTCHA =='true') 
	<div class="form-group has-feedback  animated fadeInLeft delayp1">
		<label class="text-left"> Are u human ? </label>		
		{{ Form::captcha(array('theme' => 'white')); }}
		<div class="clr"></div>
	</div>	
 	@endif	
	<div class="form-group  has-feedback text-center  animated fadeInLeft delayp1" style=" margin-bottom:20px;" >
		 	 
			<button type="submit" class="btn btn-info btn-sm btn-block" ><i class="fa fa-sign-in"></i> {{ Lang::get('core.signin'); }}</button>
		       

		
	 	<div class="clr"></div>
		
	</div>	
	<div class="animated fadeInUp delayp1">
	<p class="text-center"><a  id="or"  href="javascript://ajax"><small>Forgot password?</small></a></p>
	
		<div class="form-group has-feedback text-center">
		@if($fb_enabled =='true' || $google_enabled =='true' || $twit_enabled =='true') 
		<br />
		<p class="text-muted text-center"><b> {{ Lang::get('core.loginsocial') }} </b>	  </p>
		@endif
		<div style="padding:15px 0;">
			@if($fb_enabled =='true') 
			<a href="{{ URL::to('user/facebook')}}" class="btn btn-primary"><i class="icon-facebook"></i> Facebook </a>
			@endif
			@if($google_enabled =='true') 
			<a href="{{ URL::to('user/google')}}" class="btn btn-danger"><i class="icon-google"></i> Google </a>
			@endif
			@if($twit_enabled =='true') 
			<a href="{{ URL::to('user/twitter')}}" class="btn btn-info"><i class="icon-twitter"></i> Twitter </a>
			@endif
		</div>

	  <p style="padding:10px 0" class="text-center">
	  <a href="{{ URL::to('')}}"> Back to Site </a>  
   		</p>
   	</div>	
   	{{ Form::close() }}				
	</div>
	</div>
	

	<div class="tab-pane  m-t" id="tab-forgot">	

		{{ Form::open(array('url' => 'user/request', 'class'=>'form-vertical box ','id'=>'fr' )) }}

			
		   <div class="form-group has-feedback">
		   <div class="">
				<label>{{ Lang::get('core.enteremailforgot') }}</label>
			   {{ Form::text('credit_email', null, array('class'=>'form-control', 'placeholder'=> Lang::get('core.email'))) }}
				<i class="icon-envelope form-control-feedback"></i>
			</div> 	
			</div>
			<div class="form-group has-feedback">        
		      <button type="submit" class="btn btn-default pull-right"> {{ Lang::get('core.sb_submit') }} </button>        
		  </div>
		  
		  <div class="clr"></div>

		  
		{{ Form::close() }}	

	
	</div>


	</div>  
	  
	
   
 
	 


  <div class="clr"></div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('#or').click(function(){
$('#fr').toggle();
});
});
</script>