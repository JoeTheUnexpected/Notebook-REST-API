<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;

/**
 * @OA\Schema(
 *      title="Notebook request",
 *      description="Notebook request data validation",
 *      type="object",
 *      required={"fio", "phone", "email"}
 * )
 */

class NotebookRequest extends FormRequest
{
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fio' => ['required', 'string'],
            'company' => ['string', 'nullable'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11'],
            'email' => ['required', 'email'],
            'birth_date' => ['date', 'nullable'],
            'photo' => ['string', 'nullable'],
        ];
    }
}
