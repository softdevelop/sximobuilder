<!DOCTYPE html>
<html lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>{{ CNF_APPNAME }}</title>
	
		{{ HTML::style('sximo/css/bootstrap.css')}}
		{{ HTML::style('sximo/css/sximo.css')}}
		{{ HTML::style('sximo/css/icons.min.css')}}

	
  	</head>

<body style="background:#f0f0f0 !important" >
	<div class="sbox" style="width:300px; margin:100px auto; text-align:center;">
		<div class="sbox-title"> <h4> Ops , Something Goes Wrong  </h4> </div>
		<div class="sbox-content">		
			<div class="error-wrapper text-center">
			  <h1 class="text-center">{{ $code }} </h1>
			  <h6 class="text-center">{{ $note }}</h6>
			  <hr />
			  <!-- Error content -->
			  <div class="error-content">
			    <div class="row" style="text-align:center;">
			     <a href="javascript:history.go(-1)">Back to Previous page</a> 
			    </div>
			  </div>
		</div>
		</div>		  
		  
		</div>
			
	</div>	  
		
</div>
	  
</html>

