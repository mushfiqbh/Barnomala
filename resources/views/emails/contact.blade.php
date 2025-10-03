<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px;">
    <table style="max-width:600px; margin:auto; background:#fff; padding:20px; border-radius:8px;">
        <tr>
            <td>
                <h2 style="color:#333;">📩 New Contact Message</h2>
                <p><strong>Name:</strong> {{ $details['name'] }}</p>
                <p><strong>Email:</strong> {{ $details['email'] }}</p>
                <p><strong>Phone:</strong> {{ $details['phone'] }}</p>
                <p><strong>Address:</strong> {{ $details['address'] }}</p>
                <p><strong>Message:</strong></p>
                <p style="background:#f1f1f1; padding:10px; border-radius:5px;">
                    {{ $details['message'] }}
                </p>
                <hr>
                <p style="font-size:12px; color:#777;">This message was sent from your website contact form.</p>
            </td>
        </tr>
    </table>
</body>
</html>
