<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\TipoCuentaBanco;

class BankandAccountController extends Controller
{
    public function create()
    {
        $banks = Bank::orderBy('nombre_banco')->get();
        $tipoCuentas = TipoCuentaBanco::orderBy('tipo_cuenta')->get();
        return view('dashboard.payment', compact('banks', 'tipoCuentas'));
    }
}
