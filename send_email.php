<?php

$to_email = "aashgates@Outlook.com";
$from_email = "aashik.k@albertsons.in";
$subject = "Test Email from SendGrid";
$body = "This is a test email sent using SendGrid.";

$data = [
    "personalizations" => [
        [
            "to" => [
                [
                    "email" => $to_email
                ]
            ]
        ]
    ],
    "from" => [
        "email" => $from_email
    ],
    "subject" => $subject,
    "content" => [
        [
            "type" => "text/plain",
            "value" => $body
        ]
    ]
];

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => [
            'Content-Type: application/json',
            'Authorization: 'SG.HHtI_lt3Q0-_ZBIafkOfEg.tsKtKAvWWDzHoyvzjW9WFZHvtZvoGkuWBEl82XSIWEI'
        ],
        'content' => json_encode($data),
        'ignore_errors' => true
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents('https://api.sendgrid.com/v3/mail/send', false, $context);
$response = json_decode($result, true);

if (strpos($http_response_header[0], '202') === false) {
    http_response_code(500);
    echo "Failed to send email: " . $response['errors'][0]['message'];
} else {
    echo "Email sent successfully!";
}

?>
