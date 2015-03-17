{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>	  
	  
    </div>
	
	
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
	    <div class="toolbar-line ">
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('{class}/add?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-sm btn-white"  title="{{ Lang::get('core.btn_create') }}">
			<i class="fa fa-plus-circle text-info"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}">
			<i class="fa fa-minus-circle text-danger"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
			@endif 		
			@if($access['is_excel'] ==1)
			<a href="{{ URL::to('{class}/download?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_download') }}">
			<i class="fa fa-download text-warning"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
			@endif			
		 
		</div> 		

	{{ $details }}
	
	 {{ Form::open(array('url'=>'{class}/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
	 <div class="table-responsive" style="min-height:300px;">
    <table class="table table-striped ">
        <thead>
			<tr>
				<th class="number"> No </th>
				<th> <input type="checkbox" class="checkall" /></th>
				
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
						<th>{{ $t['label'] }}</th>
					@endif
				@endforeach
				<th width="120" >{{ Lang::get('core.btn_action') }}</th>
			  </tr>
        </thead>

        <tbody>
			<tr id="sximo-quick-search" >
				<td class="number"> # </td>
				<td> </td>
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
					<td>						
						{{ SiteHelpers::transForm($t['field'] , $tableForm) }}								
					</td>
					@endif
				@endforeach
				<td >
				<input type="hidden"  value="Search">
				<button type="button"  class=" do-quick-search btn btn-xs btn-info"> GO</button></td>
			  </tr>				
            @foreach ($rowData as $row)
                <tr>
					<td width="30"> {{ ++$i }} </td>
					<td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->{key} }}" />  </td>									
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 <td>					 
					 	@if($field['attribute']['image']['active'] =='1')
							{{ SiteHelpers::showUploadedFile($row->$field['field'],$field['attribute']['image']['path']) }}
						@else	
							{{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
							{{ SiteHelpers::gridDisplay($row->$field['field'],$field['field'],$conn) }}	
						@endif						 
					 </td>
					 @endif					 
				 @endforeach
				 <td>
					 	
						{{--*/ $id = SiteHelpers::encryptID($row->{key}) /*--}}
					 	@if($access['is_detail'] ==1)
						<a href="{{ URL::to('{class}/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}" class="tips btn btn-xs btn-white" title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search"></i></a>
						@endif
						@if($access['is_edit'] ==1)
						<a  href="{{ URL::to('{class}/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}" class="tips btn btn-xs btn-white" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i></a>
						@endif
						@foreach($subgrid as $md)
						<a href="{{ URL::to($md['module'].'?md='.$md['master'].'+'.$md['master_key'].'+'.$md['module'].'+'.$md['key'].'+'.$id) }}"  class="tips btn btn-xs btn-white tips" title="{{ $md['title'] }}" ><i class="icon-eye2"></i></a>
						@endforeach							
					
				</td>				 
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="{{ $masterdetail['filtermd']}}" />
	</div>
	{{ Form::close() }}
	@include('footer')
	</div>
</div>	
	</div>	  
</div>	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("{class}/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>		