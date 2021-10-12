<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\medicine;

class MedicineStockController extends Controller
{
    public function viewMedicine()
    {
        $meds = medicine::all();
        
            return $meds;
        
    }

    public function searchmedicine(Request $request)
    {
        $meds = medicine::where('fullname','LIKE', '%'.$request->search.'%')
               ->orderBy('fullname')
               ->get();

            return $meds;  
    
    }

    public function addMedicine (Request $request)
    {
        

        $meds = New medicine;
       

        try {
            $meds->fullname = $request->fullname;
            $meds->weight = $request->weight;
            $meds->quantity = $request->quantity;
            $meds->manufacturer = $request->manufacturer;
            $meds->expiration = $request->expiration;
            $meds->save();

            return response()->json([
                'success'=>true,
                'messege'=>'Medicine Created'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success'=>true,
                'messege'=>$e
            ]);
        }

    }

    public function updateMedicine (Request $request)
    {
        

        
        try {
        $meds = medicine::find($request->id);
        $meds->fullname = $request->fullname;
        $meds->weight = $request->weight;
        $meds->quantity = $request->quantity;
        $meds->manufacturer = $request->manufacturer;
        $meds->expiration = $request->expiration;
        $meds->save();


            return response()->json([
                'success'=>true,
                'messege'=>'Medicine Updated',
                'Updated'=>$meds
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success'=>true,
                'messege'=>$e
            ]);
        }

      
    }

    public function deleteMedicine(Request $request)
    {
        $meds = medicine::find($request->id);
        $meds->delete();
        return response()->json([
            'success'=>true,
            'messege'=>'Sucefully deleted',
            'Deleted'=>$meds
        ]);
    }

}
