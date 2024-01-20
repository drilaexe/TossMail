<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EmailListNames;
use Illuminate\Http\Request;
use App\Models\TossMail;
use App\Models\EmailListAll;
use App\Models\TossMailDelivered;


class TossMailController extends Controller
{
    public function sendTossMail(Request $request)
    {
        
        $TossMail = new TossMail();
        $TossMail->Emertimi = $request->input('Emertimi');
        $TossMail->Subjekti = $request->input('Subjekti');
        $TossMail->ListaId = $request->input('ListaId');
        $TossMail->Pershkrimi = $request->input('content');
        $TossMail->UserId = $request->user()->id;
        $TossMail->CreatedAt = Carbon::now()->toDateTimeString();
    
        $TossMail->save();
        
        foreach (EmailListAll::where('idEmailListNames', '=', $TossMail->ListaId)->get() as $key => $value) {
            // var_dump($value);
            $TossMailDelivered = new TossMailDelivered();
            $TossMailDelivered->TossMailId = $TossMail->id;
            $TossMailDelivered->Delivered = false;
            $TossMailDelivered->ListaId = $TossMail->ListaId ;
            $TossMailDelivered->ListaEmailId = $value->idEmailListAll ;
            $TossMailDelivered->UserId = $request->user()->id;
            $TossMailDelivered->CreatedAt = Carbon::now()->toDateTimeString();
            $TossMailDelivered->save();
        }

        return view('subjects');
    }
    public function tossmail(Request $request)
    {
        $EmailListNames = EmailListNames::where('UserId', '=', $request->user()->id)->orderBy('idEmailListNames', 'desc')->get();
        return view('tossmail')->with('EmailListNames', $EmailListNames);
    }
    public function subjects(Request $request)
    {
        // $EmailListNames = EmailListNames::where('UserId', '=', $request->user()->id)->orderBy('idEmailListNames', 'desc')->get();
        return view('subjects');
    }



}
