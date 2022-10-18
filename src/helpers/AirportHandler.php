<?php
namespace src\helpers;

use \core\Database;
use \src\Config;
use \src\models\Airport;
use \src\models\Orders;


class AirportHandler {
    
    public static function getAirports() {
        $data = Airport::select()->execute();

        $airports = new Airport();
        $airports->data = [];

        foreach($data as $airport) {
            $newAirport = new Airport();
            $newAirport->name = strtolower($airport['name']);
            $newAirport->image = $airport['image'];

            $airports->data[] = $newAirport;
        }

        return $airports;
        
    }

    public static function saveOnSection($cep, $date, $passengers, $kids, $booster, $obs) {
        $_SESSION['cep_start'] = $cep;
        $_SESSION['date'] = $date;
        $_SESSION['passengers'] = $passengers;
        $_SESSION['kids_seats'] = $kids;
        $_SESSION['booster_seats'] = $booster;
        $_SESSION['obs'] = $obs;
    }

    public static function addAirport(
        $cep_start, $date, $passengers, $kids_seats = null, $booster_seats = null,
        $obs = null, $name, $email, $number, $street_name, $cep_end, $conection, $service_type, $airport, $id_user
    ) { 

        $pdo = Database::getInstance();
        $sql = $pdo->prepare("INSERT INTO `taxiorder` (`id`, `cep_start`, `date_start`, `passengers`, `kids_seats`, `booster_seats`, `obs`, `name_user`, `email`, `telefone`, `street_name`, `cep_end`, `conection`, `service_type`, `airport`, `id_user`)
         VALUES (NULL, :cep_start, :date, :passengers, :kids_seats, :booster_seats, :obs, :name, :email, :number, :street_name, :cep_end, :conection, :service_type, :airport, :id_user);");
        $sql->bindValue(':cep_start', $cep_start);
        $sql->bindValue(':date', $date);
        $sql->bindValue(':passengers', $passengers);
        $sql->bindValue(':kids_seats', $kids_seats);
        $sql->bindValue(':booster_seats', $booster_seats);
        $sql->bindValue(':obs', $obs);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':number', $number);
        $sql->bindValue(':street_name', $street_name);
        $sql->bindValue(':cep_end', $cep_end);
        $sql->bindValue(':conection', $conection);
        $sql->bindValue(':service_type', $service_type);
        $sql->bindValue(':airport', $airport);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();
        

    }

    public function getOrder($id, $service_type) {
        $pdo = Database::getInstance();

        if($service_type == 'airportTaxi') {
            $sql = $pdo->prepare("SELECT * FROM `taxiorder` WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();


            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

            $newOrder = new Orders(); 
            $newOrder->cep_start = $data[0]['cep_start'];
            $newOrder->date = $data[0]['date_start'];
            $newOrder->passengers = $data[0]['passengers'];
            $newOrder->kids_seats = $data[0]['kids_seats'];
            $newOrder->booster_seats = $data[0]['booster_seats'];
            $newOrder->obs = $data[0]['obs'];
            $newOrder->name_user = $data[0]['name_user'];
            $newOrder->email = $data[0]['email'];
            $newOrder->telefone = $data[0]['telefone'];
            $newOrder->street_name = $data[0]['street_name'];
            $newOrder->cep_end = $data[0]['cep_end'];
            $newOrder->conection = $data[0]['conection'];
            $newOrder->service_type = $data[0]['service_type'];
            $newOrder->airport = $data[0]['airport'];
            $newOrder->id = $data[0]['id'];

            return $newOrder;
        }
        if($service_type === 'bus') {
            $sql = $pdo->prepare("SELECT * FROM `bus` WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();


            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

            $newOrder = new Orders(); 
            $newOrder->date = $data[0]['date'];
            $newOrder->street = $data[0]['street'];
            $newOrder->cep_start = $data[0]['cep_start'];
            $newOrder->passengers = $data[0]['passengers'];
            $newOrder->obs = $data[0]['obs'];
            $newOrder->how = $data[0]['how'];
            $newOrder->name = $data[0]['name'];
            $newOrder->email = $data[0]['email'];
            $newOrder->phone = $data[0]['phone'];
            $newOrder->service_type = $data[0]['service_type'];
            $newOrder->id = $data[0]['id'];

            return $newOrder;
        }

        if($service_type === 'limousine') {
            $sql = $pdo->prepare("SELECT * FROM `limousine` WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();


            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

            $newOrder = new Orders(); 
            $newOrder->date = $data[0]['date'];
            $newOrder->street = $data[0]['street'];
            $newOrder->cep_start = $data[0]['cep_start'];
            $newOrder->passengers = $data[0]['passengers'];
            $newOrder->kids_seats = $data[0]['kids_seats'];
            $newOrder->booster_seats = $data[0]['booster_seats'];
            $newOrder->obs = $data[0]['obs'];
            $newOrder->how = $data[0]['how'];
            $newOrder->name = $data[0]['name'];
            $newOrder->email = $data[0]['email'];
            $newOrder->phone = $data[0]['phone'];
            $newOrder->service_type = $data[0]['service_type'];
            $newOrder->id = $data[0]['id'];

            return $newOrder;        }
        
        if($service_type === 'taxi') {
            $sql = $pdo->prepare("SELECT * FROM `taxi` WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();


            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

            $newOrder = new Orders(); 
            $newOrder->street_start = $data[0]['street_start'];
            $newOrder->cep_start = $data[0]['cep_start'];
            $newOrder->city_start = $data[0]['city_start'];
            $newOrder->street_end = $data[0]['street_end'];
            $newOrder->cep_end = $data[0]['cep_end'];
            $newOrder->city_end = $data[0]['city_end'];
            $newOrder->date = $data[0]['date_start'];
            $newOrder->passengers = $data[0]['passengers'];
            $newOrder->kids_seats = $data[0]['kids_seats'];
            $newOrder->booster_seats = $data[0]['booster_seats'];
            $newOrder->obs = $data[0]['obs'];
            $newOrder->name = $data[0]['name'];
            $newOrder->email = $data[0]['email'];
            $newOrder->phone = $data[0]['phone'];
            $newOrder->conection = $data[0]['conection'];
            $newOrder->service_type = $data[0]['service_type'];
            $newOrder->id = $data[0]['id'];

            return $newOrder;        }


    }

    public function getLastsOrderAirport() {
        $pdo = Database::getInstance();
        $sql = $pdo->query("SELECT * FROM `taxiorder` ORDER BY id DESC LIMIT 2");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date_start'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }

    public function getLastsOrderBus() {
        $pdo = Database::getInstance();
        $sql = $pdo->query("SELECT * FROM `bus` ORDER BY id DESC LIMIT 2");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }
    public function getLastsOrderLimousine() {
        $pdo = Database::getInstance();
        $sql = $pdo->query("SELECT * FROM `limousine` ORDER BY id DESC LIMIT 2");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;
            }
            
            return $order;
        }

    }
    public function getLastsOrderTaxi() {
        $pdo = Database::getInstance();
        $sql = $pdo->query("SELECT * FROM `taxi` ORDER BY id DESC LIMIT 2");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date_start'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }
}