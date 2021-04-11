<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Job;



use Illuminate\Http\Request;

use Illuminate\Session\Store;


class AdController extends Controller
{
    //
    public function q_cust_cars($id)
    {

        $cars = Customer::find($id)->cars;
        $cust = Customer::find($id);
        //$cars=Car::find($id)->cars()->orderBy()...->get();

        //for insert:

        /* $customer=Customer::find($id);
        $car=new Car();
        $car->car_plate_no="inset test";
        $car->car_type=1;
        $car->car_model_year=2016;
        $customer->cars()->save($car); */

        /* for delete:
         first $customer=Customer::find($id);
         $customer->cars()->delete()
         then $customer->delete()
         */

        //return redirect()->route('admin.toedit')->with('info', 'الاعلان بعنوان :' . $title  ."   تم حذفه   " );
        //$Ads=Ad::orderBy('created_at','desc')->get();
        return view('qy_results.index', ['cars' => $cars, 'type' => 'cust_cars', 'cust' => $cust->name]);
    }

    public function q_cust_jobs($id)
    {
        $jobs = Customer::find($id)->jobs;
        $cust = Customer::find($id);
        //for insert:

        /* $customer=Customer::find($id);
        $job=1;
        $customer->jobs()->attach($job);
        $customer->jobs()->detattach($job); for remove
        */
        return view('qy_results.index', ['jobs' => $jobs, 'type' => 'cust_jobs', 'cust' => $cust->name]);
    }

    public function q_job_custrs($id)
    {
        $customers = Job::find($id)->customers;
        $job = Job::find($id);
        //for insert:

        /*
         $job=Job::find($id);
         $cust=4;
         $job->customers()->attach($cust)
         $job->customers()->detattach($cust)
        */
        return view('qy_results.index', ['customers' => $customers, 'type' => 'job_custrs', 'job' => $job->job_name]);
    }


    public function get_queries()
    {
        return view('qy_results.index_qy_get');
    }

    public function cust_info()
    {
        $custmrs = Customer::all(); //orderBy('name')->paginate(2);
        $cars = Car::paginate(4);
        //$cars->withPath('customers')
        return view('customers.customers', ['custmrs' => $custmrs, 'cars' => $cars]);
    }
    //
    public function getAds(Store $sessione)
    {

        //$Ad = new Ad();
        //$Ads = $Ad->getAds($sessione);
        $Ads = Ad::orderBy('created_at', 'desc')->get();
        return view('ads.index', ['Ads' => $Ads]);
    }

    public function getAdminAds(Store $session)
    {
        //$Ad = new Ad();
        //$Ads = $Ad->getAds($session);
        $Ads = Ad::orderBy('title', 'asc')->get();
        return view('admin.adslist', ['Ads' => $Ads]);
    }

    public function getAdmin()
    {
        return view('admin.index');
    }

    public function getAd(Store $session, $id)
    {
        //$Ad = new Ad();
        //$Ad = $Ad->getAd($session, $id);
        $Ad = Ad::find($id);
        return view('ads.ad', ['Ad' => $Ad]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit(Store $session, $id)
    {
        //$Ad = new Ad();
        //$Ad = $Ad->getAd($session, $id);
        $Ad = Ad::find($id);
        return view('admin.edit', ['Ad' => $Ad, 'AdId' => $id]);
    }

    public function AdDelete($id, Request $request)
    {
        $Ad = Ad::find($id);
        $title = $Ad->title;
        $Ad->delete();
        return redirect()->route('admin.toedit')->with('info', 'الاعلان بعنوان :' . $title  . "   تم حذفه   ");
    }

    public function AdAdminCreate(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $Ad = new Ad([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'pic' => $request->input('pic'),
            'pic_only' => $request->input('piconly'),
            'content_only' => $request->input('contentonly')
        ]);
        //$Ad= new Ad();
        //
        //
        //$Ad->title=$request->input('title');
        //$Ad->content=$request->input('content');
        $Ad->save();
        //$Ad->addAd($session, $request->input('title'), $request->input('content'));
        return redirect()->route('admin.toedit')->with('info', 'Ad created, Title is: ' . $request->input('title') . "-Pic only" . $request->input('pic_only'));
    }

    public function AdAdminUpdate(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        //$Ad = new Ad();
        //$Ad->editAd($session, $request->input('id'), $request->input('title'), $request->input('content'));
        $Ad = Ad::find($request->input('id'));
        $Ad->title = $request->input('title');
        $Ad->content = $request->input('content');
        $Ad->save();

        return redirect()->route('admin.toedit')->with('info', 'Ad edited, new Title is: ' . $request->input('title'));
    }

    //
    public function addCust()
    {
        return view('admin.add_customer');
    }

    public function addCust2()
    {
        return redirect()->route('addCustomer');
    }

    public function addCar()
    {
        return view('admin.add_car');
    }

    public function addCar2()
    {
        return redirect()->route('addCar');
    }

    public function addJobCust()
    {
        return view('admin.add_cust_job');
    }

    public function addMaint()
    {
        return view('admin.add_main');
    }
    public function jobTypes()
    {
        return view('admin.job_types');
    }
}
