<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * Map each Excel row to a Product.
     *
     * Expected Excel headers (first row):
     * product_name | weight | category | price_dubai | price_shj_ajm | price_other | s_price (optional)
     */
    public function model(array $row)
    {
        // 1) Product name (required)
        $name = trim($row['product_name'] ?? $row['name'] ?? '');

        if ($name === '') {
            // skip empty rows
            return null;
        }

        // 2) Weight from Excel as TEXT (1kg, 500gms, 1box, etc.)
        $weightRaw = isset($row['weight']) ? trim($row['weight']) : null;

        // 3) Full display name (for product_name + slug)
        $fullName = trim($name . ' ' . ($weightRaw ?? ''));

        // 4) Slug + skip duplicate products
        $slug = Str::slug($fullName);
        if (Product::where('slug', $slug)->exists()) {
            return null; // avoid "Duplicate entry for key 'slug'"
        }

        // 5) Category TEXT from Excel (we store in products.category column)
        $categoryText = isset($row['category']) ? trim($row['category']) : null;

        // 6) City-wise prices from Excel
        $priceDubai  = $this->getNumeric($row, ['price_dubai', 'dubai_price', 'dubai']);
        $priceShjAjm = $this->getNumeric($row, ['price_shj_ajm', 'shj_ajm_price', 'sharjah_ajman']);
        $priceOther  = $this->getNumeric($row, ['price_other', 'other_price', 'other_emirates']);

        // 7) Base simple price (s_price). Fallback to Dubai price or 0.
        $basePrice = $this->getNumeric($row, ['s_price', 'base_price', 'mrp']);
        if ($basePrice === null) {
            $basePrice = $priceDubai ?? 0;
        }

        // 8) s_weight (numeric) – only digits for DB
        //    weight (text) – full raw value for display
        $sWeightNumeric = null;
        if (!is_null($weightRaw) && $weightRaw !== '') {
            $digits = preg_replace('/[^\d.]/', '', $weightRaw);
            $sWeightNumeric = $digits !== '' ? $digits : null;
        }

        return new Product([
            // Basic info
            'product_name'        => $fullName,
            'slug'                => $slug,
            'description'         => null,

            'featured_image'      => null,
            'gallery_image'       => null,

            // relation-based category fields (not used for Excel)
            'category_id'         => null,
            'sub_category_id'     => null,

            // TEXT category saved into products.category (not categories table)
            'category'            => $categoryText,

            // Product type
            'variant_type'        => 'simple',

            // Stock & simple variant
            's_stock'             => 0,
            'v_stock'             => 0,
            's_sku'               => null,
            's_price'             => $basePrice,
            's_discount_price'    => null,
            's_unit_id'           => null,
            's_status'            => 1,

            // 👇 Numeric for DB (safe), text stored separately in weight column
            's_weight'            => $sWeightNumeric,

            // Variant fields not used in this import
            'v_sku'               => null,
            'tax_name'            => null,
            'tax_type'            => null,
            'total_selling_price' => null,

            'position'            => 0,
            'sale'                => 0,
            'new'                 => 0,
            'not_for_sale'        => 0,

            // // TEXT weight field from your schema for display ("1kg", "500gms", "1box")
            // 'weight'              => $weightRaw,

            // City-wise prices mapped to your columns
            'price_dubai'         => $priceDubai,
            'price_shj_ajm'       => $priceShjAjm,
            'price_other'         => $priceOther,
        ]);
    }

    /**
     * Helper: safely read a numeric value from row using multiple possible header names.
     */
    protected function getNumeric(array $row, array $keys): ?float
    {
        foreach ($keys as $key) {
            if (isset($row[$key]) && $row[$key] !== '') {
                $value = (string) $row[$key];
                // Remove currency symbols, spaces, etc.
                $clean = preg_replace('/[^\d.]/', '', $value);
                if ($clean === '' || $clean === null) {
                    return null;
                }
                return (float) $clean;
            }
        }
        return null;
    }
}