<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CustomerFormRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new \stdClass();
        $customer->special_customer = false;
        $customersForSelect = Customer::groupBy('state')->get(['state'])->pluck('state', 'state');
        return view('customers.create')->with(compact('customer', 'customersForSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFormRequest $request)
    {
        $data = $request->only('name', 'birthdate', 'special_customer', 'city', 'state');
        dd($data);
        $data['special_customer'] = isset($data['special_customer']);
        Customer::create($data);
        return redirect()->route('clientes.create')->with(['success' => 'Cliente salvo comsucesso!']);
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $customersForSelect = Customer::groupBy('state')->get(['state'])->pluck('state', 'state');
        return view('customers.edit')->with(compact('customer', 'customersForSelect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerFormRequest $request, $id)
    {
        $data = $request->only('name', 'city', 'birthdate', 'state','special_customer');
        $data['special_customer'] = isset($data['special_customer']);
        $customer = Customer::find($id);
        $customer->fill($data);
        $customer->save();
        return redirect()->route('clientes.edit', $id)->with(['success' => 'Cliente salvo comsucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id', '=', $id)->delete();
        return redirect()->route('clientes.index')->with(['success' => 'Cliente excluido com sucesso!']);
    }
}
