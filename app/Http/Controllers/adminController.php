<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Language;
use App\Models\Notification;
use App\Models\Otp;
use App\Models\Service;
use App\Models\ServiceCat;
use App\Models\ServiceProvider;
use App\Models\ServiceImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function dashboard()
    {

        return view('admin.index');
    }
    public function adminProfile()
    {
        $admin_id = Session::get('admin_id');
        $data['profileData'] = Admin::find($admin_id);
        return view('admin.profile', $data);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function admin_login(Request $req)
    {
        $user = $req->username;
        $pass = $req->password;
        $data = Admin::whereRaw('username=?', [$user])->first();
        if (isset($data)) {
            if (!Hash::check($pass, $data->password)) {
                echo "passwrong";
            } else {
                Session::put('admin_id', $data->id);
                Session::put('admin_name', $data->name);
                Session::put('admin_img', $data->img);
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
        $name = ucwords($req->name);
        $username = $req->username;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;
        $usertype = $req->usertype;
        $password = Hash::make($req->con_pass);
        // die;
        $adminData = Admin::find($id);
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
            $check = Admin::whereRaw('username=? or email=?', [$username, $email])->first();            // print_r($check->email);
            if (isset($check->username) && $check->username == $username) {
                echo "UsernameErr";
            } elseif (isset($check->email) && $check->email == $email) {
                echo "emailErr";
            } else {
                $c = new Admin();
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
        return view('admin.change-password');
    }
    public function change_pass_save(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        // echo '</pre>';
        $id = $req->id;
        $old_pass = $req->old_pass;
        $con_pass = $req->con_pass;
        $data = Admin::find($id);
        if (Hash::check($old_pass, $data->password)) {
            if (Hash::check($con_pass, $data->password)) {
                echo "con_pass_match";
            } else {
                $data->password = Hash::make($con_pass);
                $data->save();
                echo "save";
            }
        } else {
            echo "old_pass_not_match";
        }
    }
    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        Session::forget('admin_img');
        return redirect()->route('admin.login');
    }
    public function locale(Request $req)
    {
        $lang_id = $req->locale;
        $data = Language::find($lang_id);
        App::setlocale($data->code);
    }
    public function reset_password()
    {
        return view('admin.reset-password');
    }
    public function reset_pass_change(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        // echo '</pre>';        
        $username = $req->username;
        $con_pass = $req->con_pass;
        $singleData = Admin::whereRaw('username=?', $username)->first();
        if (isset($singleData)) {
            if (Hash::check($con_pass, $singleData->password)) {
                echo "con_pass_match";
            } else {
                $singleData->password = Hash::make($con_pass);
                $singleData->save();
                echo "save";
                Session::forget('admin_id');
                Session::forget('admin_name');
                Session::forget('admin_img');
            }
        } else {
            echo "userNotMatch";
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
        return redirect('admin/' . $url[0]);
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
    public function add_services_cat(Request $req)
    {
        $cat_code = base64_decode($req->code);
        $data['singleData'] = ServiceCat::whereRaw('code=?', $cat_code)->get();
        $data['lang'] = Language::all();
        return view('admin.addFolder.add_service_cat', $data);
    }
    public function save_service_cat(Request $req)
    {
        // echo '<pre>';
        // print_r($req->id);
        // echo '</pre>';              
        $cat_code = "SC" . rand(11111, 99999);
        foreach ($req->locale as $key => $l) {
            if (!isset($req->id[$key])) {
                $service = new ServiceCat();
                $service->lang_id = $req->locale[$key];
                $service->code = $cat_code;
                $service->category = $req->service_cat[$key];
                $service->save();
            } else {
                $service = ServiceCat::find($req->id[$key]);
                $service->category = $req->service_cat[$key];
                $service->save();
            }
        }
        if (isset($req->id[$key])) {
            echo "update";
        } else {
            echo "save";
        }
        // echo "save";                    
        // foreach ($req->locale as $key => $l) {
        // }
        // echo "update";

    }
    public function manage_service_category()
    {
        $data['serviceCat'] = ServiceCat::whereRaw('lang_id=?', 1)->get();
        return view('admin.manage_service_category', $data);
    }
    public function view_service_provider(Request $req)
    {
        $id = base64_decode($req->id);
        $data['singleData'] = ServiceProvider::find($id);
        $data['service'] = Service::whereRaw('provider_id=? and lang_id=?', [$id, 1])->get();
        return view('admin.addFolder.view_service_provider', $data);
    }
    public function manage_service_provider()
    {
        $data['serviceProvider'] = ServiceProvider::get();
        return view('admin.manage_service_provider', $data);
    }
    public function add_staff(Request $req)
    {
        $id = base64_decode($req->id);
        $data['singleData'] = Admin::find($id);
        return view('admin.addFolder.add_staff', $data);
    }
    public function manage_staff()
    {
        $data['staffData'] = Admin::whereRaw('usertype=?', 2)->get();
        return view('admin.manage_staff', $data);
    }
    public function manage_service()
    {
        $data['service'] = Service::select(['provider.name', 'provider.img as provider_img', 'provider.id as provider_id', 'scat.category', 'services.lang_id', 'services.code', 'services.title', 'services.phone', 'services.address', 'services.status'])
            ->leftJoin('service_cats as scat', 'scat.id', '=', 'services.service_cat')
            ->leftJoin('service_providers as provider', 'provider.id', '=', 'services.provider_id')
            ->whereRaw('services.lang_id=? and scat.status=?', [1, 1])
            ->get();
        return view('admin.manage_services', $data);
    }
    public function view_service(Request $req)
    {
        $data['singleData'] = Service::select(['scat.category', 'services.lang_id', 'services.provider_id', 'services.id', 'services.code', 'services.title', 'services.phone', 'services.address', 'services.status'])
            ->leftJoin('service_cats as scat', 'scat.id', '=', 'services.service_cat')
            ->whereRaw('services.code=? and services.lang_id=?', [base64_decode($req->id), 1])
            ->first();
        $data['providerData'] = ServiceProvider::find($data['singleData']['provider_id']);
        return view('admin.addFolder.view_service', $data);
    }
    public function add_services(Request $req)
    {
        $id = base64_decode($req->id);
        $data['lang'] = Language::get();
        $data['serviceCat'] = ServiceCat::get();
        $data['serviceImg'] = ServiceImg::whereRaw('service_id=?', $id)->get();
        $data['singleData'] = Service::whereRaw('code=?', $id)->get();
        return view('admin.addFolder.add_service', $data);
    }
    public function save_service(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
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
        if ($req->hasFile('img')) {
            foreach ($req->img as $key => $image) {
                $imgName = time() . '.' . $image->getClientOriginalName();
                $service_img = new ServiceImg();
                $service_img->service_id = $service_id;
                $service_img->img = $imgName;
                $service_img->save();
                $image->move('public/upload/service', $imgName);
            }
        } else {
            $imgName = $req->old_img;
        }
    }
    public function view_staff(Request $req)
    {
        $data['singleData'] = Admin::find(base64_decode($req->id));
        return view('admin.addFolder.view_staff', $data);
    }
    public function manage_customer()
    {
        $data['allCustomer'] = Customer::all();
        return view('admin.manage_customer', $data);
    }
    public function view_customer(Request $req)
    {
        $data['singleData'] = Customer::find(base64_decode($req->id));
        return view('admin.addFolder.view_customer', $data);
    }
    public function staff_permission(Request $req)
    {
        $data['staffData'] = Admin::find(base64_decode($req->id));
        return view('admin.staff_permission', $data);
    }
    public function send_notification()
    {
        return view('admin.addFolder.send_notification');
    }
    public function notification_list()
    {
        // leftJoin('customers AS c', 'c.id', '=', 'notifications.user_id')
        //     ->where('notifications.usertype', 1)
        //     ->
        $data['notifyData'] = Notification::select(['admins.name as admin_name', 'notifications.*'])
            ->leftJoin('admins', 'admins.id', '=', 'notifications.sender')->get();
        // echo '<pre>';
        // print_r($data['notifyData']);
        // echo '</pre>';
        return view('admin.manage_notification', $data);
    }
    public function view_notification(Request $req)
    {
        $id = base64_decode($req->id);
        $data['singleData'] = Notification::find($id);
        return view('admin.addFolder.view_notification', $data);
    }
    public function inquiry_list()
    {
        return view('admin.manage_inquires');
    }
    public function send_inquires()
    {
        return view('admin.addFolder.send_enquires');
    }
    public function send_notify(Request $req)
    {
        // echo '<pre>';
        // print_r($req->all());
        // echo '</pre>';

        $to_user = "";
        $customerData = Customer::all();
        $providerData = ServiceProvider::all();
        foreach ($customerData as $customer) {
            $to_user .= $customer->id;
        }
        if ($req->to_users == 0) {
            foreach ($providerData as $provider) {
                $to_user .= $provider->id;
            }
        }
        foreach ($customerData as $customer) {
            if ($req->to_users == 1 || $req->to_users == 0) {
                $notification = new Notification();
                $notification->sender = $req->sender_id;
                $notification->user_id = $customer->id;
                $notification->subject = $req->subject;
                $notification->msg = $req->msg;
                if ($req->to_users == 0) {
                    $notification->usertype = 1;
                } else {
                    $notification->usertype = $req->to_users;
                }
                $notification->save();
            }
        }
        foreach ($providerData as $provider) {
            if ($req->to_users == 2 || $req->to_users == 0) {
                $notification = new Notification();
                $notification->sender = $req->sender_id;
                $notification->user_id = $provider->id;
                $notification->subject = $req->subject;
                $notification->msg = $req->msg;
                if ($req->to_users == 0) {
                    $notification->usertype = 2;
                } else {
                    $notification->usertype = $req->to_users;
                }
                $notification->save();
            }
        }
        if ($req->to_users == 0) {
            echo "sendAll";
        } else if ($req->to_users == 1) {
            echo "sendcustomer";
        } else {
            echo "sendprovider";
        }

        // echo $to_user;
        // die;

    }
}
