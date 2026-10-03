<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réponse à votre demande de devis</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.7; color: #333; max-width: 600px; margin: auto; padding: 20px;">
    <div style="background: linear-gradient(135deg, #1e3a5f, #2563eb); padding: 20px; border-radius: 8px 8px 0 0; text-align: center;">
        <h1 style="color: white; margin: 0; font-size: 22px;">OMF</h1>
        <p style="color: rgba(255,255,255,0.8); margin: 5px 0 0;">Réponse à votre demande de devis</p>
    </div>
    
    <div style="background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; border-top: none; border-radius: 0 0 8px 8px;">
        <p>Bonjour <strong>{{ $quoteRequest->name }}</strong>,</p>
        
        <p>Merci pour votre demande de devis. Voici notre réponse concernant votre projet :</p>
        
        <div style="background: white; border-left: 4px solid #2563eb; padding: 15px 20px; margin: 20px 0; border-radius: 0 8px 8px 0; white-space: pre-wrap;">
            {!! nl2br(e($replyText)) !!}
        </div>
        
        <p>Pour toute question complémentaire ou pour finaliser votre devis, n'hésitez pas à nous contacter.</p>
        
        <div style="text-align: center; margin: 25px 0;">
            <a href="{{ config('app.url') }}/contact" style="background: #2563eb; color: white; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold;">Nous contacter</a>
        </div>
        
        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
        <p style="font-size: 12px; color: #999; text-align: center;">© {{ date('Y') }} OMF — Tous droits réservés</p>
    </div>
</body>
</html>
