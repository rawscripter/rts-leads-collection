<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $customers = Customer::query();

        if ($request['query']) {
            $customers->where('name', 'like', '%' . $request['query'] . '%')
                ->orWhere('phone', 'like', '%' . $request['query'] . '%')
                ->orWhere('organization', 'like', '%' . $request['query'] . '%')
                ->orWhere('address', 'like', '%' . $request['query'] . '%')
                ->orWhere('feedback', 'like', '%' . $request['query'] . '%')
                ->orWhere('id', 'like', '%' . $request['query'] . '%');
        }
        if ($request['feedback']) {
            $customers->where('feedback', 'like', '%' . $request['feedback'] . '%');
        }

        $customers->orderBy('id', 'DESC');

        $customers = $customers->paginate($request->limit ? $request->limit : 20);


        $res['customers'] = CustomerResource::collection($customers);
        $res['total'] = $customers->total();

        return response()->json($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        $customer = Customer::create($data);

        if ($customer) {
            return response()->json([
                'success' => true]);
        }

        return response()->json([
            'success' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Customer $customer)
    {
        $res['success'] = true;
        $res['customer'] = new CustomerResource($customer);
        return response()->json($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        if ($customer->update($request->all())) {
            $res['success'] = true;
        } else {
            $res['success'] = false;
        }

        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer): JsonResponse
    {
        if ($customer->delete()) {
            $res['success'] = true;
        } else {
            $res['success'] = false;
        }

        return response()->json($res);

    }
}
