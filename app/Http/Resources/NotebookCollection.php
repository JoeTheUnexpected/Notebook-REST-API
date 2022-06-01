<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
 * @OA\Schema(
 *     title="NotebookCollection",
 *     description="Notebook collection",
 *     @OA\Xml(
 *         name="NotebookColection"
 *     )
 * )
 */
class NotebookCollection extends ResourceCollection
{
    /**
     * @OA\Property(
     *     title="Success",
     *     description="Success"
     * )
     *
     * @var bool
     */
    private bool $success;

    /**
     * @OA\Property(
     *     title="Data",
     *     type="array",
     *     description="Data wrapper",
     *     @OA\Items(
     *         ref="#/components/schemas/Notebook"
     *     )
     * )
     *
     * @var Collection
     */
    private Collection $data;

    /**
     * @OA\Property(
     *     title="Links",
     *     type="object",
     *     description="Links",
     *     @OA\Property(
     *         property="first",
     *         type="string",
     *         example="http://localhost/api/v1/notebook?page=1"
     *     ),
     *     @OA\Property(
     *         property="last",
     *         type="string",
     *         example="http://localhost/api/v1/notebook?page=2"
     *     ),
     *     @OA\Property(
     *         property="prev",
     *         type="string",
     *         nullable=true,
     *         example=null
     *     ),
     *     @OA\Property(
     *         property="next",
     *         type="string",
     *         nullable=true,
     *         example="http://localhost/api/v1/notebook?page=2"
     *     ),
     * )
     *
     * @var array
     */
    private array $links;

    /**
     * @OA\Property(
     *     title="Links",
     *     type="object",
     *     description="Links",
     *     @OA\Property(
     *         property="current_page",
     *         type="string",
     *         example="http://localhost/api/v1/notebook?page=1"
     *     ),
     *     @OA\Property(
     *         property="from",
     *         type="integer",
     *         example=1
     *     ),
     *     @OA\Property(
     *         property="last_page",
     *         type="integer",
     *         example=2
     *     ),
     *     @OA\Property(
     *         property="path",
     *         type="string",
     *         example="http://localhost/api/v1/notebook"
     *     ),
     *     @OA\Property(
     *         property="per_page",
     *         type="integer",
     *         example=15
     *     ),
     *     @OA\Property(
     *         property="to",
     *         type="integer",
     *         example=16
     *     ),
     *     @OA\Property(
     *         property="total",
     *         type="integer",
     *         example=21
     *     ),
     * )
     *
     * @var array
     */
    private array $meta;

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => $this->collection,
        ];
    }
}
