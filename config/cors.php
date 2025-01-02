<?php
return [
   'paths' => ['api/*', '*', 'sanctum/csrf-cookie'],  // Esto permite que CORS se aplique a todas las rutas o solo a rutas específicas como '/api/*'.
    
   //'allowed_methods' => ['GET','POST','PUT','DELETE','OPTIONS'],    
   'allowed_methods' => ['*'],    
    
    'allowed_origins' => ['*'],  
    
    'allowed_origins_patterns' => [],  
    
    //'allowed_headers' => ['Content-Type', 'Authorization', 'X-Requested-With','Origin', 'X-Auth-Token', 'Cookie'], //before '*'
    'allowed_headers' => ['*'], 
    
    'exposed_headers' => [],  
    
    'max_age' => 0,  
    
    'supports_credentials' => true,  

];