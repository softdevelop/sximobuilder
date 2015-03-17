<?php 

class PublicHelpers 
{

	static public function init( $class , $conf = array()  )
	{
		$task = Input::get('task');
		switch($task)
		{
			default:
				return self::display( $class , $conf  );
				break;
				
			case 'view':
				return self::view( $class );
				break;			
		}
	
	}

	static public function display( $class  , $conf   ) 
	{
		$conf = (!is_array($conf) ? array() : $conf);
	  	 $config	 	= 	$class::makeInfo( $class );	
        extract( array_merge( array(
			'limit'  	=> 10 ,
			'sort' 		=>  $config['key'] ,
			'order' 	=> 'asc' ,
			'params' 	=> '' ,

        ), $conf ));
		
		
			
		$data = array();
			
		$page = Input::get('page', 1);
		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : $sort); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : $order );		
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'),FILTER_VALIDATE_INT) : $limit) ,
			'sort'		=> $sort ,
			'order'		=> $order,

		);
			
		$results 	= 	$class::getRows($params );
		$data['key']				=  $config['key'];
		$data['rowData']		= $results['rows'];
		$data['tableGrid'] 		= $config['config']['grid'];
		
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = Paginator::make($results['rows'], $results['total'],$params['limit']);		
		$data['pagination']	= $pagination;
		// Build pager number and append current param GET
		// Row grid Number 
		$data['i']			= ($page * $params['limit'])- $params['limit']; 	
			
		return View::make('public.index',$data);	

	}
	
	static public function view( $class )
	{
		$id = Input::get('id');
		$id = SiteHelpers::encryptID($id,true);
		$results = 	$class::getRow($id );
		if(count($results)>=1)
		{
			$config	 = 	$class::makeInfo( $class );
			$data['tableGrid'] 		= $config['config']['grid'];
			$data['row']		= $results;
		
			return View::make('public.view',$data);	
		} else {
			return "NO PAGE FOUND !";
		}	
	}

}