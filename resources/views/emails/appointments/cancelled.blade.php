<!DOCTYPE html>
<html>
<head>
    <title>Annulation de rendez-vous</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Bonjour {{ $appointment->name }},</h2>
    
    <p>Nous vous informons que votre demande de rendez-vous prévue le <strong>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</strong> à <strong>{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}</strong> a été <strong>annulée</strong>.</p>
    
    <p>Si vous souhaitez reprogrammer, n'hésitez pas à nous contacter ou à soumettre une nouvelle demande via notre site web.</p>
    
    <p>Cordialement,<br>L'équipe OMF</p>
</body>
</html>
