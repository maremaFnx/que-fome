<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function pdf(){
        $user = auth()->user();
        $productAsCustomer = $user->productAsCustomer;
        $pdf = PDF::loadView('pdf', ['productAsCustomer'=>$productAsCustomer]);
        return $pdf->setPaper('a4')->stream('carrinho.pdf');
    }
}
