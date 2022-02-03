<?php
  function callApi($data, $method){
          $url="";
          $data = json_encode($data);
          $curl = curl_init();
          switch ($method){
              case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
              case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
              default:
              if ($data)
                  $url = sprintf("%s?%s", $url, http_build_query($data));
          }
          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              'Authorization: 0BT0QyiBN3BStUoUk6E',
              'Content-Type: application/json',
          ));

          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          $result = curl_exec($curl);
          if(!$result){die("Connection Failure");}
          curl_close($curl);
          return $result;
      }
?>
