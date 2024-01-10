<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use Illuminate\Support\Str;
use Database\Seeders\EntrustSeeder;

function media($images, $pathimage, $model)
{
    $methods_update = ['PUT', 'PATCH'];
    if (\Request::isMethod('post')) {
        $i = 1;
        foreach ($images as $image) {
            $file_name = $model->slug . '_' . time() . '_' . $i . '.' . $image->getClientOriginalName();
            $file_type = $image->getMimeType();
            $file_size = $image->getSize();
            $path = public_path($pathimage . '/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $model->media()->create([
                'file_name' => $file_name,
                'file_type' => $file_type,
                'file_size' => $file_size,
                'file_status' => true,
                'file_sort' => $i,
            ]);
            $i++;
        }
    } else if (in_array(\Request::method(), $methods_update)) {
        $i = $model->media()->count() + 1;
        foreach ($images as $image) {
            $file_name = $model->slug . '_' . time() . '_' . $i . '.' . $image->getClientOriginalName();
            $file_type = $image->getMimeType();
            $file_size = $image->getSize();
            $path = public_path($pathimage . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $model->media()->create([
                'file_name' => $file_name,
                'file_type' => $file_type,
                'file_size' => $file_size,
                'file_status' => true,
                'file_sort' => $i,
            ]);
            $i++;
        }
    }
}

function removeImaga($image, $pathimage, $model = null)
{
    $path = $pathimage . $image->file_name;
    if (File::exists($path)) {
        Unlink($path);
    }
}

function deleteImageOrImages($image, $pathimage, $model)
{
    foreach ($image as $media) {
        if (File::exists($pathimage . $media->file_name)) {
            Unlink($pathimage . $media->file_name);
        }
        $media->delete();
    }
}

function currentRoute()
{
    $routeName = Route::getFacadeRoot()->current()->uri();
    $route = explode('/', $routeName);
    $prefix  = $route[0];
    $routeName  = $route[1];
    return $prefix . '.' . $routeName . '.' . 'index';
}
function redirectedWithMessage()
{


    $haystack = Route::getCurrentRoute()->getActionName();
    $methodName = substr($haystack, strpos($haystack, "@") + 1);
    if ($methodName == "destroy") {
        $colormessage = 'danger';
        $message =  'Delete Successfully';
    }
    if ($methodName == "store") {
        $colormessage = 'success';
        $message =  'Created Successfully';
    }
    if ($methodName == "update") {
        $colormessage = 'success';
        $message =  'Updated Successfully';
    }

    return redirect()->route(currentRoute())->with([
        'message' => $message,
        'alert_type' => $colormessage,
    ]);
}























function getRoutes()
{
    // $all_permissions =  ['product_coupons', 'products', 'tags', 'product_categories', 'product_reviews', 'customers', 'supervisors', 'countries', 'cities', 'states', 'customer_addresses','shipping_campanies'];
    // $displayName =   ['Coupons', 'Products', 'Tag', 'Categories', 'Reviews', 'Customers', 'Supervisors', 'Countries', 'Cities', 'States', 'CustomerAddresses', 'ShippingCampanies'];
    // $icon =  ['fa fa-percent', 'fas fa-file-archive', 'fas fa-tag', 'fas fa-file-archive', 'fa fa-comment', 'fa fa-user', 'fa fa-user', 'fas fa-globe', 'fas fa-university', 'fas fa-map-marker-alt', 'fas fa-map-marked-alt', 'fas fa-map-marked-alt'];
    // $ordaring =  ['20', '15', '10', '5', '22', '30', '35', '40', '45', '50', '32','49'];
    // $sidebarLink =  ['1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1','1'];
    // return  ['all_permissions' => $all_permissions, 'displayName' => $displayName, 'icon' => $icon, 'ordaring' => $ordaring, 'sidebarLink' => $sidebarLink];
    $all_permissions =  ['product_categories'];
    $displayName =   [['en'=>'Categories','ar'=>'الأقسام']];
    $icon =  ['fas fa-file-archive'];
    $ordaring =  ['20'];
    $sidebarLink =  ['1'];
    return  ['all_permissions' => $all_permissions, 'displayName' => $displayName, 'icon' => $icon, 'ordaring' => $ordaring, 'sidebarLink' => $sidebarLink];


    //    $manageMain = Permission::create(['name' => 'main', 'display_name' => 'Main', 'route' => 'index', 'module' => 'index', 'as' => 'index', 'icon' => 'fas fa-home', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '1',]);
    //    $manageMain->parent_show = $manageMain->id;
    //    $manageMain->save();
    //  foreach($all_permissions as $index => $permission_name){
    //        $manageRoute = Permission::create(['name' => 'manage_'.$permission_name, 'display_name' => $displayName[$index], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'index', 'icon' =>$icon[$index] , 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => $ordaring[$index]]);
    //        $manageRoute->parent_show = $manageRoute->id;
    //        $manageRoute->save();
    //        $showProductCategories = Permission::create(['name' => 'show_'.$permission_name, 'display_name' => $displayName[$index], 'route' => $permission_name, 'module' => $permission_name, 'as' =>  $permission_name.'.'.'index', 'icon' =>$icon[$index] , 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => '1', 'appear' => '1']);
    //        $showProductCategories = Permission::create(['name' => 'create_'.$permission_name, 'display_name' =>'create '.Str::singular($displayName[$index]), 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'create', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => '1', 'appear' => '0']);
    //        $displayProductCategories = Permission::create(['name' => 'display_'.$permission_name, 'display_name' =>  'Show '.Str::singular($displayName[$index]), 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'show', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => '1', 'appear' => '0']);
    //        $updateProductCategories = Permission::create(['name' => 'update_'.$permission_name,'display_name' => 'Update '.Str::singular($displayName[$index]), 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'edit', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => '1', 'appear' => '0']);
    //        $deleteProductCategories = Permission::create(['name' => 'delete_'.$permission_name, 'display_name' => 'Delete '.Str::singular($displayName[$index]), 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'destroy', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => '1', 'appear' => '0']);


    // }
}
