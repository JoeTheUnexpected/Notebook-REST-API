<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Http\Resources\NotebookCollection;
use App\Models\Notebook;

class NotebookApiController extends Controller
{
    /**
     * Get all notebooks with pagination
     *
     * @OA\Get(
     *      path="/notebook",
     *      operationId="getNotebooksList",
     *      tags={"Notebooks"},
     *      summary="Get list of notebooks",
     *      description="Returns list of notebooks",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotebookCollection")
     *       )
     *     )
     */
    public function index()
    {
        return new NotebookCollection(Notebook::paginate());
    }

    /**
     * Store a notebook
     *
     * @OA\Post(
     *      path="/notebook",
     *      operationId="storeNotebook",
     *      tags={"Notebooks"},
     *      summary="Store the new notebook",
     *      description="Returns the created notebook data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/NotebookRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="data",
     *                         type="object",
     *                         description="Data",
     *                         ref="#/components/schemas/Notebook"
     *                     )
     *                 )
     *             )
     *          }
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="errors",
     *                         type="object",
     *                         description="Errors",
     *                         @OA\Schema(
     *                             @OA\Property(
     *                                 property="fio",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="company",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="phone",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="email",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="birth_date",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="photo",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                         )
     *                     ),
     *                     example={
     *                         "success": false,
     *                         "errors": {
     *                             "fio": {"The fio field is required."},
     *                             "phone": {"The phone field is required."},
     *                             "email": {"The email field is required."}
     *                         }
     *                     }
     *                 )
     *             )
     *          }
     *      ),
     * )
     */
    public function store(NotebookRequest $notebookRequest)
    {
        $notebook = Notebook::create($notebookRequest->validated());

        return response()->json([
            'success' => true,
            'data' => $notebook,
        ]);
    }

    /**
     * @OA\Get(
     *      path="/notebook/{id}",
     *      operationId="getNotebookById",
     *      tags={"Notebooks"},
     *      summary="Get notebook information",
     *      description="Returns notebook data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="data",
     *                         type="object",
     *                         description="Data",
     *                         ref="#/components/schemas/Notebook"
     *                     )
     *                 )
     *             )
     *          }
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="errors",
     *                         type="string",
     *                         description="Errors",
     *                     ),
     *                     example={
     *                         "success": false,
     *                         "errors": "No query results for model [App\Models\Notebook] 999"
     *                     }
     *                 )
     *             )
     *          }
     *      )
     * )
     */
    public function show(Notebook $notebook)
    {
        return response()->json([
            'success' => true,
            'data' => $notebook,
        ]);
    }

    /**
     * @OA\Post(
     *      path="/notebook/{id}",
     *      operationId="updateNotebook",
     *      tags={"Notebooks"},
     *      summary="Update existing notebook",
     *      description="Returns updated notebook data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/NotebookRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="data",
     *                         type="object",
     *                         description="Data",
     *                         ref="#/components/schemas/Notebook"
     *                     )
     *                 )
     *             )
     *          }
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="errors",
     *                         type="string",
     *                         description="Errors",
     *                     ),
     *                     example={
     *                         "success": false,
     *                         "errors": "No query results for model [App\Models\Notebook] 999"
     *                     }
     *                 )
     *             )
     *          }
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="errors",
     *                         type="object",
     *                         description="Errors",
     *                         @OA\Schema(
     *                             @OA\Property(
     *                                 property="fio",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="company",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="phone",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="email",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="birth_date",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                             @OA\Property(
     *                                 property="photo",
     *                                 type="array",
     *                                 @OA\Items()
     *                             ),
     *                         )
     *                     ),
     *                     example={
     *                         "success": false,
     *                         "errors": {
     *                             "fio": {"The fio field is required."},
     *                             "phone": {"The phone field is required."},
     *                             "email": {"The email field is required."}
     *                         }
     *                     }
     *                 )
     *             )
     *          }
     *      ),
     * )
     */
    public function update(NotebookRequest $notebookRequest, Notebook $notebook)
    {
        $notebook->update($notebookRequest->validated());

        return response()->json([
            'success' => true,
            'data' => $notebook,
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/notebook/{id}",
     *      operationId="deleteNotebook",
     *      tags={"Notebooks"},
     *      summary="Delete existing notebook",
     *      description="Deletes a record and returns its id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="notebook_id",
     *                         type="integer",
     *                         description="Id of the deleted notebook",
     *                     ),
     *                     example={
     *                         "success": true,
     *                         "notebook_id": 1
     *                     }
     *                 )
     *             )
     *          }
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          content={
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="bool",
     *                         description="The response status",
     *                     ),
     *                     @OA\Property(
     *                         property="errors",
     *                         type="string",
     *                         description="Errors",
     *                     ),
     *                     example={
     *                         "success": false,
     *                         "errors": "No query results for model [App\Models\Notebook] 999"
     *                     }
     *                 )
     *             )
     *          }
     *      )
     * )
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response()->json([
            'success' => true,
            'notebook_id' => $notebook->id,
        ]);
    }
}
