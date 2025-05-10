<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\City;
use App\Models\District;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Customer::with(['city', 'district']);
        
        // Arama filtresi
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('identity_number', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }
        
        // Durum filtresi
        if ($request->has('status') && in_array($request->status, ['active', 'inactive'])) {
            $query->where('status', $request->status);
        }
        
        $customers = $query->latest()->paginate(10);
        
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('name')->get();
        return view('customers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->validated());
        
        // Activity log - ileride ekleyeceğiz
        // activity_log(Auth::user()->id, 'create', 'Customer', $customer->id, 'Müşteri oluşturuldu: ' . $customer->name);
        
        return redirect()->route('customers.index')
            ->with('success', 'Müşteri başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer->load(['city', 'district']);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $cities = City::orderBy('name')->get();
        $districts = District::where('city_id', $customer->city_id)->orderBy('name')->get();
        
        return view('customers.edit', compact('customer', 'cities', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        
        // Activity log - ileride ekleyeceğiz
        // activity_log(Auth::user()->id, 'update', 'Customer', $customer->id, 'Müşteri güncellendi: ' . $customer->name);
        
        return redirect()->route('customers.index')
            ->with('success', 'Müşteri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            
            // Activity log - ileride ekleyeceğiz
            // activity_log(Auth::user()->id, 'delete', 'Customer', $customer->id, 'Müşteri silindi: ' . $customer->name);
            
            return redirect()->route('customers.index')
                ->with('success', 'Müşteri başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('customers.index')
                ->with('error', 'Müşteri silinemedi. Bu müşteriye bağlı kayıtlar olabilir.');
        }
    }

    /**
     * Get districts by city
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts(Request $request)
    {
        $districts = District::where('city_id', $request->city_id)
            ->orderBy('name')
            ->get();
        
        return response()->json($districts);
    }
}