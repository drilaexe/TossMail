<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\EmailListNames;
use Illuminate\Http\Request;

class EmailListController extends Controller
{
    public function AddEmailList(Request $request)
    {
        $Email = new EmailListNames;
        \Debugbar::info($request);
        $Email->Emertimi = $request->input('Emertimi');
        $Email->UserId = $request->user()->id;;
        $Email->CreatedAt = Carbon::now()->toDateTimeString();
        $Email->UpdatedAt = NULL;
      $idEmailListName=$Email->idEmailListName;

        foreach ($request->input('EmailList') as $key => $value) {
            // var_dump($value);
        }
        $Email->save();
        return redirect()->back();
   } 
}
