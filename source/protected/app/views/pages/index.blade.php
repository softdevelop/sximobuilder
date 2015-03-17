{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
	  
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>
	  	  
    </div>
	
	<div class="page-content-wrapper m-t">
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	{{ $details }}

	

<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h5> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small></h5>
		<div class="sbox-tools" >
		@if(Session::get('gid') ==1)
			<a href="{{ URL::to('module/config/'.$pageModule) }}" class="btn btn-xs btn-white tips" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa fa-cog"></i></a>
		@endif 
		</div>
	</div>	
	<div class="sbox-content"> 
	<div class="toolbar-line "> 
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('pages/add') }}" class="tips btn btn-smm btn-white" title="{{ Lang::get('core.btn_create') }}"><i class="fa fa-plus-circle text-success"></i> {{ Lang::get('core.btn_create') }}</a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}"><i class="fa fa-minus-circle text-danger"></i> {{ Lang::get('core.btn_remove') }}</a>
			@endif 					
	</div>		
	 {{ Form::open(array('url'=>'pages/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	 <div class="table-responsive">
    <table class="table table-striped  ">
        <thead>
		<tr>
			<th> No </th>
			<th> <input type="checkbox" class="checkall i-checks-all " /></th>
		 @foreach ($tableGrid as $t)
		 	@if($t['view'] =='1')
			 <th>{{ $t['label'] }}</th>
			 @endif
		  @endforeach
		  	<th> Url </th>
			<th width="70"> {{ Lang::get('core.btn_action') }} </th>
           </tr>
        </thead>

        <tbody>
            @foreach ($rowData as $row)
                <tr>
					<td width="50"> {{ ++$i }} </td>
					<td width="50">
					@if($row->pageID !='1')
					<input type="checkbox" class="ids  i-checks" name="id[]" value="{{ $row->pageID }}" />  
					@endif
					</td>				
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 <td>					 
					 	@if($field['attribute']['image']['active'] =='1')
							<img src="{{ asset($field['attribute']['image']['path'].'/'.$row->$field['field'])}}" width="50" />
						@else	
							{{ $row->$field['field'] }}	
						@endif						 
					 </td>
					 @endif
					 			 
				 @endforeach
				 <td > <a href="{{ ($row->alias =='home' ? URL::to('') : URL::to('/'.$row->alias)) }}" target="_blank"> <small class="text-mute">
				 {{ ($row->alias =='home' ? URL::to('') : URL::to($row->alias)) }}</small> </a> </td>	
				 <td>
				 	
					{{--*/ $id = SiteHelpers::encryptID($row->pageID) /*--}}
				 	@if($access['is_detail'] ==1)
					<a href="{{ ($row->alias =='home' ? URL::to('') : URL::to('/'.$row->alias)) }}" class="tips btn btn-xs btn-white" title="{{ Lang::get('core.btn_view') }}"  target="_blank">
					<i class="fa fa-search"></i> </a>
					@endif
					@if($access['is_edit'] ==1)
					<a href="{{ URL::to('pages/add/'.$id)}}" class="tips btn btn-xs btn-white" title="{{ Lang::get('core.btn_edit') }}">
					<i class="fa fa-edit"></i></a>
					@endif
				
				</td>		
                </tr>
            @endforeach
			
              
        </tbody>
      
    </table>
	</div>
	{{ Form::close() }}
	
	@include('footer')
	</div>
</div>	
	
	
	</div>
	
	</div>
</div>
