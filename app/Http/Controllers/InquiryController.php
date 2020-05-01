<?php

namespace App\Http\Controllers;


use App\City;
use App\State;
use App\Inquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class InquiryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $states = State::all();
        return view('inquiry', compact('states'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'full_name' => 'required|min:3|max:20|regex:/^[\pL\s]+$/u',
                'company_name' => 'required|min:3|max:50|regex:/^[\pL\s0-9-]+$/u|unique:inquiries,company_name',
                'state' => 'required|exists:states,id',
                'city' => 'required|exists:cities,id',
                'email' => 'required|email|unique:inquiries,email',
                'phone' => 'required|regex:/^[0-9]{9,10}$/|unique:inquiries,phone'

            ]
        );
        $data = [
            'full_name' => $request->full_name,
            'company_name' => $request->company_name,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => Carbon::now()->format('Y-m-d'),
        ];
        Inquiry::create($data);

        return redirect('/')->with('success', 'You have successfully submitted your inquiry, we will check and get back to you.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCityList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
        ]);
        if ($validator->passes()) {
            $cities = City::where('state_id', $request->state_id)->get(['name', 'id'])->toArray();
            return response()->json(['status'=>1, 'data' => $cities]);
        }
        return response()->json(['status'=> 0, 'error'=>$validator->errors()->all()]);
    }
}
