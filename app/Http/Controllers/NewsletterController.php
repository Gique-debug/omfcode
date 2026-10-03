<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $exists = Subscriber::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Cet email est déjà inscrit à notre newsletter.',
            ]);
        }

        Subscriber::create(['email' => $request->email]);

        return response()->json([
            'success' => true,
            'message' => 'Merci ! Vous êtes maintenant inscrit à notre newsletter. 🎉',
        ]);
    }
}
