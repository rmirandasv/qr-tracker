<?php

namespace App\Http\Controllers;

use App\Models\QrLink;
use Illuminate\Http\Request;

class QrLinkRedirectController extends Controller
{

    public function __invoke(Request $request, $uuid)
    {
        $qrLink = QrLink::where('uuid', $uuid)->firstOrFail();

        $qrLink->visits()->create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($qrLink->url);
    }

}
