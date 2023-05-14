<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function __contruct()
    {
        
    }

//    public function syncAttributeGroup()
//    {
//		$attributes = Cache::remember('ATTRIBUTE_ALL', 60 * 24 * 24, function ()  {
//			return Attribute::get();
//		});
//
//        $groupAttribute = [];
//
//        foreach ($attributes as $key => $attribute) {
//            try{
//                $key = $attribute->gettype($attribute->atb_type)['name'];
//                $groupAttribute[$key][] = $attribute->toArray();
//            }catch (\Exception $exception){
//                continue;
//            }
//        }
//
//        return $groupAttribute;
//    }

    public function syncAttributeGroup()
    {
        $attributes     = Attribute::get();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute) {
            try {
                $key                                  = $attribute->gettype($attribute->atb_type)['name'];
                $groupAttribute[$key][$attribute->id] = $attribute->toArray();
            } catch (\Exception $exception) {
                continue;
            }
        }

        return $groupAttribute;
    }
}
