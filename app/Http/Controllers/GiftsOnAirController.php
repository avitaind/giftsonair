<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Faker\Provider\Image;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\GiftsOnAir;


class GiftsOnAirController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function upload($file)
    {
        if (is_null($file)) {

            return storage_path() . '/uploads/' . '1.png';

        }
        else {
            if ($file->isValid()) {
                $fileName = (new \DateTime())->format('d.m.Y-hsi').'.'.$file->guessExtension();
                $file->move(storage_path() . '/uploads', $fileName);
                return storage_path() . '/uploads/' . $fileName;
            } else {
                return \Redirect::route('contact_show')
                    ->with('message', 'The File is not valid!');
            }
        }
    }


    public function giftsSaveData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'purchased_from' => 'required',
            'date_of_purchase' => 'required',
            'serial_no'=>'required',
            'model_no'=>'required',
            'invoice_no'=>'required',
            'invoice_image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $filePath = $this->upload($request->file('invoice_image'));

        GiftsOnAir::create($request->all());

        \Mail::send('emails.giftsonair',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'purchased_from' => $request->get('address1'),
                'date_of_purchase' => $request->get('address2'),
                'serial_no' => $request->get('pin'),
                'model_no' => $request->get('invoice_no'),
                'invoice_no' => $request->get('model_no'),
                'invoice_image' => $filePath,

            ), function ($message) use ($request)
            {
                $message->from('avitaind@gmail.com');
                $message->to('avitaind@gmail.com', 'Admin')->subject('Gifts On Air');
    });

	    return redirect()->back()->with('message', 'Thank you for your submission . You shall receive a confirmation mail shortly');
        //return redirect('/')->back()->with('message', 'Thank you for your submission . You shall receive a confirmation mail shortly');

}
}
