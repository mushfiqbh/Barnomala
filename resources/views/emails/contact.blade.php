<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Submission</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:'Segoe UI', Arial, sans-serif; color:#0f172a;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f1f5f9; padding:24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="640" style="max-width:640px; width:100%; background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 12px 30px rgba(15,23,42,0.08);">
                    <tr>
                        <td style="background:linear-gradient(135deg,#1d4ed8,#2563eb); padding:32px 40px; color:#ffffff;">
                            <table role="presentation" width="100%">
                                <tr>
                                    <td style="font-size:28px; font-weight:600;">New Inquiry Received</td>
                                    <td align="right" style="font-size:16px; font-weight:500; opacity:0.8;">Barnomala EIMS</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-top:16px; font-size:15px; line-height:1.6; opacity:0.85;">Someone just reached out through your website contact form. Review the details below and follow up promptly to keep the conversation moving.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px 40px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                                <tr>
                                    <td colspan="2" style="font-size:18px; font-weight:600; padding-bottom:16px; border-bottom:1px solid #e2e8f0;">Contact Summary</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:18px; font-size:14px; color:#475569; width:32%; text-transform:uppercase; letter-spacing:0.08em;">Name</td>
                                    <td style="padding-top:18px; font-size:16px; font-weight:500; color:#0f172a;">{{ $details['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:12px; font-size:14px; color:#475569; text-transform:uppercase; letter-spacing:0.08em;">Email</td>
                                    <td style="padding-top:12px; font-size:16px; font-weight:500; color:#1d4ed8;"><a href="mailto:{{ $details['email'] }}" style="color:#1d4ed8; text-decoration:none;">{{ $details['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:12px; font-size:14px; color:#475569; text-transform:uppercase; letter-spacing:0.08em;">Phone</td>
                                    <td style="padding-top:12px; font-size:16px; font-weight:500;">
                                        <a href="tel:{{ $details['phone'] }}" style="color:#0f172a; text-decoration:none;">{{ $details['phone'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:12px; font-size:14px; color:#475569; text-transform:uppercase; letter-spacing:0.08em;">Address</td>
                                    <td style="padding-top:12px; font-size:16px; font-weight:500;">{{ $details['address'] ?? 'Not provided' }}</td>
                                </tr>
                            </table>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-size:18px; font-weight:600; padding-bottom:12px;">Message</td>
                                </tr>
                                <tr>
                                    <td style="background-color:#f8fafc; border-radius:12px; padding:20px; font-size:16px; line-height:1.7; color:#1e293b;">
                                        {!! nl2br(e($details['message'])) !!}
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:28px;">
                                <tr>
                                    <td>
                                        <a href="mailto:{{ $details['email'] }}" style="display:inline-block; padding:14px 28px; background:linear-gradient(135deg,#1d4ed8,#2563eb); color:#ffffff; text-decoration:none; border-radius:9999px; font-size:16px; font-weight:600; box-shadow:0 8px 18px rgba(37,99,235,0.25);">Reply to {{ $details['name'] }}</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#0f172a; color:#e2e8f0; padding:20px 40px; font-size:13px;">
                            <table role="presentation" width="100%">
                                <tr>
                                    <td style="font-weight:600; letter-spacing:0.08em; text-transform:uppercase;">Barnomala EIMS Support Desk</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:8px; opacity:0.75;">এমএসথ্রি টেকনোলজি বিডি, আল-মারজান শপিং সিটি (৩য় তলা), জিন্দাবাজার, সিলেট</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:8px; opacity:0.75;">Have questions? Call us at <a href="tel:+8801744221385" style="color:#bfdbfe; text-decoration:none;">+88 01744-221385</a> or email <a href="mailto:teambornomala@gmail.com" style="color:#bfdbfe; text-decoration:none;">teambornomala@gmail.com</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <p style="margin-top:18px; font-size:12px; color:#64748b; max-width:640px;">You are receiving this notification because your website contact form was submitted. To adjust alert preferences, update the notification settings inside the Barnomala EIMS admin panel.</p>
            </td>
        </tr>
    </table>
</body>
</html>
