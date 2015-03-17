	<div class="block-widget">	
		<h3 >Categories</h3>	
	
			<ul class="nav nav-stacked nav-pills"> 
			@foreach($blogcategories as $cat)
				<li> <a class="dk" href="{{ URL::to('blog/category/'.$cat->alias)}}"> {{ $cat->name}} &nbsp; <span class="label label-success pull-right">{{ $cat->total}}</span> </a> </li>  
			@endforeach	
			</ul>
	</div>


	
