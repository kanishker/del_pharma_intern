<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customer;

class CustomerController extends Controller
{
    public function viewCustomer()
    {
        $customer = Customer::all();
        
            return $customer;
        
    }

    public function searchCustomer(Request $request)
    {
        $customer = Customer::where('fullname','LIKE', '%'.$request->search.'%')
               ->orderBy('fullname')
               ->get();

            return $customer;  
    
    }

    public function addCustomer(Request $request)
    {
        

        $customer = New Customer ;
        try {
            $customer->fullname = $request->fullname;
            $customer->contact = $request->contact;
            $customer->adress = $request->adress;
            $customer->email = $request->email;
            $customer->save();

            return response()->json([
                'success'=>true,
                'messege'=>'Customer Account Created'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success'=>true,
                'messege'=>$e
            ]);
        }

    }

    public function updateCustomer(Request $request)
    {
        

        
        try {
        $customer = Customer::find($request->id);
        $customer->fullname = $request->fullname;
            $customer->contact = $request->contact;
            $customer->adress = $request->adress;
            $customer->email = $request->email;
            $customer->save();

        $customer->save();


            return response()->json([
                'success'=>true,
                'messege'=>'customer Updated',
                'Updated'=>$customer
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success'=>true,
                'messege'=>$e
            ]);
        }

      
    }

    public function deleteCustomer(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return response()->json([
            'success'=>true,
            'messege'=>'Sucefully deleted customer',
            'Deleted'=>$customer
        ]);
    }
}
