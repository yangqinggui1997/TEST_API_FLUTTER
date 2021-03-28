<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;

class ContactController extends Controller
{
    private $request;

    /**
     * Class constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getContact()
    {
        $validator = Validator::make($this->request->all(),
        [
            'id' => 'required|numeric'
        ]);
        if($validator->fails())
            return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $validator->getMessageBag()
            ], 200);
        $contact = (new Contact)->getContact($this->request->input('id'));
        if(is_object($contact))
            return response()->json([
                'status' => 'ok',
                'contact' => $contact
            ], 200);
        return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $contact
            ], 200);
    }

    public function create()
    {
        $validator = Validator::make($this->request->all(),
        [
            'name' => 'required|alpha_num',
            'email' => 'required|email',
            'birth_day' => 'required|date_format:Y-m-d',
            'sex' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'address' => 'required|alpha_num'
        ]);
        if($validator->fails())
            return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $validator->getMessageBag()
            ], 200);
        $data = [];
        foreach($this->request->all() as $key => $req)
            $data[$key] = $req;
        $contact = (new Contact)->createContact($data);
        if($contact)
            return response()->json([
                'status' => 'ok'
            ], 200);
        return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $contact
            ], 200);
    }

    public function update()
    {
        $validator = Validator::make($this->request->all(),
        [
            'id' => 'required|numeric',
            'name' => 'required|alpha_num',
            'email' => 'required|email',
            'birth_day' => 'required|date_format:Y-m-d',
            'sex' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'address' => 'required|alpha_num'
        ]);
        if($validator->fails())
            return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $validator->getMessageBag()
            ], 200);
        $data = [];
        foreach($this->request->all() as $key => $req)
            $data[$key] = $req;
        $contact = (new Contact)->updateContact($data);
        if($contact)
            return response()->json([
                'status' => 'ok'
            ], 200);
        return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $contact
            ], 200);
    }

    public function remove()
    {
        $validator = Validator::make($this->request->all(),
        [
            'id' => 'required|numeric'
        ]);
        if($validator->fails())
            return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $validator->getMessageBag()
            ], 200);
        $contact = (new Contact)->deleteContact($this->request->input('id'));
        if($contact)
            return response()->json([
                'status' => 'ok'
            ], 200);
        return response()->json([
                'status' => 'error',
                'code' => 'error-happened',
                'message' => $contact
            ], 200);
    }
}
