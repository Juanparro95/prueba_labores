<?php 

class BusinnesController extends Controller{

    function __construct()
    {
        
    }

    public function Index(){
        try{
			$business = new BusinnesModel();
            $listBusiness = $business -> All();

            json_output(json_build(200, ["businnes" => $listBusiness]));

		} 

		catch (Exception $e){

			json_output(json_build(400, $e -> getMessage()));
		}
    }

    public function Get(){
        
    }
}