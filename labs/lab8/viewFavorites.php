<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Pixabay API Favorites</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script>
        /* global $ */
        
        function createActionButton(keyword){
            
            let htmlStr = "<button onclick='displayFavorites(this.innerHTML)'>";
            htmlStr += keyword;
            htmlStr += "</button>";
            
            return htmlStr;
        }
        
        function displayFavorites(keyword){
            
            $.ajax({
                    method: "GET",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action" : "favorites", "url" : "", "keyword" : keyword},
                    success: function(data, status) {
                        
                        let htmlString = "";
                        let newRow = 0
                        $("#images").html("");
                        data.forEach(function(ele){
                            
                            if(newRow == 0){
                                htmlString += "<div class='row'>";
                            }
                            
                            htmlString += "<img class='favorite' src='img/favorite_on.png' width='30'>";
                            htmlString += "<img src='" + ele['imageURL'] + "' width='300' height='280'>";
                            
                            if(newRow == 2){
                                newRow = -1;
                                htmlString += "</div>";
                            }
                            
                            newRow++;
                        });
                        
                    $("#images").html(htmlString);

                    }
                }); //ajax 
        }
        
        $(document).ready(function() {

                $.ajax({
                    method: "GET",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action" : "keyword", "url" : "", "keyword" : ""},
                    success: function(data, status) {
                        let newRow = 0
                        data.forEach(function(ele){
                            newRow++;
                            $("#links").append(createActionButton(ele['keyword']));
                            if(newRow > 7){
                                $("#links").append("<br>");    
                                newRow = 0;
                            }
                        });
                    }
                }); //ajax 
                
                $("#images").on("click", ".favorite", function() {

                    if ($(this).attr("src") == "img/favorite.png") {

                    $(this).attr("src", "img/favorite_on.png");
                    //add image url to database
                    callFavoriteAPI("add", $(this).next().attr("src"), $("#keyword").val());
                }
                else {

                    $(this).attr("src", "img/favorite.png");
                    //remove image url from database
                    callFavoriteAPI("delete", $(this).next().attr("src"), $("#keyword").val());

                }
                
                function callFavoriteAPI(action, url, keyword) {

                $.ajax({
                    method: "GET",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action": action, "url": url, "keyword": keyword },
                    success: function(data, status) {

                    }
                }); //ajax 
            }
            });

        }); //documentReady
    </script>
    </head>
    <body>

        <h1> Favorite Images </h1>
        <br>
        <div id="links"></div>
        <div id="images"></div>
        <br>
        <form action="index.html">
            <button> Return </button>
        </form>
        
    </body>
</html>