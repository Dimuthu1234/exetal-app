<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerFormRequest;
use Domain\Customer\Actions\CreateCustomerAction;
use Domain\Customer\Actions\UpdateCustomerAction;
use Domain\Customer\DataTransferObjects\CustomerFormData;
use Domain\Customer\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Exception;

class CustomerController extends Controller
{
    /**
     * @return JsonResponse
     */

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
    public function index(): JsonResponse
    {
        try {
            return response()->json(
                Customer::all(),
                Response::HTTP_OK
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    /**
     * create customer
     * @param CustomerFormRequest $customerFormRequest
     * @param CreateCustomerAction $createCustomerAction
     * @return JsonResponse
     */

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
    public function store(
        CustomerFormRequest $customerFormRequest,
        CreateCustomerAction $createCustomerAction
    ): JsonResponse {
        try {
            return response()->json(
                $createCustomerAction(
                    new CustomerFormData(
                        firstName: $customerFormRequest->firstName,
                        lastName: $customerFormRequest->lastName,
                        age: $customerFormRequest->age,
                        dob: $customerFormRequest->dob,
                        email: $customerFormRequest->email,
                    )
                ),
                Response::HTTP_CREATED
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
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
    public function show(
        Customer $customer
    ): JsonResponse {
        try {
            return response()->json(
                $customer,
                Response::HTTP_OK
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    /**
     * update customer
     * @param CustomerFormRequest $customerFormRequest
     * @param UpdateCustomerAction $updateCustomerAction
     * @param Customer $customer
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/api/customer/{id}",
     *      operationId="updateCustomerById",
     *      tags={"Update-customer-by-id"},
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
     *          response=201,
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
    public function update(
        CustomerFormRequest $customerFormRequest,
        UpdateCustomerAction $updateCustomerAction,
        Customer $customer
    ): JsonResponse {
        try {
            return response()->json(
                $updateCustomerAction(
                    new CustomerFormData(
                        firstName: $customerFormRequest->firstName,
                        lastName: $customerFormRequest->lastName,
                        age: $customerFormRequest->age,
                        dob: $customerFormRequest->dob,
                        email: $customerFormRequest->email,
                    ),
                    $customer
                ),
                Response::HTTP_CREATED
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    /**
     * customer delete
     * @param Customer $customer
     * @return JsonResponse
     */

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
    public function destroy(
        Customer $customer
    ): JsonResponse {
        try {
            $customer->delete();
            return response()->json(
                ['Customer deleted successfully'],
                Response::HTTP_OK
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
