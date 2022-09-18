<!DOCTYPE html>  
     <head>  
      <title>Hello World!</title>
      <style>
        .form {
          margin: 0 auto;
          width: 90%;
          justify-content: center;
          align-items: center;
        }
        .form input {
          height: 3em;
          padding: 1px;
          width: 50%;
          border: 1px solid #e3e3e3;
        }
        .form button {
          border: 0;
          color: white;
          background: green;
          padding: 2%;
          cursor: pointer;
          margin-left: 10px;
        }
        .output {
          border: 1px solid red;
          padding: 2em;
          display: flex;
          justify-content: center;
          width: 30%;
          font-size: 2em;
          margin: 1em auto;
        }
      </style>
     </head>   

     <body> 
      <?php
        require __DIR__ . '/vendor/autoload.php';

use Guzzle\Common\Exception\GuzzleException;
use GuzzleHttp\Client;
        
        function getStatusCode() {
          $client = new Client();
          $url = trim($_POST['url']);
          if (isset($url) && !empty($url)) {
            $url = filter_var($url, FILTER_VALIDATE_URL);
            try {
              $response = $client->request('GET', $url);
              return $response->getStatusCode();
            } catch(GuzzleException $e) {
              return $e->getStatusCode;
            }
            
          }
        }
      ?> 
      <h1>Добавть сайт и я скажу доступен ли он</h1>  

      <div class="form">
      <form action="index.php" method="POST">
          <input type="text" placeholder="url" name="url">
          <button type="submit">Отправить</button>
       </form>
      </div>
      <h2 class="output"><?php echo getStatusCode(); ?></h2>
    </body>
</html>