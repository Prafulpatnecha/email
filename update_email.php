<?php
    header("Access-Control-Allow-Method:PUT");
    header("Content-Type: application/json");

    include("config.php");
    $c1 = new Config();

    if($_SERVER["REQUEST_METHOD"]=="PUT")
    {
        $data = file_get_contents("php://input");
        parse_str($data, $result);
        $email = "omg@gmail.com";
        #// $email = $result['email'];
        #// $address = $result['address'];
        #// $contact = $result['contact'];
        #// $isBlock = $result['isBlock'];
        #// $isUpdate = $result['isUpdate'];
        #// $userName = $result['userName'];
        // if($profileImage != null)
        // {
            // $profileImage = $result['profileImage'];
            print_r($result);
            $image = $_FILES['image'];
            $name = $image["name"];
            $tmp_name = $image["tmp_name"];
    
            $id = uniqid("omgcreation");

            $isImageUpload = move_uploaded_file($tmp_name,"images/".$id.$name);
            
            $arr['msg'] = "$tmp_name ?? $id ??$name";
            if($isImageUpload)
            {
                $res = $c1->updateProfileToIdEmail($email,$name);
                
                if($res)
                {
                    $arr['msg'] = "Data updated successfully";
                }else{
                    $arr['err'] = "Image not uploaded Database!";
                }
            }else{
                $res = $c1->updateProfileToIdEmail($email,$result["image"]);
                $arr['err'] = "Image not uploaded Server!";
            }
        // }
    }else{
        $arr['err'] = "PUT method not found";
    }
    
    echo json_encode($arr);
    #// else{
    #//     $res = $c1->updateToIdEmail($email,$address,$contact,$isBlock,$isUpdate,$userName,$profileImage);
    #//         if($res)
    #//         {
    #//             $arr['msg'] = "Data updated successfully";
    #//         }else{
    #//             $arr['err'] = "Image not uploaded Database!";
    #//         }
    #// }
    ?>