<?php 

class Products extends Controller
{

    public function index() 
    {
        //echo "This is product controller.";
        $this->view('products/products');
    }

}

?>  