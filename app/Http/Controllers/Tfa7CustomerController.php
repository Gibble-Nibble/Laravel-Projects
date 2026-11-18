<?php

namespace App\Http\Controllers;

use App\Models\Tfa7Customer;
use Illuminate\Http\Request;

class Tfa7CustomerController extends Controller
{
    public function index()
    {
        return view('tfa7.customers', [
            'customers' => Tfa7Customer::query()->orderBy('full_name')->get(),
        ]);
    }

    public function create()
    {
        return view('tfa7.customers.form', ['customer' => new Tfa7Customer]);
    }

    public function store(Request $request)
    {
        $customer = Tfa7Customer::create($this->validated($request));

        return redirect()->route('tfa7.customers')
            ->with('success', "Customer {$customer->full_name} was created.");
    }

    public function edit(Tfa7Customer $customer)
    {
        return view('tfa7.customers.form', compact('customer'));
    }

    public function update(Request $request, Tfa7Customer $customer)
    {
        $customer->update($this->validated($request, $customer));

        return redirect()->route('tfa7.customers')
            ->with('success', "Customer {$customer->full_name} was updated.");
    }

    private function validated(Request $request, ?Tfa7Customer $customer = null): array
    {
        $emailRule = 'required|email|max:255|unique:tfa7_customers,email';

        if ($customer) {
            $emailRule .= ','.$customer->id;
        }

        return $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => $emailRule,
            'phone' => ['required', 'string', 'max:30'],
        ]);
    }
}
