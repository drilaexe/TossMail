<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EmailListNames;
use Illuminate\Http\Request;

class TossMailController extends Controller
{
    // public function AddEmailList(Request $request)
    // {
    //     if (EmailListNames::where('Emertimi', '=', $request->input('Emertimi'))->count() > 0) {

    //         return redirect()->back()->withErrors('ds');
    //     }
    //     $Email = new EmailListNames();
    //     $Email->Emertimi = $request->input('Emertimi');
    //     $Email->UserId = $request->user()->id;
    //     $Email->CreatedAt = Carbon::now()->toDateTimeString();
    //     $Email->UpdatedAt = NULL;
    //     $Email->save();
    //     $idEmailListName = $Email->idEmailListNames;

    //     foreach ($request->input('EmailList') as $key => $value) {
    //         // var_dump($value);
    //         $EmailList = new EmailListAll;
    //         $EmailList->idEmailListNames = $idEmailListName;
    //         $EmailList->Emri = $value['Emri'];
    //         $EmailList->Email = $value['Email'];
    //         $EmailList->CreatedAt = Carbon::now()->toDateTimeString();
    //         $EmailList->UpdatedAt = NULL;
    //         $EmailList->save();
    //     }

    //     return redirect()->back();
    // }
  
 
    public function tossmail(Request $request)
    {
        $EmailListNames = EmailListNames::where('UserId', '=', $request->user()->id)->orderBy('idEmailListNames', 'desc')->get();
        return view('tossmail')->with('EmailListNames', $EmailListNames);;
    }



}
