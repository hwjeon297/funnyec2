<?php

class ConnectModel
{
    public $connect;

    public function __construct() {
        $this->connect = mysqli_connect("localhost", "root", "rootroot", "ec");
    }

    public function selectDatabase($date)
    {
        $sql = "SELECT * FROM ec.order WHERE DATE(order_time) = '$date'";

        $result = mysqli_query($this->connect, $sql);

        return $result;
    }

    public function popularItem($date)
    {
        // OrderId Arr 
        $itemArr = $this->countOrderItem($date);

        return $itemArr;
        
    }

    public function countOrderItem($date)
    {
        $infoArr = [];

        $sql = "SELECT
                order_code,
                (SELECT 
                    sum(sub.order_qty)
                FROM
                    ec.order_detail as sub
                    , ec.order as sub2
                WHERE
                    order_detail.order_code = sub.order_code
                AND
                    sub2.order_time like '$date%'
                AND
                    sub.id = sub2.order_id
                GROUP BY
                    sub.order_code
                ) as qty,
                p.name
            FROM
                ec.order_detail as order_detail
                , ec.order as o
                , ec.product as p
            WHERE 
                o.order_time like '$date%'
            AND
                order_detail.id = o.order_id
            AND
                p.code = order_detail.order_code
            GROUP BY
                order_detail.order_code 
            ORDER BY
                qty desc
            LIMIT
                3
            "; 



        $result = mysqli_query($this->connect, $sql);

        while ($info = mysqli_fetch_assoc($result)) {
            array_push($infoArr, $info);
        }

        return $infoArr;
    }
}











?>