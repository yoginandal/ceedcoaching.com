<?php
// print_r($_POST);die;

header('Content-Type: application/json');
try {
    // Validate required fields
    $required_fields = ['Name', 'phone', 'qualification', 'course', 'city']; //'state', 'city'
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("All fields are mandatory");
        }
    }
    // Sanitize inputs
    $name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    // $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $qualification = filter_var($_POST['qualification'], FILTER_SANITIZE_STRING);
    $referrer = isset($_POST['referrer_name']) ? $_POST['referrer_name'] : '';
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
    $source = isset($_POST['sourcemedium']) ? $_POST['sourcemedium'] : '';
    $orderid = isset($_POST['orderid']) ? $_POST['orderid'] : '1052';
    $sitename = isset($_POST['sitename']) ? $_POST['sitename'] : 'CEEDLP';
    $campaign_url = isset($_POST['campaign_url']) ? $_POST['campaign_url'] : '';
    $campaign_name = isset($_POST['campaign_name']) ? $_POST['campaign_name'] : '';
    $network = isset($_POST['network']) ? $_POST['network'] : '';
    $medium = isset($_POST['medium']) ? $_POST['medium'] : '';
    $course = filter_var($_POST['course'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    // State name mapping
    $stateNames = [
        '1' => "Andaman &amp; Nicobar Islands",
        '2' => "Andhra Pradesh",
        '3' => "Arunachal Pradesh",
        '4' => "Assam",
        '5' => "Bihar",
        '6' => "Chandigarh",
        '7' => "Chhattisgarh",
        '32' => "Dadra and Nagar Haveli",
        '33' => "Daman and Diu",
        '8' => "Delhi",
        '9' => "Goa",
        '10' => "Gujarat",
        '11' => "Haryana",
        '12' => "Himachal Pradesh",
        '13' => "Jammu and Kashmir",
        '14' => "Jharkhand",
        '15' => "Karnataka",
        '16' => "Kerala",
        '17' => "Madhya Pradesh",
        '18' => "Maharashtra",
        '19' => "Manipur",
        '20' => "Meghalaya",
        '21' => "Mizoram",
        '22' => "Nagaland",
        '23' => "Orissa",
        '24' => "Pondicherry",
        '25' => "Punjab",
        '26' => "Rajasthan",
        '34' => "Sikkim",
        '27' => "Tamil Nadu",
        '36' => "Telangana",
        '28' => "Tripura",
        '29' => "Uttar Pradesh",
        '30' => "Uttaranchal",
        '31' => "West Bengal"
    ];

    // $statename = isset($stateNames[$state]) ? $stateNames[$state] : $state;
    // Prepare email content
    $to = "callcentre.brds@gmail.com";//callcentre.brds@gmail.com
    $subject = "Ceed Coaching Lead";
    $message = '<strong>Name: </strong>' . $name .
        '<br><strong>Phone: </strong>' . $phone .
        '<br><strong>Qualification: </strong>' . $qualification .
        '<br><strong>Course: </strong>' . $course .
        '<br><strong>City:</strong>' . $city;
    //   '<br><strong>State: </strong>' . $statename . 
    //   '<br><strong>City:</strong>' . $city;
    $headers = "From: no-reply@nidcoaching.org\r\n";
    $headers .= "Reply-To: no-reply@nidcoaching.org\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    // Send email in background (don't wait for response)
    $mailSent = @mail($to, $subject, $message, $headers);

    // Log email status but don't fail if email fails
    if (!$mailSent) {
        error_log("Failed to send email notification for lead: $name, $phone");
    }
    // Prepare CRM data
    $uniFields = array(
        'name' => urlencode($name),
        'phone' => urlencode($phone),
        'email' => "",
        'city' => urlencode($city),
        'query' => urlencode($qualification) , 
        'course' =>urlencode($course),
        'http_referer' => urlencode($referrer),
        'search_keyword' => urlencode($keyword),
        'campaign_url' => urlencode($campaign_url),
        'campaign_name' => urlencode($campaign_name),
        'network' => urlencode($network),
        'source' => urlencode($source),
        'medium' => urlencode($medium),
        'ORDERID' => urlencode($orderid),
        'SITENAME' => urlencode($sitename)
    );

    // print_r($uniFields);die();
    // Build CRM request string
    $uni_fields_string = '';
    foreach ($uniFields as $key => $value) {
        $uni_fields_string .= $key . '=' . $value . '&';
    }
    rtrim($uni_fields_string, '&');
    // Set up CRM API request with timeouts
    $uniUrl = 'https://crm.stealthdigital.in/lp/index';
    $post = curl_init();
    curl_setopt($post, CURLOPT_URL, $uniUrl);
    curl_setopt($post, CURLOPT_POST, true);
    curl_setopt($post, CURLOPT_POSTFIELDS, http_build_query($uniFields)); // handles encoding
    curl_setopt($post, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($post, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($post, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($post, CURLOPT_TIMEOUT, 10);

    // Execute CRM request but don't wait for response
    $content = curl_exec($post);

    // Log CRM errors but don't fail the submission
    if (curl_errno($post)) {
        error_log("CRM API Error: " . curl_error($post) . " for lead: $name, $phone");
    }

    curl_close($post);
    // Add Google Sheets submission
    $sheetsData = json_encode([
        'Name' => $name,
        'phone' => $phone,
        //'email' => "",
        'qualification' => $qualification,
        'course' => $course,
        'city' => $city,
        'referrer_name' => $referrer,
        'keyword' => $keyword,
        'sourcemedium' => $source,
        'campaign_url' => $campaign_url,
        'campaign_name' => $campaign_name,
        'network' => $network,
        'medium' => $medium,
        'orderid' => $orderid,
        'sitename' => $sitename
    ]);
    $sheetsResponse = file_get_contents('https://script.google.com/macros/s/AKfycbxEMi3vDXcsm7U4ef7v5OA7Uzv3wzFLnh7iNGft5LKQpdkjbGsjDrPql9b69AbcrX9u/exec', false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($sheetsData)
            ],
            'content' => $sheetsData
        ]
    ]));
    error_log("Google Sheets Request Data: " . $sheetsData);
    error_log("Google Sheets Response: " . $sheetsResponse);
    // Save lead to local database as backup
    try {
        // Create a simple log file with lead information
        $logFile = 'leads/' . date('Y-m-d') . '.log';
        $logDir = dirname($logFile);

        // Create directory if it doesn't exist
        if (!is_dir($logDir) && !mkdir($logDir, 0755, true)) {
            error_log("Failed to create log directory: $logDir");
        } else {
            // Append lead to log file
            $logData = date('Y-m-d H:i:s') . " | $name | $phone | $qualification | $course | $city | $source\n";
            file_put_contents($logFile, $logData, FILE_APPEND);
        }
    } catch (Exception $e) {
        error_log("Failed to log lead: " . $e->getMessage());
    }
    // Return success response immediately
    echo json_encode([
        'success' => true,
        'message' => 'Form submitted successfully'
    ]);
} catch (Exception $e) {
    // Return error response
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>