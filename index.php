<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <p>
            <br><h1>Lab Linking Server Client</h1><br>
        <?php
        print "Bouyachaka";
        ?>
        </p>
        <?php

            include ("scripts/db_connect.php");
            /**
             * Created by PhpStorm.
             * User: 1606149
             * Date: 07/11/2016
             * Time: 13:07
             */

            // Start XML file, create parent node

            $dom = new DOMDocument("1.0");
            $node = $dom->createElement("markers");
            $parnode = $dom->appendChild($node);

            // Select all rows in the markers table

            $query  = "SELECT * FROM markers WHERE 1";
            $result = $db->query($query);
            if(!$result){
                die('Nothing in result: ');
            }

            header("Content-type: text/html");

            // Iterate through the rows, adding XML nodes for each

            while($row = $result->fetch_array()){
                // ADD TO XML DOCUMENT NODE
                $node = $dom->createElement("marker");
                $newnode = $parnode->appendChild($node);
                $newnode->setAttribute("name",$row['name']);
                $newnode->setAttribute("address",$row['address']);
                $newnode->setAttribute("lat",$row['lat']);
                $newnode->setAttribute("lng",$row['lng']);
                $newnode->setAttribute("type",$row['type']);
            }
            $result->close();
            $db->close();

            echo $dom->saveXML();

    //api google key :  AIzaSyBf7897Vvv1qEQidZdzbF9zq_lfadpnlJc


        ?>
        <ul>
            <li><a href="mapPage.html">Go to the Map Page of Bouyachaka</a></li>
        </ul>

    </body>
</html>
