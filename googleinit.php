<!-- Client Initialization -->
<?php
        require __DIR__.'/vendor/autoload.php';
        $client =   new \Google_Client();
        $client->setApplicationName('Google Sheet With PHP');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(__DIR__.'/googlesheet_credentials.json');

        $service = new Google_Service_Sheets($client);

        $spreadsheetId="1kutTmZvf88Vc8YCSyPb_MwSy-56ZwXDtmuhalMoL6Lo";
   
        /** Save Data **/
           if(isset($_POST['submit'])){
              
               if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])){
                   $range  = "congress";
                   $values = [
                       [$_POST['name'],$_POST['email'],$_POST['mobile'],date('Y-m-d'),date('H:i:s')]
                   ];
                   
                   $body   = new Google_Service_Sheets_ValueRange([
                       'values' => $values
                   ]);
                   $params = [
                       'valueInputOption' => 'RAW'
                   ];
                   $insert = [
                       'insertDataOption' => 'INSERT_ROWS'
                   ];
                   $result = $service->spreadsheets_values->append(
                       $spreadsheetId,
                       $range,
                       $body,
                       $params,
                       $insert
                   );
               }
           }
       
       ?>