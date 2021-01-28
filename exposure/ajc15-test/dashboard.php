<?php
    /*Execute the code to connect to the database*/
    require("dbconnect.php");

///////////////////////////////////////
/////////////// Posts /////////////////
///////////////////////////////////////

    echo 'Posts:<br>';

   /*Create a queryto be used*/
    $fetch_posts = "SELECT * FROM Posts WHERE post_type = 'Post'";

     /*If the query is successful*/
    if  ($posts = $mysqli->query($fetch_posts)){
        /*If there are more than 0 results*/
        if ($posts->num_rows > 0){
            while ($post_data = $posts->fetch_object()){
                $fetch_profile_pic = "SELECT profile_picture FROM Profiles WHERE user_id = '" . $post_data->user_id . "'";
                if  ($poster_profile_pic = $mysqli->query($fetch_profile_pic)){
                    if ($poster_profile_pic->num_rows > 0){
                       echo "<img src='" . $poster_profile_pic->fetch_object()->profile_picture . "' style='width:25px; height:25px;'>";
                    }
                }
                
                $fetch_poster = "SELECT screen_name FROM Users WHERE user_id = '" . $post_data->user_id . "'";
                
                if  ($poster_screen_name = $mysqli->query($fetch_poster)){
                    if ($poster_screen_name->num_rows > 0){
                       echo $poster_screen_name->fetch_object()->screen_name . "<br>";
                    }
                }
                echo "<img src='" . $post_data->image . "' style='width:5%; height:10%'><br><br>";
            }
        }
    }
  
///////////////////////////////////////
/////////// Challenges ////////////////
///////////////////////////////////////

    echo 'Challenges:<br>';

   /*Create a queryto be used*/
    $fetch_challenges = "SELECT * FROM Posts WHERE post_type = 'Challenge'";

     /*If the query is successful*/
    if  ($challenge = $mysqli->query($fetch_challenges)){
        /*If there are more than 0 results*/
        if ($challenge->num_rows > 0){
            while ($challenges_data = $challenge->fetch_object()){
                $fetch_profile_pic = "SELECT profile_picture FROM Profiles WHERE user_id = '" . $challenges_data->user_id . "'";
                if  ($challenger_profile_pic = $mysqli->query($fetch_profile_pic)){
                    if ($challenger_profile_pic->num_rows > 0){
                       echo "<img src='" . $challenger_profile_pic->fetch_object()->profile_picture . "' style='width:25px; height:25px;'>";
                    }
                }
                
                $fetch_challenger = "SELECT screen_name FROM Users WHERE user_id = '" . $challenges_data->user_id . "'";
                
                if  ($challenger_screen_name = $mysqli->query($fetch_challenger)){
                    if ($challenger_screen_name->num_rows > 0){
                       echo $challenger_screen_name->fetch_object()->screen_name . "<br>";
                    }
                }
                echo "<img src='" . $challenges_data->image . "' style='width:5%; height:10%'><br><br>";
                
                
                $fetch_comments = "SELECT * FROM Comments WHERE post_id = '" . $challenges_data->post_id . "'";
                
                 /*If the query is successful*/
                if  ($comments = $mysqli->query($fetch_comments)){
                    /*If there are more than 0 results*/
                    if ($comments->num_rows > 0){                        
                        while ($content = $comments->fetch_object()){
                            
                            $fetch_comment_user = "SELECT screen_name FROM Users WHERE user_id = '" . $content->user_id . "'";
                
                             /*If the query is successful*/
                            if  ($comment_user = $mysqli->query($fetch_comment_user)){
                                echo "<p>" . $comment_user->fetch_object()->screen_name . ": " . $content->content . "</p>";
                            } 
                        }
                    }
                }
                
                $fetch_hashtags = "SELECT * FROM Hashtags WHERE post_id = '" . $challenges_data->post_id . "'";
                
                 /*If the query is successful*/
                if  ($hashtags = $mysqli->query($fetch_hashtags)){
                    /*If there are more than 0 results*/
                    if ($hashtags->num_rows > 0){                        
                        while ($hashtag = $hashtags->fetch_object()){
                            echo $hashtag->hashtag;
                        }
                    }
                }
                echo "<br><br>";
            }          
        }
    }

///////////////////////////////////////
///////////// People //////////////////
///////////////////////////////////////

 echo 'People:<br>';

   /*Create a queryto be used*/
    $fetch_people = "SELECT * FROM Users";

     /*If the query is successful*/
    if  ($people = $mysqli->query($fetch_people)){
        /*If there are more than 0 results*/
        if ($people->num_rows > 0){
            while ($person_data = $people->fetch_object()){
                $fetch_profile_pic = "SELECT profile_picture FROM Profiles WHERE user_id = '" . $person_data->user_id . "'";
                
                if  ($profile_pic = $mysqli->query($fetch_profile_pic)){
                    if ($profile_pic->num_rows > 0){
                       echo "<img src='" . $profile_pic->fetch_object()->profile_picture . "' style='width:25px; height:25px;'>";
                    }
                }
                
                $fetch_screen_name = "SELECT screen_name FROM Users WHERE user_id = '" . $person_data->user_id . "'";
                
                if  ($poster_screen_name = $mysqli->query($fetch_screen_name)){
                    if ($poster_screen_name->num_rows > 0){
                       echo $poster_screen_name->fetch_object()->screen_name . "<br>";
                    }
                }
            }
        }
    }

///////////////////////////////////////
//////////// Hashtags /////////////////
///////////////////////////////////////

 echo '<br>Hashtags:<br><br>';

   /*Create a queryto be used*/
    $fetch_hashtags = "SELECT * FROM Hashtags";

     /*If the query is successful*/
    if  ($hashtags = $mysqli->query($fetch_hashtags)){
        /*If there are more than 0 results*/
        if ($hashtags->num_rows > 0){
            while ($hashtag = $hashtags->fetch_object()){
                echo $hashtag->hashtag . "<br>";
            }
        }
    }
?>