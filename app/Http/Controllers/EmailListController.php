<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EmailListNames;
use App\Models\EmailListAll;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class EmailListController extends Controller
{
    public function AddEmailList(Request $request)
    {
        if (EmailListNames::where('Emertimi', '=', $request->input('Emertimi'))->count() > 0) {

            return redirect()->back()->withErrors('ds');
        }
        $Email = new EmailListNames();
        $Email->Emertimi = $request->input('Emertimi');
        $Email->UserId = $request->user()->id;
        $Email->CreatedAt = Carbon::now()->toDateTimeString();
        $Email->UpdatedAt = NULL;
        $Email->save();
        $idEmailListName = $Email->idEmailListNames;

        foreach ($request->input('EmailList') as $key => $value) {
            // var_dump($value);
            $EmailList = new EmailListAll;
            $EmailList->idEmailListNames = $idEmailListName;
            $EmailList->Emri = $value['Emri'];
            $EmailList->Email = $value['Email'];
            $EmailList->CreatedAt = Carbon::now()->toDateTimeString();
            $EmailList->UpdatedAt = NULL;
            $EmailList->save();
        }

        return redirect()->back();
    }
    public function ListNameEx($name, Request $request)
    {
        if (EmailListNames::where('Emertimi', '=', $name)->where('UserId', '=', $request->user()->id)->count() > 0) {
            return 0;
        } else {
            return 1;
        }
    }
    public function ListDetails($IdList, Request $request)
    {
      $EmailListNames=EmailListAll::where('idEmailListNames', '=', $IdList);
     
      if($EmailListNames->count()>0 ){
        return response()->json($EmailListNames->get());
      }else{
        return response()->json([]);
      }
    }
    public function listemail(Request $request)
    { 
        $EmailListNames = EmailListNames::where('UserId', '=', $request->user()->id)->orderBy('idEmailListNames', 'desc')->paginate(42);
        return view('listemail')->with('EmailListNames', $EmailListNames);;
    }
}
