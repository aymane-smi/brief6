<?php
class Utils extends Controller
{
    private $Order;

    public function __construct()
    {
        $this->Order = $this->model("OrderModel");
    }

    public function getMonthsData()
    {
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            array_push($result, $this->Order->countByMonth($i));
        }
        echo json_encode($result);
    }
}
