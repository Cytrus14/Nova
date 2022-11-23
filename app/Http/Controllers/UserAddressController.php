<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Models\UserAddress;

class UserAddressController extends Controller
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
        return view('userAddress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAddressRequest $request)
    {
        UserAddress::create([
            'name' => $request['name'],
            'phoneNumber' => $request['phoneNumber'],
            'street' => $request['street'],
            'streetNumber' => $request['streetNumber'],
            'apartmentNumber' => $request['apartmentNumber'],
            'zipCode' => $request['zipCode'],
            'city' => $request['city'],
            'country' => $request['country'],
            'user_id' => $request->user()->id
        ]);

        return redirect(session('redirectTo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAddressRequest  $request
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $userAddress)
    {
        // addresses with an placed order cannot be deleted in order to preserve data integrity
        if (count($userAddress->orders) == 0) {
            UserAddress::get()->where('id', 'like', $userAddress->id)->firstOrFail()->delete();
        }
        return redirect()->back();
    }
}
