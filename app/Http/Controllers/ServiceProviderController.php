<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Service;
use App\Models\ServiceCat;
use App\Models\ServiceImg;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceProviderController extends Controller
{
    public function index()
    {
        return view('provider_panel.login');
    }
    public function dashboard()
    {
        return view('provider_panel.index');
    }
    public function profile()
    {
        $provider_id = Session::get('provider_id');
        $data['profileData'] = ServiceProvider::find($provider_id);
        return view('provider_panel.profile', $data);
    }
    public function login(Request $req)
    {
        $user = $req->username;
        $pass = $req->password;
        $data = ServiceProvider::whereRaw('username=? and status=?', [$user, 1])->first();
        if (isset($data)) {
            if (!Hash::check($pass, $data->password)) {
                echo "passwrong";
            } else {
                Session::put('provider_id', $data->id);
                Session::put('provider_name', $data->name);
                Session::put('provider_img', $data->img);
                echo "login";
            }
        } else {
            echo "userNotMatch";
        }
        // echo '<pre>';
        // print_r($data->password);
        // echo '</pre>';
    }
    public function update_profile(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        $id = $req->id;
        $name = $req->name;
        $username = $req->username;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;
        $usertype = $req->usertype;
        $password = Hash::make($req->con_pass);
        // die;
        $adminData = ServiceProvider::find($id);
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            if (isset($adminData)) {
                File::delete(public_path('upload/admin/' . $adminData->img));
                $image->move('public/upload/admin', $imgName);
            }
        } else {
            $imgName = $req->old_img;
        }
        if (isset($adminData)) {
            $adminData->name = $name;
            $adminData->username = $username;
            $adminData->email = $email;
            $adminData->phone = $phone;
            $adminData->address = $address;
            $adminData->img = $imgName;
            $adminData->save();
            echo "update";
        } else {
            $check = ServiceProvider::whereRaw('username=? or email=?', [$username, $email])->first();            // print_r($check->email);
            if (isset($check->username) && $check->username == $username) {
                echo "UsernameErr";
            } elseif (isset($check->email) && $check->email == $email) {
                echo "emailErr";
            } else {
                $c = new ServiceProvider();
                $c->name = $name;
                $c->username = $username;
                $c->email = $email;
                $c->phone = $phone;
                $c->password = $password;
                $c->address = $address;
                $c->img = $imgName;
                $c->usertype = $usertype;
                $c->save();
                echo "save";
                $image->move('public/upload/admin', $imgName);
            }
        }
    }
    public function change_password()
    {
        return view('provider_panel.change-password');
    }
    public function change_pass_save(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        // echo '</pre>';
        $id = $req->id;
        $old_pass = $req->old_pass;
        $con_pass = $req->con_pass;
        $data = ServiceProvider::find($id);
        if (Hash::check($old_pass, $data->password)) {
            if (Hash::check($con_pass, $data->password)) {
                echo "con_pass_match";
            } else {
                $data->password = Hash::make($con_pass);
                $data->save();
                echo "save";
                Session::forget('provider_id');
                Session::forget('provider_name');
                Session::forget('provider_img');
            }
        } else {
            echo "old_pass_not_match";
        }
    }
    public function reset_password_page()
    {
        // return 1;
        return view('provider_panel.reset-password');
    }
    public function reset_pass_change(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        // echo '</pre>';        
        $username = $req->username;
        $con_pass = $req->con_pass;
        $singleData = ServiceProvider::whereRaw('username=? and status=?', [$username, 1])->first();
        if (isset($singleData)) {
            if (Hash::check($con_pass, $singleData->password)) {
                echo "con_pass_match";
            } else {
                $singleData->password = Hash::make($con_pass);
                $singleData->save();
                echo "save";
                Session::forget('provider_id');
                Session::forget('provider_name');
                Session::forget('provider_img');
            }
        } else {
            echo "userNotMatch";
        }
    }
    public function logout()
    {
        Session::forget('provider_id');
        Session::forget('provider_name');
        Session::forget('provider_img');
        return redirect()->route('provider.index');
    }
    public function statusChange(Request $req)
    {
        $code = base64_decode($req->code);
        $id = base64_decode($req->id);
        $modelName = "App\Models\\" . ucfirst(base64_decode($req->model));
        $model = app($modelName);
        if ($code != "") {
            $data = $model->whereRaw('code=?', $code)->get();
            foreach ($data as $data) {
                if ($data->status == 1) {
                    $data->status = 0;
                    $data->save();
                } else {
                    $data->status = 1;
                    $data->save();
                }
            }
        } else {
            $data = $model->find($id);
            if ($data->status == 1) {
                $data->status = 0;
                $data->save();
            } else {
                $data->status = 1;
                $data->save();
            }
        }
    }
    // Delete
    public function delete(Request $req)
    {
        $id = base64_decode($req->id);
        $modelName = base64_decode($req->modelName);
        $code = base64_decode($req->code_id);
        // die;
        $modelName = "App\Models\\" . ucfirst($modelName);
        $model = app($modelName);
        if ($code != "") {
            $model->where('code', $code)->delete();
        } else {
            $model->find($id)->delete();
        }
        $url = explode('/', ltrim(strtok($_SERVER["HTTP_REFERER"], '?'), '/'));
        $url = array_slice($url, -1);
        return redirect('service_provider/' . $url[0]);
    }
    // Services
    public function manage_services()
    {
        $data['service'] = Service::select(['scat.category', 'services.*'])
            ->leftJoin('service_cats as scat', 'scat.id', '=', 'services.service_cat')
            ->whereRaw('provider_id=? and services.lang_id =?', [Session::get('provider_id'), 1])
            ->get();
        return view('provider_panel.manage_services', $data);
    }
    public function add_services(Request $req)
    {
        $id = base64_decode($req->id);
        $data['lang'] = Language::get();
        $data['serviceCat'] = ServiceCat::get();
        $data['serviceImg'] = ServiceImg::whereRaw('service_id=?', $id)->get();
        $data['singleData'] = Service::whereRaw('code=?', $id)->get();
        return view('provider_panel.addFolder.add_service', $data);
    }
    public function save_service(Request $req)
    {
        // echo '<pre>';
        // print_r($req->service_title[0]);
        // echo '</pre>';
        // die;
        // $serviceData = Service::whereIn('img', $req->id)->first();
        // die;
        if ($req->id[0] > 0) {
            foreach ($req->locale as $key => $l) {
                $serviceData = Service::find($req->id[$key]);
                $serviceData->service_cat = $req->service_cat[$key];
                $serviceData->title = $req->service_title[$key];
                $serviceData->phone = $req->phone;
                $serviceData->address = $req->address[$key];
                $serviceData->save();
                $service_id = $serviceData->code;
            }
            echo "update";
        } else {
            $code = "S" . rand(11111, 99999);
            foreach ($req->locale as $key => $l) {
                $c = new Service();
                $c->lang_id = $req->locale[$key];
                $c->provider_id = $req->provider_id;
                $c->service_cat = $req->service_cat[$key];
                $c->code = $code;
                $c->title = $req->service_title[$key];
                $c->phone = $req->phone;
                $c->address = $req->address[$key];
                $c->save();
                $service_id = $c->code;
            }
            echo "save";
        }
        // if (!File::exists(public_path('upload/service/' . $req->service_title[0]))) {
        //     File::makeDirectory(public_path('upload/service/' . $req->service_title[0]));
        // } else {
        // }
        if ($req->hasFile('img')) {
            foreach ($req->img as $key => $image) {
                $imgName = time() . '.' . $image->getClientOriginalName();
                $service_img = new ServiceImg();
                $service_img->service_id = $service_id;
                $service_img->img = $imgName;
                $service_img->save();
                $image->move(public_path('upload/service/' . $req->service_title[0] . '/'), $imgName);
            }
        } else {
            $imgName = $req->old_img;
        }
    }
}
