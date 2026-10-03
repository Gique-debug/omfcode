<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réponse à votre message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.7; color: #333; max-width: 600px; margin: auto; padding: 20px;">
    <div style="background: linear-gradient(135deg, #1e3a5f, #2563eb); padding: 20px; border-radius: 8px 8px 0 0; text-align: center;">
        <h1 style="color: white; margin: 0; font-size: 22px;">OMF</h1>
        <p style="color: rgba(255,255,255,0.8); margin: 5px 0 0;">Réponse à votre message</p>
    </div>
    
    <div style="background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; border-top: none; border-radius: 0 0 8px 8px;">
        <p>Bonjour <strong>{{ $clientName }}</strong>,</p>
        
        <p>Suite à votre message concernant <strong>"{{ $originalSubject }}"</strong>, voici notre réponse :</p>
        
        <div style="background: white; border-left: 4px solid #2563eb; padding: 15px 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
            {!! nl2br(e($replyText)) !!}
        </div>
        
        <p>N'hésitez pas à nous contacter à nouveau si vous avez d'autres questions.</p>
        
        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        <p style="font-size: 12px; color: #999; text-align: center;">© {{ date('Y') }} OMF — Tous droits réservés</p>
    </div>
</body>
</html>
