<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification - Craftify</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc; margin: 0; padding: 40px 0;">
    
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f8fafc;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); overflow: hidden;">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #235d47; padding: 30px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 28px; letter-spacing: 1px;">CRAFTIFY</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td align="center" style="padding: 40px 30px;">
                            <h2 style="color: #333333; margin-top: 0; font-size: 22px;">Verify Your Email Address</h2>
                            <p style="color: #666666; font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
                                Hello there,<br>
                                Thank you for registering with Craftify. To complete your registration and activate your account, please use the following One-Time Password (OTP):
                            </p>
                            
                            <!-- OTP Box -->
                            <div style="background-color: #f0fdf4; border: 2px dashed #235d47; border-radius: 8px; padding: 20px; display: inline-block; margin-bottom: 30px;">
                                <span style="font-size: 36px; font-weight: bold; letter-spacing: 8px; color: #143126;">
                                    {{ $otp }}
                                </span>
                            </div>
                            
                            <p style="color: #888888; font-size: 14px; margin-bottom: 0;">
                                This OTP is valid for the next <strong>10 minutes</strong>. Please do not share this code with anyone.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>