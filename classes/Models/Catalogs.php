<?php  

	/**
	 * 
	 */
	class Catalogs extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function getCatalog(Request $request)
		{
			return $this->ViewList($request->get("catalog"));
		}
	}

?>