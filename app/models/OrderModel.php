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
        return $this->db->lastId();
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
        $this->db->bind(":id", intval($id));
        $this->db->bind(":status", $status);
        $this->db->execute();
    }

    public function getCreatedOrder()
    {
        $this->db->query("SELECT command.*, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
        $this->db->bind(":status", "created");
        return $this->db->resultSet();
    }

    public function getShippedOrder()
    {
        $this->db->query("SELECT command.*, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
        $this->db->bind(":status", "shipped");
        return $this->db->resultSet();
    }

    public function getDelivredOrder()
    {
        $this->db->query("SELECT command.*, costumer.address, costumer.full_name FROM command JOIN costumer ON costumer.id = command.costumer_id WHERE status = :status");
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

    public function nbrShipped()
    {
        $this->db->query("SELECT count(*) as nbr FROM command WHERE status = 'shipped' ");
        return $this->db->single();
    }

    public function nbrDelivred()
    {
        $this->db->query("SELECT count(*) as nbr FROM command WHERE status = 'delivred' ");
        return $this->db->single();
    }

    public function nbrOrder()
    {
        $this->db->query("SELECT count(*) as nbr FROM command");
        return $this->db->single();
    }

    public function getUserAndInfo($id)
    {
        $this->db->query("SELECT costumer.*, product.*, commandItems.qte  FROM command JOIN costumer ON command.costumer_id = costumer.id 
        JOIN commandItems ON  commandItems.command_id = command.id 
        JOIN product ON product.id = commandItems.product_id 
        WHERE command.id = :id");
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }
}
