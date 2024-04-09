<?php
// Sleep for 3 seconds
sleep(3);

// Get the search query parameter from the URL
$oid = isset($_GET['oid']) ? $_GET['oid'] : '';

// Construct the redirection URL with the search query parameter

 //a.href = "../../receipts/receipt("+idc.slice(-6, -1)+").pdf";
if (!empty($oid)) {
    // If search query is present, append it to the URL
    $redirectUrl = '../../receipts/receipt('.$oid.').pdf';
}
else
{
    $redirectUrl = 'https://marvelousfashions.com';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
    <p>Loading your receipt</p>
    
    <!-- HTML anchor element for redirection after 3 seconds -->
    <a href="<?php echo $redirectUrl; ?>">Click here if not redirected</a>
    
    <script>
        // JavaScript to redirect immediately if PHP sleep fails or user clicks before redirection
        setTimeout(function() {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }, 3000); // 3000 milliseconds = 3 seconds delay
    </script>
</body>
</html>
