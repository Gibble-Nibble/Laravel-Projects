<?php

namespace App\Http\Controllers;

use App\Models\Tfa8Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Tfa8CustomerController extends Controller
{
    public function index(): View
    {
        return view('tfa8.customers.index', [
            'customers' => Tfa8Customer::query()->orderBy('full_name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('tfa8.customers.form', ['customer' => new Tfa8Customer]);
    }

    public function store(Request $request): RedirectResponse
    {
        $customer = Tfa8Customer::query()->create($this->validated($request));

        return redirect()->route('tfa8.customers.index')
            ->with('success', "Customer {$customer->full_name} was created.");
    }

    public function show(Tfa8Customer $customer): View
    {
        return view('tfa8.customers.show', compact('customer'));
    }

    public function edit(Tfa8Customer $customer): View
    {
        return view('tfa8.customers.form', compact('customer'));
    }

    public function update(Request $request, Tfa8Customer $customer): RedirectResponse
    {
        $customer->update($this->validated($request, $customer));

        return redirect()->route('tfa8.customers.index')
            ->with('success', "Customer {$customer->full_name} was updated.");
    }

    public function destroy(Tfa8Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('tfa8.customers.index')
            ->with('success', 'Customer was deleted.');
    }

    private function validated(Request $request, ?Tfa8Customer $customer = null): array
    {
        $emailRule = 'required|email|max:255|unique:tfa8.customers,email';

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
