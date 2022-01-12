<html>
    <head>
        <title>API</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
            <form name="form" action="" method="get" class="input-group">
                <select name="select" id="select" class="form-select" aria-label="Default select example" value="xd">
                    <option selected value="posts">posts</option>
                    <option value="comments">comments</option>
                    <option value="albums">albums</option>
                    <option value="todos">todos</option>
                    <option value="users">users</option>
                    
                </select>
                <span class="input-group-text">Ingresa el id</span>
                <input value=0 id="id" name="id" type="number" aria-label="Last name" class="form-control">
                <input type="submit" class="btn btn-primary">
            </form>
            
        
        <?php
            if($_GET["select"]){
                echo "<h1>{$_GET["select"]}, solicitud de id: {$_GET["id"]}</h1>";
                $url = "https://jsonplaceholder.typicode.com/{$_GET["select"]}/{$_GET["id"]}";

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $headers = array(
                    "Accept: application/json",
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $resp = curl_exec($curl);
                curl_close($curl);
                $json = json_decode($resp, true);
                foreach($json as $key=>$value){
                    echo "<b>$key:</b>";
                    echo "$value<br>";
                }
            }
            
        ?>
    </body>
</html>