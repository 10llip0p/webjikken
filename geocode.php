<?php
    session_start();
    $db = new SQLite3('./db/geo.sqlite3');

    $obj_gn = $_SESSION["obj"];

    $total = $obj_gn->{"total_hit_count"};

    for ($i = 0; $i < $total; $i++) {
        $address = $obj_gn->{"rest"}[$i]->{"address"};
        $pattern = '/\s.+/';
        preg_match($pattern, $address, $matches);
        $targetAddress = $matches[0];
        $obj_gn_id = (int)$obj_gn->{"rest"}[$i]->{"id"};
        $obj_gn_name = $obj_gn->{"rest"}[$i]->{"name"};
       // var_dump($obj_gn_name);
        $sql_result = $db->query("SELECT * FROM geo WHERE name=='$obj_gn_name'");
        $data = $sql_result->fetchArray();
        if ($data["id"] == null) {
         //geocode
            $ret = "http://maps.google.com/maps/api/geocode/json";
            $ret .= "?address=".urlencode($targetAddress);
            $ret .= "?sensor=false";

            $json_geo = file_get_contents($ret);

            $obj_geo = json_decode($json_geo);

            //住所から座標を取得
            if($obj_geo->{"status"} == "OK") {
                $location = $obj_geo->{"results"}[0]->{"geometry"}->{"location"};
                $lat = $location->{'lat'};
                $lng = $location->{'lng'};
                $obj_gn->{"rest"}[$i]->{"latitude"} = $lat;
                $obj_gn->{"rest"}[$i]->{"longitude"} = $lng;

                $db->exec('begin');
                try {
                    $stmt = $db->prepare('insert into geo (id,name,lat,lng) values(:json_id,:json_name,:geo_lat,:geo_lng)');

                    $stmt->bindValue(':json_id', $obj_gn_id, SQLITE3_INTEGER);
                    $stmt->bindValue(':json_name',$obj_gn_name , SQLITE3_TEXT);
                    $stmt->bindValue(':geo_lat', $lat, SQLITE3_FLOAT);
                    $stmt->bindValue(':geo_lng', $lng, SQLITE3_FLOAT);

                    $result = $stmt->execute();
                    // COMMIT
                    $db->exec('commit');
                } catch (Exception $e) {
                    // ROLLBACK
                    $db->exec('rollback');
                    $e->getTraceAsString();
                    return;
                }
            }
            else {
                $obj_gn->{"rest"}[$i]->{"latitude"} = (float)$obj_gn->{"rest"}[$i]->{"latitude"} ;
                $obj_gn->{"rest"}[$i]->{"longitude"} = (float)$obj_gn->{"rest"}[$i]->{"longitude"} ;

                $db->exec('begin');
                try {
                    $stmt = $db->prepare('insert into geo (id,name,lat,lng) values(:json_id,:json_name,:geo_lat,:geo_lng)');

                    $stmt->bindValue(':json_id', $obj_gn_id, SQLITE3_INTEGER);
                    $stmt->bindValue(':json_name',$obj_gn_name , SQLITE3_TEXT);
                    $stmt->bindValue(':geo_lat', $obj_gn->{"rest"}[$i]->{"latitude"}, SQLITE3_FLOAT);
                    $stmt->bindValue(':geo_lng', $obj_gn->{"rest"}[$i]->{"longitude"}, SQLITE3_FLOAT);

                    $result = $stmt->execute();
                    // COMMIT
                    $db->exec('commit');
                } catch (Exception $e) {
                    // ROLLBACK
                    $db->exec('rollback');
                    $e->getTraceAsString();
                    return;
                }
            }
            usleep(250000);
        }
        else {
            $obj_gn->{"rest"}[$i]->{"latitude"} = $data["lat"];
            $obj_gn->{"rest"}[$i]->{"longitude"} = $data["lng"];
        }
    }
    $db->close();

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($obj_gn);
?>
