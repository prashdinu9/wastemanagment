<?php

class notification
{
    public function addNotification()
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO notification (notificationDate,senderID,type,message,notificationStatus,receiverID) VALUES (NOW(),'Pending','$s_id')";
        $result = $con->query($sql);
        $notification_id = $con->insert_id;
        return $notification_id;
    }


    public function viewNotifications($receiverID)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM notification n, notificationtypes nt, customer c WHERE n.typeID=nt.notificationTypeID AND n.receiverID='1' AND c.cusID=n.senderID";
        $result = $con->query($sql);
        return $result;
    }




    public function addToCart($proID, $colorID, $sizeID, $qty, $proPrice, $totprice, $notification_id)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO cart (proID,colorID,sizeID,quantity,price,totprice,notification_id) VALUES ('$proID','$colorID','$sizeID','$qty','$proPrice','$totprice','$notification_id')";
        $result = $con->query($sql);
        return $result;
    }

    public function addToCartTicket($ticket_id, $qty, $ticket_price, $totprice, $notification_id)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO cart (ticket_id,quantity,price,totprice,notification_id) VALUES ('$ticket_id','$qty','$ticket_price','$totprice','$notification_id')";
        $result = $con->query($sql);
        return $result;
    }

    public function viewACart($notification_id)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT SUM(c.quantity) qsum, c.proID,c.price,SUM(c.totprice) tp,p.proName,s.sizeCode,co.colorCode,co.colorName FROM cart c,product p,productsize s,productcolor co WHERE c.notification_id='$notification_id' AND c.proID=p.proID AND c.sizeID=s.sizeID AND c.colorID=co.colorID GROUP BY c.proID,c.sizeID,c.colorID";
        $result = $con->query($sql);
        return $result;
    }

    public function viewATicketCart($notification_id)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT SUM(c.quantity) qsum, c.ticket_id,c.price,SUM(c.totprice)tp,t.ticket_image,e.event_name FROM cart c,ticket t,event e WHERE c.ticket_id=t.ticket_id AND c.notification_id='$notification_id' AND e.event_id=t.ticket_id GROUP BY c.ticket_id";
        $result = $con->query($sql);
        return $result;
    }
}
