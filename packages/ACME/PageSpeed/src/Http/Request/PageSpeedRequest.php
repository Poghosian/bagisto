<?php

namespace ACME\PageSpeed\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Webkul\Core\Contracts\Validations\CommaSeperatedInteger;

class PageSpeedRequest extends FormRequest
{
    /**
     * Determine if the Configuraion is authorized to make this request.
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
     * @return array
     */
    public function rules()
    {
        return [
            'link' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'general.design.admin_logo.logo_image.mimes' => 'Invalid file format. Use only bmp, jpeg, jpg, png and webp.',
        ];
    }

    /**
     * Set the attribute name.
     */
    public function attributes()
    {
        return [
            'general.design.admin_logo.logo_image'             => 'Logo Image',
            'general.design.admin_logo.favicon'                => 'Favicon Image',
            'sales.invoice_setttings.invoice_slip_design.logo' => 'Invoice Logo',
            'catalog.products.storefront.products_per_page'    => 'Product Per Page',
        ];
    }
}
