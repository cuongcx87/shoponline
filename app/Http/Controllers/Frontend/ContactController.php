<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mail;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array('subject' => $request->subject, "body" => $request->content, 'from' => $request->email);
        $token = $request->input('g-recaptcha-response');
        // dd($token);
        if ($token) {
            $client = new Client();
            // dd($client);
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret'    => '6Lf7L10UAAAAACg_bVzKOp5ZcOVLoAWgP2_RCZHe',
                    'response' => $token
                ]
            ]);
            $result = json_decode($response->getBody()->getContents());
            // dd($result);
            if ($result->success) {
                Mail::send('emails.sendmail', $data, function($mail) use($request) {
                    $mail->from($request->email, $request->fullname);
                    $mail->subject($request->subject);
                    $mail->to('ictnews123@gmail.com');
                });
                return redirect()->back()->with('status', 'Liên hệ của bạn đã gửi thành công!');
            } else {
                return redirect()->back()->with('status', 'Bạn là một người máy!');
            }
            
            
        } else {
            return redirect()->back();
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
