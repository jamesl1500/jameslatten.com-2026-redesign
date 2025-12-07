<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e0e0e0;
        }
        
        .email-header {
            background: #000;
            color: #fff;
            padding: 40px 30px;
            text-align: center;
        }
        
        .email-header h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .email-header p {
            font-size: 14px;
            color: #999;
        }
        
        .email-body {
            padding: 40px 30px;
        }
        
        .email-intro {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .info-section {
            margin-bottom: 25px;
        }
        
        .info-label {
            font-size: 12px;
            font-weight: 700;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        
        .info-value {
            font-size: 16px;
            color: #000;
            font-weight: 500;
        }
        
        .message-section {
            margin-top: 30px;
            padding: 25px;
            background: #fafafa;
            border-left: 4px solid #000;
        }
        
        .message-section .info-label {
            margin-bottom: 12px;
        }
        
        .message-content {
            font-size: 15px;
            line-height: 1.7;
            color: #333;
            white-space: pre-wrap;
        }
        
        .email-footer {
            padding: 30px;
            background: #fafafa;
            border-top: 1px solid #e0e0e0;
            text-align: center;
        }
        
        .email-footer p {
            font-size: 13px;
            color: #999;
            margin-bottom: 8px;
        }
        
        .reply-button {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 30px;
            background: #000;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .reply-button:hover {
            background: #333;
        }
        
        .divider {
            height: 1px;
            background: #e0e0e0;
            margin: 30px 0;
        }
        
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .email-header,
            .email-body,
            .email-footer {
                padding: 25px 20px;
            }
            
            .email-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>New Contact</h1>
            <p>Portfolio Contact Form Submission</p>
        </div>
        
        <!-- Body -->
        <div class="email-body">
            <div class="email-intro">
                You've received a new message from your portfolio contact form.
            </div>
            
            <!-- Contact Information -->
            <div class="info-section">
                <div class="info-label">From</div>
                <div class="info-value">{{ $data['name'] }}</div>
            </div>
            
            <div class="info-section">
                <div class="info-label">Email Address</div>
                <div class="info-value">
                    <a href="mailto:{{ $data['email'] }}" style="color: #000; text-decoration: none;">
                        {{ $data['email'] }}
                    </a>
                </div>
            </div>
            
            @if(!empty($data['subject']))
            <div class="info-section">
                <div class="info-label">Subject</div>
                <div class="info-value">{{ $data['subject'] }}</div>
            </div>
            @endif
            
            <div class="divider"></div>
            
            <!-- Message -->
            <div class="message-section">
                <div class="info-label">Message</div>
                <div class="message-content">{{ $data['message'] }}</div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <p>Reply directly to this email to respond to {{ $data['name'] }}</p>
            <a href="mailto:{{ $data['email'] }}" class="reply-button">Reply to {{ $data['name'] }}</a>
            <p style="margin-top: 20px; font-size: 12px;">
                Sent from jameslatten.com contact form<br>
                {{ now()->format('F j, Y \a\t g:i A') }}
            </p>
        </div>
    </div>
</body>
</html>
