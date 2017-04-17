<?php
 
    //Affichage des commentaires
    $req_comment = "SELECT * FROM comment WHERE comment.id_reply=0 ORDER BY comment.id ASC";           
    $result_comment = mysql_query($req_comment) or die(mysql_error());
 
    while($data = mysql_fetch_object($result_comment)){
        echo $data->message . '<br/>';
 
        $req_rep = "SELECT * FROM comment WHERE comment.id_reply=$data->id ORDER BY comment.id";        
        $result_rep = mysql_query($req_rep) or die(mysql_error());
 
        while($data_rep = mysql_fetch_object($result_rep)){
            echo $data_rep->message . '<br/>';
 
                $req_rep2 = "SELECT * FROM comment WHERE comment.id_reply=$data_rep->id ORDER BY comment.id";           
                $result_rep2 = mysql_query($req_rep2) or die(mysql_error());
 
                while($data_rep2 = mysql_fetch_object($result_rep2)){
                    echo $data_rep2->message . '<br/>';
                }
        }
    }
?>