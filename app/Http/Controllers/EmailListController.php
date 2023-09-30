<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\EmailListNames;
use App\Models\EmailListAll;
use Illuminate\Http\Request;

class EmailListController extends Controller
{
    public function AddEmailList(Request $request)
    {
        $Email = new EmailListNames();
        $Email->Emertimi = $request->input('Emertimi');
        $Email->UserId = $request->user()->id;
        $Email->CreatedAt = Carbon::now()->toDateTimeString();
        $Email->UpdatedAt = NULL;
        $Email->save();
        $idEmailListName=$Email->idEmailListNames;

        foreach ($request->input('EmailList') as $key => $value) {
            // var_dump($value);
            $EmailList = new EmailListAll;
            $EmailList->idEmailListNames = $idEmailListName;
            $EmailList->Emri = $value['Emri'];
            $EmailList->Email = $value['Email'];
            $EmailList->CreatedAt =Carbon::now()->toDateTimeString();
            $EmailList->UpdatedAt = NULL;
            $EmailList->save();
        }
       
        return redirect()->back();
   } 
}
