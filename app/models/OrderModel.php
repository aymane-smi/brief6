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
        $this->db->query("INSERT INTO command(costumer_id, creationDate, status) VALUES(:costumer_id, :creationDate, :status)");
        $this->db->bind(":costumer_id", 1);
        $this->db->bind(":creationDate", date("y-m-d"));
        $this->db->bind(":status", "created");
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

    public function changeOrderStatus($id, $status)
    {
        $this->db->query("UPDATE command SET status = :status WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":status", $status);
        $this->db->execute();
    }

    public function getCreatedOrder()
    {
        $this->db->query("SELECT *, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
        $this->db->bind(":status", "created");
        return $this->db->resultSet();
    }

    public function getShippedOrder()
    {
        $this->db->query("SELECT *, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
        $this->db->bind(":status", "shipped");
        return $this->db->resultSet();
    }

    public function getDelivredOrder()
    {
        $this->db->query("SELECT *, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
        $this->db->bind(":status", "delivred");
        return $this->db->resultSet();
    }

    public function CountByMonth($month)
    {
        $this->db->query("SELECT * FROM command WHERE MONTH(creationDate) = :month");
        $this->db->bind(":month", $month);
        $this->db->execute();
        return $this->db->rowCount();
    }
}