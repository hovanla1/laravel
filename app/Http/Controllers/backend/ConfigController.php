<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Link;
use App\Models\ConfigHome;
use App\Http\Requests\configStoreRequest;
use App\Http\Requests\configUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ConfigController extends Controller
{
    public function getconfig()
    {
        return view('backend.config.edit');
    }
    public function postconfig(Request $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $config = ConfigHome::find(1); //lấy mẫu tin
        $config->shop_name = $request->shop_name;
        $config->site_name = $request->site_name;
        $slug = Str::slug($config->shop_name = $request->shop_name, '-');
        $config->metakey = $request->metakey;
        $config->metadesc = $request->metadesc;
        $config->phone = $request->phone;
        $config->email = $request->email;
        $config->address = $request->address;
        $config->author = $request->author;
        $config->facebook = $request->facebook;
        $config->twitter = $request->twitter;
        $config->instagram = $request->instagram;
        $config->updated_at = date('Y-m-d H:i:s');
        //upload image
        if ($request->has('logo')) {
            $path_dir = "public/images/";
            if (File::exists(($path_dir . $config->logo))) {
                File::delete(($path_dir . $config->logo));
            }
            $file =  $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = $config->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $config->logo = $filename;
        }
        //end upload
        if ($config->save()) {
            return redirect()->route('getconfig')->with('message', ['type' => 'success', 'msg' => 'Cập nhật cấu hình thành công!']);
        }
        return redirect()->route('getconfig')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật cấu hình không thành công!']);
    }
}
