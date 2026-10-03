<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de rendez-vous</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Bonjour {{ $appointment->name }},</h2>
    
    <p>Nous avons le plaisir de vous confirmer que votre demande de rendez-vous a été <strong>validée</strong>.</p>
    
    <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0;">
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</p>
        <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}</p>
        <p><strong>Type :</strong> {{ ucfirst($appointment->type) }}</p>
        <p><strong>Canal :</strong> {{ ucfirst($appointment->contact_channel) }}</p>
    </div>
    
    <p>Nous vous contacterons très prochainement via le canal choisi.</p>
    
    <p>Cordialement,<br>L'équipe OMF</p>
</body>
</html>
