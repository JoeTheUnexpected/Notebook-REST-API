<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

/**
 * @OA\Schema(
 *     title="Notebook",
 *     description="Notebook model",
 *     @OA\Xml(
 *         name="Notebook"
 *     )
 * )
 */

class Notebook extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $id;

    /**
     * @OA\Property(
     *     title="FIO",
     *     description="FIO of a user",
     *     example="Ivanov Ivan Ivanovich"
     * )
     *
     * @var string
     */
    private string $fio;

    /**
     * @OA\Property(
     *     title="Company",
     *     description="The name of the company",
     *     example="Future"
     * )
     *
     * @var string
     */
    private string $company;

    /**
     * @OA\Property(
     *     title="Phone",
     *     description="Phone number",
     *     example="+79999999999"
     * )
     *
     * @var string
     */
    private string $phone;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Email",
     *     example="example@email.com"
     * )
     *
     * @var string
     */
    private string $email;

    /**
     * @OA\Property(
     *     title="Birth Date",
     *     description="Birth Date",
     *     example="2020-01-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var Date
     */
    private Date $birth_date;

    /**
     * @OA\Property(
     *     title="Photo",
     *     description="Photo link",
     *     example="https://via.placeholder.com/640x480.png/00dd77?text=qui"
     * )
     *
     * @var string
     */
    private string $photo;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="date-time",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private \DateTime $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="date-time",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private \DateTime $updated_at;
}
