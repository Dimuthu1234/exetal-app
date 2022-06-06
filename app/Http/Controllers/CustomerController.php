<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/customer",
     *      operationId="getCustomerList",
     *      tags={"Get-all-customers"},
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Get list of Customers",
     *      description="Returns list of customers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function index()
    {
        return response()->json(Customer::all());
    }

    /**
     * @OA\Post(
     ** path="/api/customer",
     *   tags={"Create-customer"},
     *   summary="create a customer",
     *   operationId="store",
     *
     *  @OA\Parameter(
     *      name="firstName",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="lastName",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="age",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="dob",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'age' => $request->age,
            'dob' => $request->dob,
            'email' => $request->email,
        ]);

        return response()->json($customer);
    }

    /**
     * @OA\Get(
     *      path="/api/customer/{id}",
     *      operationId="getCustomerById",
     *      tags={"Get-customer-by-id"},
     *
     *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Get Customer by id",
     *      description="Returns a customer by id",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * @OA\Put (
     *      path="/api/customer/{id}",
     *      operationId="updateCustomerById",
     *      tags={"update-customer-by-id"},
     *
     *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *      @OA\Parameter(
     *      name="firstName",
     *      in="query",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="lastName",
     *      in="query",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="age",
     *      in="query",
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="dob",
     *      in="query",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="email",
     *      in="query",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Update Customer by id",
     *      description="Update a customer by id",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'age' => $request->age,
            'dob' => $request->dob,
            'email' => $request->email,
        ]);

        return response()->json($customer);
    }

    /**
     * @OA\Delete (
     *      path="/api/customer/{id}",
     *      operationId="deleteCustomerById",
     *      tags={"Delete-customer-by-id"},
     *
     *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Delete Customer by id",
     *      description="Delete a customer by id",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['Customer deleted successfully']);
    }
}
