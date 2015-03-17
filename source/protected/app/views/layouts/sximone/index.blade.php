<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> {{ isset($page['pageTitle']) ? $page['pageTitle'].' | '.CNF_APPNAME : CNF_APPNAME }} </title>
<meta name="keywords" content="{{ CNF_METAKEY }}">
<meta name="description" content="{{ CNF_METADESC }}"/>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">	
		{{ HTML::style('sximo/themes/sximone/css/bootstrap.min.css')}}
		
		{{ HTML::style('sximo/themes/sximone/font-awesome/css/font-awesome.min.css')}}
		{{ HTML::style('sximo/css/icons.min.css')}}
		{{ HTML::style('sximo/themes/sximone/js/fancybox/source/jquery.fancybox.css') }}		
		{{ HTML::style('sximo/themes/sximone/js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}	
		{{ HTML::style('sximo/js/plugins/select2/select2.css')}}		
		{{ HTML::style('sximo/themes/sximone/css/sximone.css')}}	
		{{ HTML::style('sximo/themes/sximone/css/animate.css')}}	

		
		{{ HTML::script('sximo/themes/sximone/js/jquery.min.js') }}		
		{{ HTML::script('sximo/themes/sximone/js/bootstrap.min.js') }}	
		{{ HTML::script('sximo/themes/sximone/js/fancybox/source/jquery.fancybox.js') }}	
		{{ HTML::script('sximo/themes/sximone/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7s') }}	
		{{ HTML::script('sximo/themes/sximone/js/fancybox/source/jquery.fancybox.js') }}	
		{{ HTML::script('sximo/js/plugins/prettify.js') }}	
		{{ HTML::script('sximo/js/plugins/parsley.js') }}
		{{ HTML::script('sximo/themes/sximone/js/jquery.mixitup.min.js') }}			
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->		


	
  	</head>

<body >
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 left">
                <ul class="list-unstyled list-inline">
                	<li> Lang : </li>
					@foreach(SiteHelpers::langOption() as $lang)
						<li><a href="{{ URL::TO('home/lang/'.$lang['folder']) }}">  {{  strtoupper($lang['folder']) }} / </a></li>
					@endforeach
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 right">
                <ul class="list-unstyled list-inline pull-right">
                     @if(!Auth::check()) 
					 	<li><a href="{{ URL::to('user/login') }}"><i class="fa fa-sign-in"></i> Log In</a></li>
                    	<li><a href="{{ URL::to('user/register') }}"><i class="fa fa-user"></i> Registration</a></li>
					 @else
					 	<li><a href="{{ URL::to('user/profile') }}"><i class="fa fa-user "></i>Account</a></li>
                    	<li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-desktop"></i> Dashboard</a></li>	
						<li><a href="{{ URL::to('user/logout') }}"><i class="fa  fa-sign-out"></i> Log Out</a></li>					 
					 @endif	
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>

<header>	
	<div class="container">
		<div class="navbar navbar-default ">			
				<div class="navbar-header">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ URL::to('') }}" class="navbar-brand site-logo">
					<img src="{{ asset('sximo/themes/sximone/img/logo.png')}}" class="img-responsive" width="70" height="70" />
					<span class="logo_title"> {{ CNF_APPNAME }}</span>
					<span class="logo_subtitle">{{ CNF_APPDESC }}</span>
					</a>
				</div>

				<div class="navbar-collapse collapse">
					@include('layouts/sximone/topbar')
				</div><!--/nav-collapse -->
			</div><!-- /container -->
		</div>
</header>		
		
<div style="min-height:400px; padding-bottom:50px;">
{{ $content }}
</div>

<div class="clr"></div>
	




<div id="footer">
	<div class=" container">
		<div class="col-md-7"> Copyright 2014 {{ CNF_APPNAME }} . ALL Rights Reserved. </div>
		<div class="col-md-5"></div>
	</div>	
</div>

<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-default">
		
			<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Modal title</h4>
		</div>
		<div class="modal-body" id="sximo-modal-content">
	
		</div>
	</div>
</div>
</div>

	
<script>
	jQuery(document).ready(function() {

		window.prettyPrint && prettyPrint();
	});
</script>	
</body> 
</html>