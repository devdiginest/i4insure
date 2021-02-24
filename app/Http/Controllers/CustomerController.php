<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(CustomerDataTable $customerDataTable)
    {
        return $customerDataTable->render('customer');
    }
}
