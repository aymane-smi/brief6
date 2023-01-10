<?php
class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function createOrder()
    {
        $this->db->query("INSERT INTO command(costumer_id, creationDate) VALUES(:costumer_id, :creationDate)");
        $this->db->bind(":costumer_id", 1);
        $this->db->bind(":creationDate", date("y-m-d"));
        $this->db->execute();
    }

    public function createOrderItems($command_id, $product_id, $qte)
    {
        $this->db->query("INSERT INTO commandItems(command_id, product_id, qte) VALUES(:command_id, :product_id, :qte)");
        $this->db->bind(":command_id", $command_id);
        $this->db->bind(":product_id", $product_id);
        $this->db->bind(":qte", $qte);
        $this->db->execute();
    }
}
