<?php 

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '') 
    {
        $model = new Model;
        $arr['id'] = 1;
        $arr['name'] = "Person 1";

        $result = $model->where($arr);
        
        show($result);
        
        // echo "This is home controller.";
        $this->view('home');
    }
}

?>  